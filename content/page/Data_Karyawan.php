<?php 
session_start();
?>
<div class="panel panel-default">
    <div class="panel-heading">
          Add Akun Employe
    </div>
                  <div class="panel-body">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              + Tambah Akun
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Data Akun</h4>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nik*</label>
                                            <input type="text" class="form-control" placeholder="Enter Nik" name="nik" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password*</label>
                                            <input type="text" class="form-control" placeholder="Enter Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email*</label>
                                            <input type="text" class="form-control" placeholder="Enter Email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Karyawan*</label>
                                            <input type="text" class="form-control" placeholder="Enter Nama" name="nama_employe" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Divisi*</label>
                                            <input type="text" class="form-control" placeholder="Enter Divisi" name="divisi" required>
                                        </div>
                                       
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" name="simpan">Close</button>
                                            <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
include"koneksi.php";
if(isset($_POST['simpan'])){
 
  $nik=$_POST['nik'];
  $password=$_POST['password']; 
  $nama_employe=$_POST['nama_employe'];
  $divisi=$_POST['divisi'];
  $email=$_POST['email'];
 
    mysqli_query($koneksi, "INSERT INTO employe VALUES('','PT Hino Motors Sales Indonesia','Jatake','','$nik','$nama_employe','','','','','','$divisi','','','','User','','$email','','','','','','','','$password')");
    echo"<script>alert ('Akun Berhasil di tambah') </script>";
    echo"<script>alert ('Harap Reflesh Ulang Jika Data Belum Bertambah') </script>";
    echo"<meta http-equiv='refresh' content=3;URL=?site=Data_Karyawan>";


}

?>
        <!--/. NAV TOP  -->
        <!-- /. NAV SIDE  -->
        <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Data Employee
                        </h1>
                        <ol class="breadcrumb"></ol>
                    </div>
                </div>
                 <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Employee
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Password</th>
                                        <th>Nama Karyawan</th>
                                        <th>Divisi</th>
                                        <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php 
include"koneksi.php";
$no=1;
$query=mysqli_query($koneksi, "SELECT * FROM employe WHERE Level NOT IN('Admin')");
  while($data=mysqli_fetch_array($query)){ ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['Sales_ID']; ?></td>
      <td><?php echo $data['password']; ?></td>
      <td><?php echo $data['Salesman_Name']; ?></td>
      <td><?php echo $data['Divisi']; ?></td>
      <td>
      <a href="?site=Edit_Karyawan&id=<?php echo $data['id']; ?>"><button class="btn btn-primary notika-btn-primary">Update</button></a>
      <a onclick="if(confirm('Apakah Anda Yakin Ingin Di Hapus')){ location.href='?site=delete_karyawan&id=<?php echo $data['id']; ?>' }"><button class="btn btn-danger notika-btn-danger">Delete</button></a>
      <a onclick="if(confirm('Apakah Anda Yakin Ingin Mereset Password')){ location.href='?site=reset&id=<?php echo $data['id']; ?>' }"><button class="btn btn-danger notika-btn-danger">Reset Password</button></a>
      </td>
      
    </tr>   
    <?php } ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
    
                <!-- /. ROW  -->

                <!-- /. ROW  -->
        
                <!-- /. ROW  -->
            </div>
        
              
    
             <!-- /. PAGE INNER  -->
    </div>

      <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
 
    
