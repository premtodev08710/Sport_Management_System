<?php

include 'connection.php';
$ID = $_GET['ID'];
$sql = "DELETE FROM `user` WHERE `ID` =  $ID";

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