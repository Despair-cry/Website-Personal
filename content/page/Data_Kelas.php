<?php 
session_start();
?>
<!-- <?php
    include"koneksi.php";
    $kd = "HMSIKELAS" ;
    $qry = mysqli_query($koneksi, "SELECT MAX(id) AS id FROM rooms WHERE id like '$kd%' ");
    $dt = mysqli_fetch_array($qry);
    $ambil = $dt['id'];
    $no = substr($ambil,9,4);
    $urut = $no + 1;
    $new = $kd . sprintf("%04s", $urut);
?> -->
<div class="panel panel-default">
    <div class="panel-heading">
          Add Kelas
    </div>
                  <div class="panel-body">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              + Tambah Kelas
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Data Kelas</h4>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                           <input type="text"   name="kode_ruangan"  readonly hidden>
                                          <div class="form-group">
                                            <label>Nama Ruangan</label>
                                            <input type="text" class="form-control" placeholder="Nama Ruangan" name="nama_ruangan" required>
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
<!--/. Input Kelas  -->                 
<?php
include"koneksi.php";
if(isset($_POST['simpan'])){
 
  $nm_ruangan=$_POST['nama_ruangan'];
 
    mysqli_query($koneksi, "INSERT INTO rooms VALUES('','$nm_ruangan','1','Ready')");
    
    echo"<script>alert ('Data Kelas Berhasil di tambah') </script>";
    echo"<script>alert ('Refresh Ulang Jika Data Kelas Belum Bertambah') </script>";
    echo"<meta http-equiv='refresh' content=3;URL=?site=Data_Kelas>";


}

?>
        <!--/. NAV TOP  -->
        <!-- /. NAV SIDE  -->
        <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Data Kelas HMSI Jatake
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
                             Data Kelas HMSI Jatake
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Kelas</th>
                                        <th>Status Kelas</th>
                                        <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
include"koneksi.php";
$no=1;
$query=mysqli_query($koneksi, "SELECT * FROM rooms");
  while($data=mysqli_fetch_array($query)){ ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['name']; ?></td>
      <td>
        <?php 
          if($data['status']=="Ready"){
            echo "Aktif";
          }else{
            echo"Tidak Aktif";
          }
        ?>
      </td>
      <td width="350">
        <a href="?site=Edit_Kelas&id=<?php echo $data['id']; ?>"><button class="btn btn-primary notika-btn-primary">Update</button></a>
        <a onclick="if(confirm('Apakah Anda Yakin Ingin Di Hapus')){ location.href='?site=delete_kelas&id=<?php echo $data['id']; ?>' }"><button class="btn btn-danger notika-btn-danger">Delete</button></a>
        <?php
        if($data['status']=="Ready"){ ?>
          <a onclick="if(confirm('Apakah Anda Yakin Ingin Di Non Aktifkan')){ location.href='?site=F_Status_Kelas_Nonaktif&id=<?php echo $data['id']; ?>' }"><button class="btn btn-primary notika-btn-primary">Non Aktifkan</button></a>
        <?php }else{ ?>
          <a onclick="if(confirm('Apakah Anda Yakin Ingin Di Aktifkan')){ location.href='?site=F_Status_Kelas_Aktif&id=<?php echo $data['id']; ?>' }"><button class="btn btn-primary notika-btn-primary">Aktifkan</button></a>
       <?php } 
        ?>
        
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
 
    
