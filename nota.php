<?php 
session_start();

$nota = array();
$count = 0;
$comando = (isset($_GET['comando']))? $_GET['comando'] : false;
$idRemover = (isset($_GET['id']))? $_GET['id'] : '0';

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

if (count($nota) == 0) {

	for ($i=1; $i <= 30; $i++) {

		$nota[] = array(
		'id' => $i,
		'data' => '00/00/0000',
		'mensagem' => 'Mensagem padrão ' . $i,
		'apagada' => false) ;
	}
}
	
	foreach ($nota as $n){
        if($n["id"] == $idRemover){
            if ($comando == true) {
            	 unset($nota[$n]);

            }
        }
    }
	

include "anotacoes.php";
 
?>