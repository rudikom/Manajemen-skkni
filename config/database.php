<?php 
	$host = "localhost";
	$root = "root";
	$pass = "";
	$db   = "db_skkni";

	$koneksi = @mysql_connect($host, $root, $pass) or die("Tidak terkoneksi ke server...");
	if ($koneksi) {
		mysql_select_db($db) or die("Tidak terkoneksi ke database...");
	}
?>