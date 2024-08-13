<?php 
include"koneksi.php";
mysqli_query($koneksi, "UPDATE booking SET Status_booking=2 WHERE ID_Booking='$_GET[id]' ");
	echo"<script>alert ('Data Berhasil Di Batalkan')</script>";
	echo"<meta http-equiv='refresh' content=1;URL=?site=Permintaan>";
	
?>