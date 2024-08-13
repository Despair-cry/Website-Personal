<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Reservation</title>
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <style>
.depth {
display: block;
border: 1px solid silver;
background: linear-gradient(#eee, #fff);
transition: all 0.3s ease-out;
padding: 5px;
color: #555;
width: 300px;
}
.depth:focus {
outline: none;
background-position: 0 -1.7em;
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

.form_input{
    /*membuat lebar form penuh*/
    box-sizing : border-box;
    width: 500px;
    padding: 10px;
    font-size: 10pt;
    margin-bottom: 20px;
}
label{
    font-size: 13pt;
    font-family: Lucida;
}
        </style>
    </head>
    <body>
        <?php
            // check the input
            //is_numeric($_GET['id']) or die("invalid URL");
            
            require_once '_db.php';
            
            $rooms = $db->query('SELECT * FROM rooms');
            
            $start = $_GET['start']; // TODO parse and format
            $end = $_GET['end']; // TODO parse and format
        ?>
<?php
    include"koneksi.php";
    $kd = "BK" ;
    $qry = mysqli_query($koneksi, "SELECT MAX(paid) AS paid FROM reservations where paid like '$kd%' ");
    $dt = mysqli_fetch_array($qry);
    $ambil = $dt['paid'];
    $no = substr($ambil,7,2);
    $new = $kd . sprintf("%07s", $urut);
?>
<?php
    include"koneksi.php";
    $kd = "D" ;
    $qry = mysqli_query($koneksi, "SELECT MAX(id_detail) AS id_detail FROM d_reservations where id_detail like '$kd%' ");
    $dt = mysqli_fetch_array($qry);
    $ambil = $dt['id_detail'];
    $no = substr($ambil,7,1);
    $detail = $kd . sprintf("%07s", $urut);
?>
  
        <form id="f" action="backend_create.php" style="padding:20px;">
            
            
            <h1>Booking Ruangan</h1>
            <div class="space">
                <div><input type="hidden" id="paid" name="paid" value="<?php echo $new; ?>"  /></div>
            </div>
            <div class="space">
                <div><input type="hidden" id="detail" name="detail" value="<?php echo $detail; ?>"  /></div>
            </div>
            <div class="space">
                <div><input type="hidden" id="nama" name="nama"  class="depth" value="<?php echo $_SESSION['Sales_ID']; ?>" required="" readonly /></div>
            </div>
            <div class="space">
                <div><label>Kegiatan/Event</label></div>
                <div><input type="text" id="name" name="name" value="" class="form_input" placeholder="Enter Kegiatan" required=""  /></div>
            </div>
            
            <div class="space">
                <div><label>Start</label></div>
                <div><input type="datetime-local" class="form_input" id="start" name="start" value="<?php echo $start ?>" required=""  /></div>
            </div>
            
            <div class="space">
                <div><label>End</label></div>
                <div><input type="datetime-local" class="form_input" id="end" name="end" value="<?php echo $end ?>" required=""  /></div>
            </div>
            
            <div class="space">
                <div><label>Room</label></div>
                <div>
                    <select id="room" name="room" class="form_input">
                        <?php 
                            foreach ($rooms as $room) {
                                $selected = $_GET['resource'] == $room['id'] ? ' selected="selected"' : '';
                                $id = $room['id'];
                                $name = $room['name'];
                                print "<option value='$id' $selected>$name</option>";
                            }
                        ?>
                    </select>

                </div>
            </div>
            
            <div class="space"><input type="submit" value="Save" class="button-flat" name="simpan" /></div>
        </form>
        
        <script type="text/javascript">
        function close(result) {
            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                parent.DayPilot.ModalStatic.close(result);
            }
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>
        
    </body>
</html>
