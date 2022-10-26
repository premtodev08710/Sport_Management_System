<?php

include 'connection.php';
$sport_name = $_POST['sport_name'];
$typesport_id = $_POST['typesport_id'];
$balance = $_POST['balance'];
$number = $_POST['number'];

$sql = "INSERT INTO `sports_equipment` VALUES (NULL, '$sport_name', '$typesport_id', '$balance', '$number');";

if ($con->query($sql) === TRUE) {
  echo "<script type='text/javascript'>";
  echo "alert('บันทึกสำเร็จ');";
  echo "window.location = 'sport.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo "window.location = 'sport.php'; ";
  echo "</script>";
}

$con->close();
