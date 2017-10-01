<?php 
session_start();
include 'variaveis.php';

$administrador = array(
	'login' =>'adm@adm',
	'senha' => 12345,
	'nome' => 'Administrador'); 
$usuario = array(
	'login' => 'user@user',
	'senha' => 123,
	'nome' => 'Usuario 1');
$erro = array();
$erro = false;


if (isset($_POST['login']) && isset($_POST['password']) && (strlen($_POST['login']) > 0) && (strlen($_POST['password']) > 0)) {

	if ($_POST['login'] == $administrador['login'] && $_POST['password'] == $administrador['senha'] ) {

		$_SESSION['nome'] = 'Administrador';

		$erro['erroLogin'] = false;

		if ($_POST['lembrar'] == 1) {
			$_SESSION['lembrar'] = true;
			$_SESSION['login'] = $administrador['login'];
		} else {
			$_SESSION['login'] = '';
		}

		header('Location: nota.php');

	}

	if ($_POST['login'] == $usuario['login'] && $_POST['password'] == $usuario['senha'] ) {

		$_SESSION['nome'] = 'Usuario X';

		$erro['erroLogin'] = false;

		if ($_POST['lembrar'] == 1) {
			$_SESSION['lembrar'] = true;
			$_SESSION['login'] = $usuario['login'];
		} else {
			$_SESSION['login'] = '';
		}

		header('Location: nota.php');
	}

	else {
		$erro['erroLogin'] = true;
		$_SESSION['name'] = '';
		$_SESSION['login']='';
		$_SESSION['senha']='';
    }

} 


include "login.php";
?>