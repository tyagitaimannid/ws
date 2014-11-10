<?php
error_reporting(E_ALL);
ini_set('display_error',1);
session_start();

//memanggil library
require_once('nusoap/lib/nusoap.php');

//mendefinisikan alamat url service yang disediakan oleh client 
$url='http://localhost/ws/xml/Login/server.php?wsdl';
//$client = new soapclient($url,'WSDL');
$client = new nusoap_client($url,'WSDL');

$username = isset($_POST["username"])?$_POST["username"]:'admin';
$password = isset($_POST["password"])?$_POST["password"]:'admin';
$result=$client->call('login_ws',array('username'=>$username,'password'=>$password));
//echo '<pre>';print_r($client->response);echo '</pre>';

	if ($result=="login berhasil"){
		$_SESSION['username'] = $username;
		header("location:index.php");
	}else {
		header("location:login.php");	
	}


?>