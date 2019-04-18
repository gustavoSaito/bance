<?php


$email = $_POST['email'];

$senha = $_POST['senha'];

$consultaEmail = "SELECT GN_EMAIL FROM USUARIO 
				  WHERE GN_EMAIL = '$email';";

$serverName = "DESKTOP-BUFDA2H";
$connectionInfo = array( "Database"=>"SLINE_CAD");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$result = sqlsrv_query($conn, $consultaEmail);

if($result === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC); 
   


if ($row['GN_EMAIL'] != null){

	$consultaSenha = "SELECT GN_SENHA FROM USUARIO 
					  WHERE GN_SENHA = '$senha';";

	$result = sqlsrv_query($conn, $consultaSenha);

	if($result === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC); 

	if($row['GN_SENHA'] != null){

	include 'listaClientes.html';

	}else {


	echo "Senha incorreta";


	}


	}else {

	echo "Email não encontrado";
}