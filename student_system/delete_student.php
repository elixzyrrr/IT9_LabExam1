<?php
include 'db.php';

$db = new Database();
$conn = $db->connect();

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id_number='$id'";
$conn->query($sql);

header("Location: student_list.php");
?>