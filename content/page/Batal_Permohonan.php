<?php 
include"koneksi.php";
mysqli_query($koneksi, "DELETE FROM reservations WHERE paid='$_GET[id]' ");
mysqli_query($koneksi, "DELETE FROM d_reservations WHERE id_paid='$_GET[id]' ");
	echo"<script>alert ('Data Berhasil Di Batalkan')</script>";
	echo"<script>alert ('Harap Refresh Ulang Halaman Jika Data Belum Di Batalkan')</script>";
	echo"<meta http-equiv='refresh' content=3;URL=?site=Permohonan>";
	
?>