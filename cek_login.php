<?php
session_start();
include"content/page/koneksi.php";
if(isset($_POST['login'])){

if (empty($_POST['username']) && empty($_POST['password'])) {
	echo "<script>alert('Anda Belum Login') </script>";
	echo"<meta http-equiv='refresh' content=0;URL=index.php>";
	
}else
{
$user=addslashes(trim($_POST['username']));
$pass=addslashes(trim($_POST['password']));


$filter=mysqli_query($koneksi, "SELECT * FROM employe WHERE Sales_ID='$user' AND password='$pass' ");
$cek=mysqli_num_rows($filter);
$data=mysqli_fetch_array($filter);

if($cek>0) {
	if ($data['Level']=='Admin') {
	$_SESSION['user']=$user;
	$_SESSION['Sales_ID']=$data['Sales_ID'];
	$_SESSION['Salesman_Name']=$data['Salesman_Name'];
    $_SESSION['level']=$data['Level'];
    $_SESSION['Dealer_Name']=$data['Dealer_Name'];
    $_SESSION['status']=$data['level'];

	header("location:content/?site=a");	
	}else{
	$_SESSION['user']=$user;
	$_SESSION['Sales_ID']=$data['Sales_ID'];
	$_SESSION['Salesman_Name']=$data['Salesman_Name'];
    $_SESSION['level']=$data['Level'];
    $_SESSION['Dealer_Name']=$data['Dealer_Name'];
    $_SESSION['status']=$data['level'];

	header("location:user/");	
	}
    
  }
else {
	header("location:index.php?pesan=gagal");
     }

    }
} ?>
