Cadastro de Administrador<br>

<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include_once('Connection.php');
	include_once('FuncionarioController.php');

	$nome = 'luigi';
	$email = 'admin@luigi.com';
	$senha = 'admin';
	$funcao = 'admin';
	$endereco = 'Praça da Coluna da Hora, 22, Centro';
	$cidade = 'Sobral';
	$cep = '52222000';
	$celular = '88999526345';

	$funcionario = new Funcionario($nome, $email, $senha, $funcao, $endereco, $cidade, $cep, $celular);
	$funcionario_ctl = new FuncionarioController();
	echo $funcionario_ctl->insert($funcionario);

?>