<?php 
include"koneksi.php";
mysqli_query($koneksi, "DELETE FROM employe WHERE id='$_GET[id]' ");
	echo"<script>alert ('Data Karyawan Berhasil Di Hapus')</script>";
	echo"<script>alert ('Harap Refresh Ulang Halaman Jika Data Belum Ter Hapus')</script>";
	echo"<meta http-equiv='refresh' content=3;URL=?site=Data_Karyawan>";
	
?>