
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Report.xls");
?>



                            <table id="data-table-basic" class="table table-striped">
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
$start=$_POST['tanggal1'];
$end=$_POST['tanggal2'];
$query=mysqli_query($koneksi, "SELECT * FROM booking a JOIN data_kelas b ON a.ID_kelas=b.ID_kelas JOIN employe c ON a.Sales_ID=c.Sales_ID WHERE a.Status_booking=3 AND a.Tanggal_Booking >= '$start' AND a.Tanggal_Booking <='$end'   ");
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
                        