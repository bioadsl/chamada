<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
error_reporting(E_ALL);
ini_set("display_errors", "1");

require 'conexao.php';

// Atribui uma conexão PDO
$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$id_bravo   				= (isset($_POST['id_bravo'])) 				   	? $_POST['id_bravo'] : '';
$data  						= (isset($_POST['data'])) 						? $_POST['data'] : '';
$bravos 					= (isset($_POST['presenca'])) 					? $_POST['presenca'] : '';

//filter_has_var(INPUT_POST, 'presenca');

echo $acao . "<br>";
echo $id_bravo . "<br>";
echo $data . "<br>";
echo $bravos . "<br>";


//$bravos = $_POST['presenca'];

foreach ($bravos as $bravo => $presenca) {

	if ($acao == 'incluir') :

		$sql = 'INSERT INTO chamada (id_bravo, data, presenca ) VALUES (:id_bravo, :data, :presenca)';

		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_bravo', $id_bravo);
		$stm->bindValue(':data', $data);
		$stm->bindValue(':presenca', $presenca);

		$retorno = $stm->execute();

		// if ($retorno) :
		// 	echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		// else :
		// 	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		// endif;

		echo "<meta http-equiv=refresh content='3;URL=#'>";
	endif;
}
