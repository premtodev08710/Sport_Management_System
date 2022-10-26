<?php

include 'connection.php';
$typesport_id = $_GET['typesport_id'];
$sql = "DELETE FROM `type_sport` WHERE `typesport_id` = $typesport_id";

if ($con->query($sql) === TRUE) {
  echo "<script type='text/javascript'>";
  echo"alert('ลบสำเร็จ');";
  echo"window.location = 'typesport.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo"window.location = 'typesport.php'; ";
  echo"</script>";
}

$con->close();

?>