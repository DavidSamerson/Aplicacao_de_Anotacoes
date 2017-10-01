<?php 
session_start();

$nota = array();

for ($i=1; $i <= 30 ; $i++) { 
	if (isset($_SESSION['nota'][$i])) {
		$nota[] = $_SESSION['nota'][$i];
	}
}

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


if ($idRemover > 0 && $comando == true) {

	foreach ($nota as $n){
        if($n["id"] == $idRemover){
            if ($comando == true) {
            	unset($_SESSION['nota'][$n['id']]);
            }
        }
    }
			
}

include "anotacoes.php";
 
?>