<?php
$ID = $_POST['ID'];
$student_id = $_POST['student_id'];
$Username = $_POST['Username'];
// $Password  = md5($_POST['Password']);
$Firstname  = $_POST['Firstname'];
$Lastname  = $_POST['Lastname'];
$Userlevel = $_POST['Userlevel'];

include 'connection.php';

$sql = "UPDATE `user` SET `student_id`='$student_id',
`Username`='$Username',`Firstname`='$Firstname',
`Lastname`='$Lastname',`Userlevel`='$Userlevel' WHERE `ID`='$ID'";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully"; 
  echo "<script type='text/javascript'>";
  echo"alert('บันทึกสำเร็จ');";
  echo"window.location = 'user.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo"window.location = 'user.php'; ";
  echo"</script>";
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

?>