<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	session_start();
	$css = '../../../Public/css';
	$js = '../../../Public/js';
	$img = '../../../Public/img';
	$uploads = '../../../Public/Uploads';
	$titulo = 'Pizzaria do Luigi';
	
	chdir('/var/www/html/Laboratorio/App');
?>
