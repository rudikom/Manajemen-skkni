<?php 
	include"config/database.php";

	$mod = @$_GET['mod'];

	if ($mod == 'peserta') {
		include"modules/peserta/peserta.php";
	}
?>