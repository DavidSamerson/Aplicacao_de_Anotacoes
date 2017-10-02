<?php 

function verificaData($data){


	if ($data == "" or $data == "0000-00-00") {
		return "";
	}

	$dados = explode("/", $data);

	if (count($dados) != 3) {
		return $data;
	}

	$dia=$dados[2];
	$mes=$dados[1];
	$ano=$dados[0];

	$diaAtual = date('d');
	$mesAtual = date('m');
	$anoAtual = date('Y');

	if (($diaAtual > $dia) && ($mesAtual > $mes) && ($anoAtual > $ano)) {

		return 'border: 2px dotted red;';
	} 

}

function traduz_data_para_exibir($data){

	if ($data == "" or $data == "0000-00-00") {
		return "";
	}

	$dados = explode("-", $data);

	if (count($dados) != 3) {
		return $data;
	}

	$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

	return $data_exibir;
}

function validar_data($data){

	$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
	$resultado = preg_match($padrao, $data);

	if (! $resultado) {
		return false;
	}

	$dados = explode('/', $resultado);

	$dia = $dados[0];
	$mes = $dados[1];
	$ano = $dados[2];

	$resultado = checkdate($mes, $dia, $ano);

	return $resultado;
}


?>
