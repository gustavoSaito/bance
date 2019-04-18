<?php

include 'conectdb.php';


$nome = $_POST['Nome'];
$email = $_POST['Email'];
$senha = $_POST['Senha'];
$sexo = $_POST['Sexo'];
$ddd = $_POST['DDD'];
$telefone = $_POST['Telefone'];
$estado = $_POST['Estado'];
$cidade = $_POST['Cidade'];



$query = "INSERT INTO USUARIO (
		  NM_USUARIO,
		  GN_EMAIL,
		  GN_SENHA,
		  GN_SEXO,
		  NR_TELEFONE,
		  GN_ESTADO,
		  GN_CIDADE,
		  DT_INCLUSAO,
		  DT_EXCLUSAO,
		  FL_ATIVO) VALUES (
		  '$nome',
		  '$email',
		  '$senha',
		  '$sexo',
		  '$ddd' + '$telefone',
		  '$estado',
		  '$cidade',
		  GETDATE(),
		  null,
		  1);";



// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$serverName = "DESKTOP-BUFDA2H";
$connectionInfo = array( "Database"=>"SLINE_CAD");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$result = sqlsrv_query($conn, $query);

include 'index.html';