<?php 
include"koneksi.php";
$query=mysqli_query($koneksi, "SELECT d.Salesman_Name, a.id, a.status, a.start, a.end, a.name as kegiatan, c.nama, b.name as namakelas FROM reservations a JOIN rooms b ON a.room_id=b.id JOIN d_reservations c ON a.paid=c.id_paid JOIN employe d ON d.Sales_ID=c.nama  WHERE a.id='$_GET[id]'");
$tampil=mysqli_fetch_array($query);
?>
<div class="col-md-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail Permohonan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                                <td>Nama Employe</td>
                                                <td>:</td>
                                                <td><?php echo $tampil['Salesman_Name']; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Kegiatan</td>
                                                <td>:</td>
                                                <td><?php echo $tampil['kegiatan']; ?></td>
                                        </tr>
                                          <tr>
                                                <td>Nama Ruangan</td>
                                                <td>:</td>
                                                <td><?php echo $tampil['namakelas']; ?></td>
                                        </tr>
                                          <tr>
                                                <td>Start</td>
                                                <td>:</td>
                                                <td><?php
                                                $tanggal=$tampil['start'];
                                                echo date("d-F-Y H:i:s", strtotime($tanggal));
                                                 ?> </td>
                                        </tr>
                                           <tr>
                                                <td>Sampai Tanggal</td>
                                                <td>:</td>
                                                <td><?php
                                                $tanggal2=$tampil['end'];
                                                echo date("d-F-Y H:i:s", strtotime($tanggal2));
                                                 ?>  </td>
                                        </tr>
                                         <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td> <?php 
                                                    if ($tampil['status']=="New") {
                                                        echo "Menunggu Approved";
                                                    }else{
                                                        echo $tampil['status'];
                                                    }
                                                    ?>
                                                    
                                                </td>
                                        </tr>
                                            
                                        </tr>
                                
                                        
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

