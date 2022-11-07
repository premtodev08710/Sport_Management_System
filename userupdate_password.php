<?php session_start(); ?>
<?php

$ID = $_SESSION["UserID"];

$Password  = md5($_POST['Password']);



include 'connection.php';

$sql = "UPDATE `user` SET `Password`='$Password' WHERE `ID`='$ID'";

if ($con->query($sql) === TRUE) {
  // echo "New record created successfully";
  echo "<script type='text/javascript'>";
  echo "alert('บันทึกสำเร็จ');";
  echo "window.location = 'user_index.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo"window.location = 'user_index.php'; ";
  echo"</script>";
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

?>