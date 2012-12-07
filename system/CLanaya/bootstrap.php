<?php
/**
 * Bootstrapping, setting up and loading the core.
 *
 * @package LanayaSystem
 */

/**
 * Enable auto-load of class declarations.
 */
function autoload($aClassName) {
  	$classFile = "/{$aClassName}/{$aClassName}.php";
   	$file1 = LANAYA_INSTALL_PATH . "/system/" . $classFile;
   	$file2 = LANAYA_SITE_PATH . "/controllers/" . $classFile;
   	$file3 = LANAYA_SITE_PATH . "/models/" . $classFile;
   	if(is_file($file1)) {
      	require_once($file1);
   	} elseif(is_file($file2)) {
      	require_once($file2);
   	} elseif(is_file($file3)) {
      	require_once($file3);
   	}
}
spl_autoload_register('autoload');

/**
 * Set a default exception handler and enable logging in it.
 */
function exception_handler($e) {
	echo "Lydia: Uncaught exception: <p>" . $e->getMessage() . "</p><pre>" . $e->getTraceAsString(), "</pre>";
}
set_exception_handler('exception_handler');