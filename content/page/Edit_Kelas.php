<?php 
include"koneksi.php";
$query=mysqli_query($koneksi, "SELECT * FROM rooms WHERE id='$_GET[id]'");
$tampil=mysqli_fetch_array($query);
?>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Kelas <?php echo $tampil['name']; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Kelas</label>
                                            <input class="form-control" name="nm_kelas" value="<?php echo $tampil['name']; ?>" required="">
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
 
 $nm=$_POST['nm_kelas'];
 
    mysqli_query($koneksi, "UPDATE rooms SET name='$nm' WHERE id='$_GET[id]' ");
    echo"<script>alert ('Data Kelas Berhasil di Ubah') </script>";
    echo"<meta http-equiv='refresh' content=1;URL=?site=Data_Kelas>";


}
?>