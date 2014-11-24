<?php

/*
 * Plugin Name: PIF Analytics
 * Description: Website Analytics
 * Version: 1.0
 */


define("CONFIG_ANALYTICS_PATH", dirname(__FILE__));

require_once(CONFIG_ANALYTICS_PATH."/classes/MostRecentPins.class.php"); // The most recent panel class
require_once(CONFIG_ANALYTICS_PATH."/classes/MostRepinned.class.php"); // The most recent panel class
require_once(CONFIG_ANALYTICS_PATH."/inc/shortcode.inc.php"); // Shortcodes



?>