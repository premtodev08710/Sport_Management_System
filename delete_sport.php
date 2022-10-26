<?php

include 'connection.php';
$sport_id = $_GET['sport_id'];
$sql = "DELETE FROM `sports_equipment` WHERE `sport_id` =  $sport_id";

if ($con->query($sql) === TRUE) {
  echo "<script type='text/javascript'>";
  echo"alert('ลบสำเร็จ');";
  echo"window.location = 'sport.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo"window.location = 'sport.php'; ";
  echo"</script>";
}

$con->close();

?>