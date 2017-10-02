<?php 
session_start();

$nota = array();

for ($i=1; $i <= count($_SESSION['nota']) ; $i++) { 
	if (isset($_SESSION['nota'][$i])) {
		$nota[] = $_SESSION['nota'][$i];
	}
}

$count = 0;
$comando = (isset($_GET['comando']))? $_GET['comando'] : false;
$Id = (isset($_GET['id']))? $_GET['id'] : '0';

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


if ($Id > 0 && $comando == true) {

	foreach ($nota as $n){
        if($n["id"] == $Id){
            if ($comando == true) {
            	unset($_SESSION['nota'][$n['id']]);
            	header("Location: nota.php");
            	die();
            }
        }
    }
			
}

if (isset($_GET['nome']) && isset($_GET['mensagem']) && isset($_GET['data']) && isset($_GET['id'])) {

	for ($i=0; $i <= count($nota); $i++){

		// EDITAR
		if (($_GET['id'] == $i) && ($_GET['id'] != 0)) {
			$_SESSION['nota'][$i] = array(
	            			'id' => $i,
	            				'nome' =>$_GET['nome'],
	            					'data' =>$_GET['data'],
	            						'mensagem' => $_GET['mensagem']);
				header("Location: nota.php");
				die();
		} 

		//CADASTRAR
		if ($_GET['id'] == 0) {
			$id = count($nota) + 1;
	    	$_SESSION['nota'][$id] = array(
	            			'id' => $id,
	            				'nome' =>$_GET['nome'],
	            					'data' =>$_GET['data'],
	            						'mensagem' => $_GET['mensagem']);
	    	header("Location: nota.php");
			die();
    	}	
	}
}

 include "anotacoes.php";
 
?>