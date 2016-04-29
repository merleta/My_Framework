<?php

/**
 * Debug
 */

ini_set('display_errors', 'on');
error_reporting(E_ALL);

/**
 * Directories
 */

define("APP_DIR", str_replace("/", DIRECTORY_SEPARATOR, dirname(__FILE__) . '/../..'));
?>