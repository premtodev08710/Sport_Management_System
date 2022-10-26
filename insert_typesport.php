<?php

include 'connection.php';
$name = $_POST['name'];
$sql = "INSERT INTO `type_sport` (`typesport_id`, `name`) VALUES (NULL, '$name');";

if ($con->query($sql) === TRUE) {
  echo "<script type='text/javascript'>";
  echo"alert('บันทึกสำเร็จ');";
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