<?php
date_default_timezone_set('Asia/jakarta');
$time=time();
$jam=date('H:i'); 
include"koneksi.php";
mysqli_query($koneksi, "UPDATE reservations SET status='CheckedOut' WHERE id='$_GET[id]' ");
	echo"<script>alert ('Terimakasih')</script>";
	echo"<script>alert ('Harap Refresh Ulang Halaman Jika Data Belum Ter Selesaikan')</script>";
	echo"<meta http-equiv='refresh' content=3;URL=?site=Permohonan-Approved>";
	
?>