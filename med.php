<!DOCTYPE html>
<html>
<head>
	<title>Sertifikasi SKKNI</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--<link href="https://fonts.googleapis.com/css?family=Merriweather|PT+Sans|Source+Sans+Pro" rel="stylesheet">-->
<script type="text/javascript" src="js/jquery.number.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>

	<script>
$( function() {
	$( "#datepicker" ).datepicker();
} );
</script>

</head>
<body>
	<!--
		nama, nik, hp, email, skema sertifikasi, tempat uji kompetentsi, rekomendasi, tanggal terbit sertifikat, tanggal lahir, organisasi
	-->
	<div id="wrapper">
		<div id="container">
			<h1>Soal Praktek Aplikasi Database </h1>
			<p>
				<a href="med.php?mod=peserta&act=form">ADD PESERTA</a> |
				<a href="med.php?mod=peserta">VIEW PESERTA</a>
			</p>
			<?php
				include"content.php";
			?>

		</div>
	</div>
	<script type="text/javascript">
	$(function() {
		$("#hp,#nik").number(true);
	})
	</script>
</body>
</html>
