<?php 
session_start();

$nota = array();
$count = 0;
$menu = array(
	'1' => 'Notas Recentes',
	'2' => 'Lixeira',
	'3' => 'Datas Proximas',
	'4' => 'Todas as Datas',
	'5' => 'Temporarias',
	'6' => 'Configurações');

if (strlen($_SESSION['nome'])==0) {
	header ("Location: index.php");
}

	for ($i=1; $i <= 30; $i++) { 

		$nota[] = array(
		'id' => $i,
		'data' => '00/00/0000',
		'mensagem' => 'Mensagem padrão ' . $i,
		'apagada' => false) ;

		$_SESSION['nota' . $i] = $nota;
	}

include "anotacoes.php";
 
?>