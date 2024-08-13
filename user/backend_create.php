<?php
require_once '_db.php';

$stmt = $db->prepare("INSERT INTO reservations (name, start, end, room_id, status, paid) VALUES (:name, :start, :end, :room, 'New', :paid)");
$stmt->bindParam(':start', $_POST['start']);
$stmt->bindParam(':end', $_POST['end']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':room', $_POST['room']);
$stmt->bindParam(':paid', $_POST['paid']);
$stmt->execute();

$a = $db->prepare("INSERT INTO d_reservations (id_detail, id_paid, nama) VALUES (:id_detail, :paid, :nama)");
$a->bindParam(':id_detail', $_POST['detail']);
$a->bindParam(':paid', $_POST['paid']);
$a->bindParam(':nama', $_POST['nama']);
$a->execute();
class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$db->lastInsertId();
$response->id = $db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
