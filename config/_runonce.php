<?php
class PagepeelRunonceJob extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->import('Database');
	}
	
	public function run()
	{
		//nur ab Contao 2.9
		if (version_compare(VERSION, '2.8', '>'))
		{
			if ($this->Database->fieldExists('cp_pagepeel_url', 'tl_module'))
			{
				$ObjResult	=	$this->Database->execute("SELECT id,jumpTo FROM tl_module WHERE type='cp_pagepeel'");
				while($Res	=	$ObjResult->fetchAssoc())
				{
					$this->Database->execute("UPDATE tl_module SET cp_pagepeel_url='{{link_url::" . $Res['jumpTo'] . "}}' AND cp_pagepeel_target='0' WHERE id='" . $Res['id'] . "'");
				}
					
			}
       } // if Version > 2.8
   } // run
} // class
$objPagepeelRunonceJob = new PagepeelRunonceJob();
$objPagepeelRunonceJob->run();
?>