<?php 
session_start();
  if(!isset($_SESSION['Sales_ID']) ){

    header("location:../index.php");
    
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HMSI Jatake</title>
        <!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />

	<!-- helper libraries -->
	<script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>

	<!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

        <link type="text/css" rel="stylesheet" href="icons/style.css" />
        <link href="image/logo2.png" type="image/png" rel="icon">

        <style type="text/css">
            body, input, button, select {
                font-size: 14px;
            }
            
            select {
                padding: 5px;
            }
            
            .toolbar {
                margin: 10px 0px;
            }
            
            .toolbar button {
                padding: 5px 15px;
            }
            
            .icon {
                font-size: 14px;
                text-align: center;
                line-height: 14px;
                vertical-align: middle;

                cursor: pointer;
            }
            
            .toolbar-separator {
                width: 1px;
                height: 28px;
                /*content: '&nbsp;';*/
                display: inline-block;
                box-sizing: border-box;
                background-color: #ccc;
                margin-bottom: -8px;
                margin-left: 15px;
                margin-right: 15px;
            }

            .scheduler_default_rowheader_inner
            {
                border-right: 1px solid #2F4F4F;
            }
            .scheduler_default_rowheadercol2
            {
                background: White;
            }
            .scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                top: 2px;
                bottom: 2px;
                left: 2px;
                background-color: transparent;
                border-left: 5px solid #38761d; /* green */
                border-right: 0px none;
            }
            .status_dirty.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                border-left: 5px solid #cc0000; /* red */
            }
            .status_cleanup.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                border-left: 5px solid #e69138; /* orange */
            }
            /* Remove margins and padding from the list, and add a black background color */
ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

/* Float the list items side by side */
ul.topnav li {float: left;}

/* Style the links inside the list items */
ul.topnav li a {
    display: inline-block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.topnav li a:hover {background-color: #111;}

/* Hide the list item that contains the link that should open and close the topnav on small screens */
ul.topnav li.icon {display: none;}

/* Saat lebar layar kurang dari 680 pixel, sembunyikan semua menu item kecuali item yang pertama yaitu("Home"). Tampilkan juga list item yang berisi link untuk membuka menu yaitu (li.icon) */
@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
}

/* Class dengan nama "responsive" akan ditambahkan oleh JavaScript saat user mengklik icon. Munculnya Class ini akan mendisplay isi list menu 
*/
@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive li.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive li {
    float: none;
    display: inline;
  }
  ul.topnav.responsive li a {
    display: block;
    text-align: left;
  }
}

.button-flat {
	border: 1px solid #801515;        /* border: tebal[px] tipe[solid,dashed,dotted] warna[#hex, rgb()]; */
	background-color: #801515;        /* ubah warna background */
	color: #FFFFFF;                   /* ubah warna font */
	font-size: 16px;                  /* ubah ukuran font */
	padding: 0.5em 1em 0.5em 1em;     /* padding: top right bottom left; */
}
.button-flat:hover {
	opacity: 0.8;                     /* ubah tingkat transparansi saat cursor menuju button. 0.0 s.d 1.0 */
}
.button-flat:active {
	background: #550000;              /* ubah background saat button ditekan */
}

        </style>

    </head>
    <body>  
<ul class="topnav">
  <li><a href="index.php">Booking Room</a></li>
  <li><a href="permintaan.php">Permintaan Booking</a></li>
  <li><a onclick="if(confirm('Apakah Anda Yakin Ingin Logout ?')){ location.href='logout.php' }">Logout</a></li>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">☰</a>
  </li>
</ul>
            <div id="">
                <div class="bg-help">
                    <div class="inBox">
                        <img src="logo.png"  width="350px" style="padding-top:5px;">
                        <hr class="hidden" />
                    </div>
                </div>
            </div>
            <div class="shadow"></div>
            <div class="hideSkipLink">
            </div>
            <div class="main">

                <div style="width:220px; float:left;">
                    <div id="nav"></div>
                </div>

                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Ruangan</th>
            <th>Tanggal Booking</th>
            <th>Sampai Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include 'koneksi.php';
        $id=$_SESSION['Sales_ID'];
        $query= mysqli_query($koneksi,"SELECT DISTINCT(a.paid), a.id, a.start, a.end, a.status, b.nama, c.name, a.paid FROM reservations a JOIN d_reservations b ON a.paid=b.id_paid JOIN rooms c ON a.room_id=c.id WHERE b.nama='$id' ");
        while($row = mysqli_fetch_array($query))
        { ?>
            <tr>
            <td><?php echo $row['name']; ?></td>
            <td>
                <?php
                    $tanggal=$row['start'];
                    echo date("d-F-Y H:i:s", strtotime($tanggal));
                ?> 
            </td>
            <td>  
                <?php
                    $tanggal1=$row['end'];
                    echo date("d-F-Y H:i:s", strtotime($tanggal1));
                ?></td>
            <td>
            <?php 
            if($row['status']=="New"){ ?>
                 <a onclick="if(confirm('Apakah Yakin Ingin Batalkan Permintaan ??')){ location.href='batal.php?id=<?php echo $row['paid']; ?>' }" ><input type="submit" value="Batalkan Permintaan" class="button-flat" /></a>
           <?php }else{
               echo $row['status'];
           }
            
            ?></td>
        </tr>
        <?php } ?>
    </tbody>
 
    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

                </div>

   
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}
</script>



            </div>
            <div class="clear">
            </div>

            
    </body>
</html>
