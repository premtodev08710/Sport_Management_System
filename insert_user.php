<?php

include 'connection.php';
$student_id = $_POST['student_id'];
$Username = $_POST['Username'];
$Password  = md5($_POST['Password']);
$Firstname  = $_POST['Firstname'];
$Lastname  = $_POST['Lastname'];
$Userlevel = 'M';

$sql = "INSERT INTO `user`( `student_id`, `Username`, `Password`, `Firstname`, `Lastname`, `Userlevel`) 
VALUES ('$student_id','$Username','$Password','$Firstname','$Lastname','$Userlevel')";
echo $sql ;
if ($con->query($sql) === TRUE) {
  echo "<script type='text/javascript'>";
  echo "alert('บันทึกสำเร็จ');";
  echo "window.location = 'user.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo "window.location = 'user.php'; ";
  echo "</script>";
}

$con->close();
?>
