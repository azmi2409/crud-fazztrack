<?php
spl_autoload_register(function($classname) {
	$file = dirname(__DIR__) . '\\class\\' . $classname . '.php';
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
	if (file_exists($file)) {
		require_once $file;
	}
});