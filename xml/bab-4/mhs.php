<?php
header('Content-Type: text/xml; charset=ISO-8859-1');
include "koneksi.php";

	
	$path_params = array();
	$self = $_SERVER['PHP_SELF'];
	$extension = substr($self, strlen($self)-3);
	$path = ($extension=='php') ? NULL : $_SERVER['PATH_INFO'];
	if ($path !=null) {
		$path_params = explode("/",$path);
		}
		
	if($_SERVER['REQUEST_METHOD']=='GET') {
		 if (isset($path_params[1]) && $path_params[1] != NULL ){
			$query = "select nim, nama, alamat, prodi from mahasiswa where nim = $path_params[1] ";		
		} else {
		$query = "select nim, nama, alamat, prodi from mahasiswa"; 		
		}
	$result = mysql_query($query) or die('Query failed: '.mysql_error()); 
	
	echo "<data>";
	while ($line = mysql_fetch_array($result,MYSQL_ASSOC)){
		echo "<mahasiswa>";
		foreach ($line as $key => $col_value) {
		echo "<$key>$col_value</$key>";
		}
		echo "</mahasiswa>";
		}
	echo "</data>";
	mysql_free_result($result);
		}
	
	
mysql_close($link);

?>