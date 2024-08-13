<?php 
session_start();
?>

<?php
    include"koneksi.php";
    $kd = "BKRM" ;
    $qry = mysqli_query($koneksi, "SELECT MAX(ID_Booking) AS ID_Booking FROM booking WHERE ID_Booking like '$kd%' ");
    $dt = mysqli_fetch_array($qry);
    $ambil = $dt['ID_Booking'];
    $no = substr($ambil,4,4);
    $urut = $no + 1;
    $new = $kd . sprintf("%04s", $urut);
?>

<div class="panel panel-default">
    <div class="panel-heading">
          Booking Room
    </div>
                  <div class="panel-body">
                      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Booking Room
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Booking Room</h4>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                        <input  class="form-control" name="kode_ruangan" value="<?php  echo $new; ?>" type="hidden">
                                        <div class="form-group">
                                            <label>Tanggal Booking*</label>
                                            <input type="date" class="form-control"  name="tanggal" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Ruangan*</label>
                                            <select  name="ruangan" required class="form-control">
                                                     <?php
                                                        include"koneksi.php";
                                                        $q=mysqli_query($koneksi,"SELECT * FROM data_kelas WHERE status=1");
                                                            foreach ($q as $kelas ) { ?>
                                                                 <option value="<?php echo $kelas['ID_kelas']; ?>"><?php echo $kelas['Nama_kelas']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mulai Di Gunakan*</label>
                                            <input type="time" class="form-control"  name="jam" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <textarea name="catatan" class="form-control" placeholder="Enter Catatan"></textarea>
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
 
  $kode=$_POST['kode_ruangan'];
  $tanggal=$_POST['tanggal'];
  $pilih_ruangan=$_POST['ruangan'];
  $jam=$_POST['jam'];
  $catatan=$_POST['catatan'];
  $id=$_SESSION['Sales_ID'];

$q=mysqli_query($koneksi, "SELECT * FROM booking a JOIN employe b ON a.Sales_ID=b.Sales_ID WHERE a.ID_kelas='$pilih_ruangan' AND a.Tanggal_Booking='$tanggal' AND a.Status_booking=1 ");
$cek=mysqli_num_rows($q);

  if ($cek > 0) {
    echo"<script>alert ('Ruangan Sudah Di Booking') </script>";
    echo"<meta http-equiv='refresh' content=1;URL=?site=Data_Room>";    
  }else{
     mysqli_query($koneksi, "INSERT INTO booking VALUES('','$kode','$id','$pilih_ruangan','$tanggal','$jam','$catatan','1','')");
    
    echo"<script>alert ('Berhasil Membooking Ruangan') </script>";
    echo"<meta http-equiv='refresh' content=1;URL=?site=Data_Approved>";
  }

   


}

?>

        <!--/. NAV TOP  -->
        <!-- /. NAV SIDE  -->
        

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
 
    
