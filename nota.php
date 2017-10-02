<?php 
session_start();

$nota = $_SESSION['nota'];

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

switch ($comando){
    case "apagar":
        if ($Id > 0) {
            foreach ($nota as $n){
                if($n["id"] == $Id){
                    unset($_SESSION['nota'][$n['id']]);
                    header("Location: nota.php");
                    die();
                }
            }
        }
        break;

    case "cadastrar":

        //pega o id da última anotação
        foreach ($nota as $n){
            $ultimoid = $n["id"];
        }

        if ($_GET['id'] == 0) {
            $id = $ultimoid + 1;
            $_SESSION['nota'][$id] = array(
                'id' => $id,
                'nome' =>$_GET['nome'],
                'data' =>$_GET['data'],
                'mensagem' => $_GET['mensagem']);
        }
        header("Location: nota.php");
        die();
        break;

    case "editar":
        foreach ($nota as $n){
            if($n["id"] == $Id) {
                $_SESSION['nota'][$n['id']] = array(
                    'id' => $Id,
                    'nome' =>$_GET['nome'],
                    'data' =>$_GET['data'],
                    'mensagem' => $_GET['mensagem']);
            }
        }
        header("Location: nota.php");
        die();
        break;
}

 include "ajudantes.php";

 include "anotacoes.php";
 
?>
