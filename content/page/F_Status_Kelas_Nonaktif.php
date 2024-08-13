<?php 
include "koneksi.php";
mysqli_query($koneksi, "UPDATE rooms SET status='Dirty' WHERE id='$_GET[id]' ");
	echo"<script>alert ('Kelas Berhasil Di Non Aktifkan')</script>";
	echo"<script>alert ('Harap Refresh Ulang Halaman Jika Data Belum Ter Update')</script>";
	echo"<meta http-equiv='refresh' content=3;URL=?site=Data_Kelas>";
	
?>