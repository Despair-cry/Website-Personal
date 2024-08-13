
<?php 
include"../page/koneksi.php";
     if (isset($_POST['btnbulan1'])) {

        $sales_id=$tampil['sales_id'];
        $tanggal=$_POST['bulan1tanggal'];
        $status="Bulan1";
        $nilai1target=$_POST['bulan1jdcbtarget'];
        $nilai1aktual=$_POST['bulan1jdcbaktual'];
        $nilai2target=$_POST['bulan1jvtarget'];
        $nilai2aktual=$_POST['bulan1jvaktual'];
        $nilai3target=$_POST['bulan1jhptarget'];
        $nilai3aktual=$_POST['bulan1jhpaktual'];
        $nilai4target=$_POST['bulan1jspktarget'];
        $nilai4aktual=$_POST['bulan1jspkaktual'];
        $nilai5target=$_POST['bulan1jdotarget'];
        $nilai5aktual=$_POST['bulan1jdoaktual'];
        $nilai6target=$_POST['bulan1kehadirantarget'];
        $nilai6aktual=$_POST['bulan1kehadiranaktual'];
        $nilai7target=$_POST['bulan1dspwaktutarget'];
        $nilai7aktual=$_POST['bulan1dspwaktuaktual'];
        $nilai8target=$_POST['bulan1miatarget'];
        $nilai8aktual=$_POST['bulan1miaaktual'];
                                          


        mysqli_query($koneksi, "INSERT INTO ojt VALUES('','$sales_id','$tanggal','$status','$nilai1target','$nilai1aktual','$nilai2target','$nilai2aktual','$nilai3target','$nilai3aktual',
        '$nilai4target','$nilai4aktual','$nilai5target','$nilai5aktual','$nilai6target','$nilai6aktual','$nilai7target','$nilai7aktual','$nilai8target','$nilai8aktual')");
        echo"<script>alert ('Nilai Bulan 1 Berhasil di Simpan') </script>";
        echo"<meta http-equiv='refresh' content=1;URL=?site=employee>";
                                                
        }

    if (isset($_POST['btnupdateday1'])) {
        if (! empty($_FILES['editgambarday1']['tmp_name'])) {
        $udt_gambarday1 = addslashes($_FILES['editgambarday1']['name']);
        $udt_gambarday1 = stripslashes($udt_gambarday1);
        $udt_foto = $udt_gambarday1;
        copy($_FILES['editgambarday1']['tmp_name'],"../content/upload/".$udt_gambarday1);
        }else{
             $udt_foto =$tampilnilaiday1['foto'];
         }
         $nilaiday1=$_POST['nilaiday1'];
        $sales_id=$tampil['sales_id'];

        mysqli_query($koneksi, "UPDATE slp SET nilai='$nilaiday1',foto='$udt_foto' WHERE sales_id='$sales_id' AND status='day1' ");
        echo"<script>alert ('Data Berhasil Di Ubah') </script>";
        echo"<meta http-equiv='refresh' content=1;>";

        }
?>

<?php 


?>