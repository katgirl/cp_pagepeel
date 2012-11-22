<?php 

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 * 
 * Modul Visitors File - Frontend
 *
 * PHP version 5
 * @copyright  CLICKPRESS Internetagentur
 * @author     Stefan Schulz-Lauterbach
 * @package    cp_pagepeel 
 * @license    LGPL 
 * @filesource
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Clickpress\Pagepeel;


/**
 * Class ModulePagepeel
 *
 * @copyright  CLICKPRESS Internetagentur 
 * @author     Stefan Schulz-Lauterbach <ssl@clickpress.de> 
 * @package    Controller
 */
class ModulePagepeel extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_cp_pagepeel';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### PAGE PEEL ###';
			$objTemplate->title = $this->name;
			
			// TODO: Vorschaubild der Kampagne einbinden
			
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->title;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if (!is_numeric($this->cp_pagepeel_imgsmall) || !is_numeric($this->cp_pagepeel_imgbig))
		{
			return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
		}
		
		$objFile = \FilesModel::findByPk($this->cp_pagepeel_imgsmall); 
		$this->cp_pagepeel_imgsmall = $objFile->path; 
		
		$objFile = \FilesModel::findByPk($this->cp_pagepeel_imgbig); 
		$this->cp_pagepeel_imgbig = $objFile->path; 
		
		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{		
		// Assign template variables
		$this->Template->id			=	$this->id;
		$this->Template->url		=	(!empty($this->cp_pagepeel_url)) ? $this->cp_pagepeel_url : '/';
		//$this->Template->rel		=	$this->cp_pagepeel_rel;
		$this->Template->target		=	($this->cp_pagepeel_target != 1) ? 'false' : 'true';
		$this->Template->imgsmall	= 	($this->cp_pagepeel_imgsmall) ? $this->cp_pagepeel_imgsmall : '/system/modules/cp_pagepeel/html/small.png';
		$this->Template->imgbig		= 	($this->cp_pagepeel_imgbig) ? $this->cp_pagepeel_imgbig : '/system/modules/cp_pagepeel/html/large.png';

		// Add Peelscript to the Frontend
		$GLOBALS['TL_CSS'][] = 'system/modules/cp_pagepeel/html/cp_pagepeel.css';
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/cp_pagepeel/html/peel.js';			

	}
}

?>