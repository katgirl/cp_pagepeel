-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------


-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `cp_pagepeel` varchar(255) NOT NULL default '',
  `cp_pagepeel_url` varchar(255) NOT NULL default '',
  `cp_pagepeel_target` char(1) NOT NULL default '',
  `cp_pagepeel_rel` varchar(64) NOT NULL default '',
  `cp_pagepeel_imgsmall` varchar(255) NOT NULL default '',
  `cp_pagepeel_imgbig` varchar(255) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


