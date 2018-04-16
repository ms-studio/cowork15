<?php
/*
Plugin Name: Coworking Neuchatel Functions
Plugin URI: https://coworking-neuchatel.ch
Description: This plugin adds functionality to the Coworking Neuchatel website.
Version: 0.0.1
Author: Manuel Schmalstieg
Author URI: http://ms-studio.net
*/


// Basics
include_once (plugin_dir_path(__FILE__).'cwn-init.php');

// Post Types
include_once (plugin_dir_path(__FILE__).'cwn-post-types.php');

// Jetpack
include_once (plugin_dir_path(__FILE__).'cwn-jetpack.php');

// Daily Email
include_once (plugin_dir_path(__FILE__).'cwn-dailymail.php');

// Shortcodes
include_once (plugin_dir_path(__FILE__).'cwn-shortcodes.php');

// Formidable
include_once (plugin_dir_path(__FILE__).'cwn-formidable.php');
