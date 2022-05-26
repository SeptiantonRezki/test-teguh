	<!-- cek apakah sudah login -->
	<?php
	session_start();
	require(__DIR__ . '/../config/koneksi.php');
	if ($_SESSION['status'] != "login") {
		header("location:login.php");
	}
	?>