<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Cp_pagepeel
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Clickpress',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'Clickpress\Pagepeel\ModulePagepeel' => 'system/modules/cp_pagepeel/modules/ModulePagepeel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_cp_pagepeel' => 'system/modules/cp_pagepeel/templates',
));
