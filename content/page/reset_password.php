<?php
include"koneksi.php";
$query=mysqli_query($koneksi, "SELECT * FROM employe WHERE id='$_GET[id]'");
$tampil=mysqli_fetch_array($query);

$sales_id=$tampil['Sales_ID'];


mysqli_query($koneksi, "UPDATE employe SET password='$sales_id' WHERE id='$_GET[id]' ");
	echo"<script>alert ('Data Password Berhasil di Reset')</script>";
	echo"<script>alert ('Harap Refresh Ulang Halaman Jika Data Belum Ter Selesaikan')</script>";
	echo"<meta http-equiv='refresh' content=1;URL=?site=Data_Karyawan>";
	
?>