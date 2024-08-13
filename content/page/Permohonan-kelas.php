<?php 
session_start();
?>

        <!--/. NAV TOP  -->
        <!-- /. NAV SIDE  -->
        <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           
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
                             
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Ruangan</th>
                                        <th>Tanggal Booking</th>
                                        <th>Sampai Tanggal</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
include"koneksi.php";
$no=1;
$query=mysqli_query($koneksi, "SELECT DISTINCT(a.paid), a.id, a.start, a.end, a.status, b.nama, c.name, a.paid FROM reservations a JOIN d_reservations b ON a.paid=b.id_paid JOIN rooms c ON a.room_id=c.id WHERE a.status='New'  ");
  foreach ($query as $data ) { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['name']; ?></td>
      <td>
<?php
$tanggal=$data['start'];
echo date("d-F-Y H:i:s", strtotime($tanggal));
 ?> 
      </td>
      </td>
      <td><?php
$tanggal2=$data['end'];
echo date("d-F-Y H:i:s", strtotime($tanggal2));
 ?> </td>
      <td> 
        <?php
        if ($data['status']=="New") {
            echo "Menunggu Approved";
        }elseif ($data['status']=="Confirmed") {
            echo "Berhasil Di Approved";
        }else{
            echo "Di Batalkan";
        }

         ?></td>
      <td width="250">
       <a onclick="if(confirm('Apakah Yakin Di Anda Approve')){ location.href='?site=Approve&id=<?php echo $data['id']; ?>' }" ><button class="btn btn-primary notika-btn-primary" name="approve">Approve</button></a>
        <a onclick="if(confirm('Apakah Yakin Ingin Di Batalkan')){ location.href='?site=Batal_Permohonan&id=<?php echo $data['paid']; ?>' }" ><button class="btn btn-danger notika-btn-danger">Batalkan</button></a>
        <a href="?site=Detail_Permintaan&id=<?php echo $data['id']; ?>"><button class="btn btn-info notika-btn-info">Detail</button></a>
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
 
    
