<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	session_start();
	$css = '../Public/css';
	$js = '../Public/js';
	$img = '../Public/img';
	$uploads = '../Public/Uploads';
	$titulo = 'Pizzaria do Luigi';

	$dir = getcwd();
	$pieces = explode(DIRECTORY_SEPARATOR, $dir);
	$cur_dir = $pieces[count($pieces) - 1];

	while ($cur_dir != 'App') {
		$css = '../'.$css;
		$js = '../'.$js;
		$img = '../'.$img;
		$uploads = '../'.$uploads;
		
		chdir(dirname($dir));
		$dir = getcwd();
		$pieces = explode(DIRECTORY_SEPARATOR, $dir);
		$cur_dir = $pieces[count($pieces) - 1];
	}
?>
