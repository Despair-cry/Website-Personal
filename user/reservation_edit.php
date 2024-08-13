<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Event</title>
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>

        <style>
        .table-line {
	width: 100%;
	border-collapse: collapse;
}

.table-line th {
	background: #850785;
	color: #FFFFFF;
	padding: 1em;
	text-align: left;
	text-transform: uppercase;
}

.table-line td {
	border-bottom: 1px solid #DDDDDD;
	color: #666666;
	padding: 1em;
}
        </style>
    </head>
    <body>
        <?php
            // check the input
            is_numeric($_GET['id']) or die("invalid URL");
            
            require_once '_db.php';
            
            $stmt = $db->prepare('SELECT * FROM reservations JOIN d_reservations ON reservations.paid=d_reservations.id_paid JOIN employe ON  employe.Sales_ID=d_reservations.nama WHERE reservations.id = :id');
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
            $reservation = $stmt->fetch();
            
            $rooms = $db->query('SELECT * FROM rooms');
        ?>
        <form id="f" action="backend_update.php" style="padding:20px;">
            <input type="hidden" name="id" value="<?php print $_GET['id'] ?>" />
            <h1>Detail Booking</h1>
            <table class="table-line">
            <tr>
                <td>Nama Pembooking</td>
                <td>:</td>
                <td><?php print $reservation['Salesman_Name'] ?></td>
            </tr>
            <tr>
                <td>Judul Kegiatan</td>
                <td>:</td>
                <td><?php print $reservation['name'] ?></td>
            </tr>
            <tr>
                <td>Start</td>
                <td>:</td>
                <td><?php
$tanggal=$reservation['start'];
echo date("d-F-Y H:i:s", strtotime($tanggal));
 ?> </td>
            </tr>
            <tr>
                <td>End</td>
                <td>:</td>
                <td><?php
$tanggal2=$reservation['end'];
echo date("d-F-Y H:i:s", strtotime($tanggal2));
 ?> </td>
            </tr>
            <tr>
                <td>Status Permintaan</td>
                <td>:</td>
                <td>
                <?php 
                    if($reservation['status']=="New"){
                        echo"Menunggu Confirmed";
                    }else{
                        echo $reservation['status'];
                    }
                
                ?></td>
            </tr>
            </table>
            
            
            <!-- <div class="space">
                <div>Room:</div>
                <div>
                    <select id="room" name="room" readonly>
                        <?php 
                            foreach ($rooms as $room) {
                                $selected = $reservation['room_id'] == $room['id'] ? ' selected="selected"' : '';
                                $id = $room['id'];
                                $name = $room['name'];
                                print "<option value='$id' $selected>$name</option>";
                            }
                        ?>
                    </select>
                </div>
            </div> -->
            
            
            
            <!-- <div class="space">
                <div>Status:</div>
                <div>
                    <select id="status" name="status">
                        <?php 
                            $options = array("New", "Confirmed", "Arrived", "CheckedOut");
                            foreach ($options as $option) {
                                $selected = $option == $reservation['status'] ? ' selected="selected"' : '';
                                $id = $option;
                                $name = $option;
                                print "<option value='$id' $selected>$name</option>";
                            }
                        ?>
                    </select>                
                </div>
            </div> -->
            
            <!-- <div class="space">
                <div>Paid:</div>
                <div>
                    <select id="paid" name="paid">
                        <?php 
                            $options = array(0, 50, 100);
                            foreach ($options as $option) {
                                $selected = $option == $reservation['paid'] ? ' selected="selected"' : '';
                                $id = $option;
                                $name = $option."%";
                                print "<option value='$id' $selected>$name</option>";
                            }
                        ?>
                    </select>
                </div>
            </div> -->
            
            <!-- <div class="space">
                <input type="submit" value="Save" /> <a href="javascript:close();">Cancel</a>
            </div> -->
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
