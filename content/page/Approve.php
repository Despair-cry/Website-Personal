<?php 
include"koneksi.php";
$query=mysqli_query($koneksi, "SELECT * FROM reservations WHERE id='$_GET[id]'");
while($tampil=mysqli_fetch_array($query)){

	mysqli_query($koneksi, "UPDATE reservations set status='Confirmed' WHERE id='$_GET[id]'");
	echo"<script>alert ('Permintaan Berhasil Di Approved') </script>";
	echo"<script>alert ('Harap Refresh Ulang Halaman Jika Data Belum Ter Approved')</script>";
    echo"<meta http-equiv='refresh' content=3;URL=?site=Permohonan-Approved>";
}
?>

