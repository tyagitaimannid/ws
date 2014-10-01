<?php
	//koneksi ke database
		$link = mysql_connect('localhost','root','')
		or die('could not connect'.mysql_error());
		mysql_select_db('modul_sit') or die ('could not select database');
?>