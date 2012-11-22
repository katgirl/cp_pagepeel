<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  CLICKPRESS Internetagentur 
 * @author     Stefan Schulz-Lauterbach <ssl@clickpress.de> 
 * @package    cp_pagepeel 
 * @license    LGPL 
 * @filesource
 */

/**
 * Table tl_content 
 */
$this->loadLanguageFile('tl_content');

$GLOBALS['TL_DCA']['tl_module']['palettes']['cp_pagepeel'] = '{type_legend},name,type;{config_legend},cp_pagepeel_imgsmall,cp_pagepeel_imgbig;{redirect_legend},cp_pagepeel_url,cp_pagepeel_target;{protected_legend:hide},protected;{expert_legend:hide},guests';

//echo '<pre>';print_r($GLOBALS['TL_DCA']['tl_module']['palettes']);echo '</pre>';
/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['cp_pagepeel_imgsmall'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cp_pagepeel_imgsmall'],
	'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('files'=>true,'filesOnly'=>true,'extensions'=>'gif,jpg,png','fieldType'=>'radio','tl_class'=>'clr'),
    'sql'                     => "varchar(255) NOT NULL default ''"	
);
$GLOBALS['TL_DCA']['tl_module']['fields']['cp_pagepeel_imgbig'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cp_pagepeel_imgbig'],
	'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('files'=>true,'filesOnly'=>true,'extensions'=>'gif,jpg,png','fieldType'=>'radio','tl_class'=>'clr'),
    'sql'                     => "varchar(255) NOT NULL default ''"	
);

$GLOBALS['TL_DCA']['tl_module']['fields']['cp_pagepeel_url'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
	'wizard' => array
	(
		array('tl_pagepeel', 'pagePicker')
	)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['cp_pagepeel_target'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['MSC']['target'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12')
);


$GLOBALS['TL_DCA']['tl_module']['fields']['cp_pagepeel_rel'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['rel'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['url']['label'] = &$GLOBALS['TL_LANG']['tl_module']['cp_pagepeel_url'];




/**
 * Class tl_pagepeel
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2012
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Controller
 */
class tl_pagepeel extends Backend
{
	/**
	 * Return the link picker wizard
	 * @param DataContainer
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		return ' ' . $this->generateImage('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer" onclick="Backend.pickPage(\'ctrl_' . $dc->inputName . '\')"');
	}
}

?>
