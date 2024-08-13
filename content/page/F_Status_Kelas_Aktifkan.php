<?php 
include "koneksi.php";
mysqli_query($koneksi, "UPDATE rooms SET status='Ready' WHERE id='$_GET[id]' ");
	echo"<script>alert ('Kelas Berhasil Di Aktifkan')</script>";
	echo"<script>alert ('Harap Refresh Ulang Halaman Jika Data Belum Terupdate)</script>";
	echo"<meta http-equiv='refresh' content=3;URL=?site=Data_Kelas>";
	
?>