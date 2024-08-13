
<div class="panel panel-default">
    <div class="panel-heading">
          Export Excel
    </div>
                  <div class="panel-body">
                      <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                              Export Excel
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Data Akun</h4>
                                        </div>
                                        <form action="../content/page/export_excel.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                        <div class="form-group">
                                            <label>Tanggal Awal*</label>
                                            <input type="date" class="form-control" name="tanggal1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Akhir*</label>
                                            <input type="date" class="form-control" name="tanggal2" required>
                                        </div>
                                        
                                       
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" name="simpan">Close</button>
                                            <button type="submit" class="btn btn-success" name="simpan">Export</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   
  <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Report
                        </h2>
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
                                            <th>Sales ID</th>
                                            <th>Nama Karyawan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Ruangan</th>
                                            <th>Jam</th>
                                            <th>Jam Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
include"koneksi.php";
$no=1;
$query=mysqli_query($koneksi, "SELECT * FROM booking a JOIN data_kelas b ON a.ID_kelas=b.ID_kelas JOIN employe c ON a.Sales_ID=c.Sales_ID WHERE a.Status_booking=3 ");
  while($data=mysqli_fetch_array($query)){ ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $data['Sales_ID']; ?></td>
      <td><?php echo $data['Salesman_Name']; ?></td>
      <td>
<?php
$tanggal=$data['Tanggal_Booking'];
echo date("d-F-Y", strtotime($tanggal));
 ?>  
      </td>
      <td><?php echo $data['Nama_kelas']; ?></td>
      <td><?php echo $data['Jam_Booking']; ?></td>
      <td><?php echo $data['finish']; ?></td>
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
