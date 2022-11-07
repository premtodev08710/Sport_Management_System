<?php session_start(); ?>
<?php

$borrow_id = $_POST['borrow_id'];
$number = $_POST['number'];
$student_id = $_POST['student_id'];
$sport_id  = $_POST['sport_id'];


include 'connection.php';

$sql = "UPDATE `borrow` SET number = '$number', student_id = '$student_id', sport_id = '$sport_id' WHERE `borrow_id`='$borrow_id'";

if ($con->query($sql) === TRUE) {
  // echo "New record created successfully"; 
  echo "<script type='text/javascript'>";
  echo"alert('บันทึกสำเร็จ');";
  echo"window.location = 'borrow.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  // echo"window.location = 'borrow.php'; ";
  echo"</script>";
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

?>