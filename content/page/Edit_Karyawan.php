<?php 
include"koneksi.php";
$query=mysqli_query($koneksi, "SELECT * FROM employe WHERE id='$_GET[id]'");
$tampil=mysqli_fetch_array($query);
?>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Karyawan <?php echo $tampil['Salesman_Name']; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label>Nik</label>
                                            <input class="form-control" name="nm_kelas" value="<?php echo $tampil['Sales_ID']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Karyawan*</label>
                                            <input class="form-control" name="nm_karyawan" value="<?php echo $tampil['Salesman_Name']; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email*</label>
                                            <input class="form-control" name="email" value="<?php echo $tampil['Alamat_Email']; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Divisi*</label>
                                            <input class="form-control" name="divisi" value="<?php echo $tampil['Divisi']; ?>" required="">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg"  name="update">Update</button>

                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
</div>
  <?php
include"koneksi.php";
if(isset($_POST['update'])){
 
 $nm=$_POST['nm_karyawan'];
 $email=$_POST['email'];
 $divisi=$_POST['divisi'];
 
    mysqli_query($koneksi, "UPDATE employe SET Salesman_Name='$nm', Alamat_Email='$email', Divisi='$divisi' WHERE id='$_GET[id]' ");
    echo"<script>alert ('Data Karyawan Berhasil Di Ubah') </script>";
    echo"<script>alert ('Harap Refles Halaman Jika Data Belum Bertambah') </script>";
    echo"<meta http-equiv='refresh' content=1;URL=?site=Data_Karyawan>";


}
?>