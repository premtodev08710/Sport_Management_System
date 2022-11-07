<?php

include 'connection.php';
$number = $_POST['number'];
$student_id = $_POST['student_id'];
$sport_id  = $_POST['sport_id'];


$sql1 = "SELECT * FROM `sports_equipment` where sport_id = '$sport_id' ";
$result1 = $con->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while ($row = $result1->fetch_assoc()) {
      
        $balance =$row['balance'];
        $number1 = $row['balance'] - $number;
        echo $number;
    }
}

if ($balance < $number ){
  echo "<script type='text/javascript'>";
  echo "alert('ยืมไม่สำเร็จเนื่องจากจำนวนยืมเยอะกว่าสต็อกที่มี');";
  echo "window.location = 'borrow.php'; ";
  echo "</script>";
}
else{
  
  $start_date = date("Y-m-d");
  $end_date = date("Y-m-d");
  $sql = "INSERT INTO `borrow` (`borrow_id`, `student_id`, `sport_id`, `start_date`, `end_date`, `number`, `status`)
   VALUES (NULL, '$student_id', '$sport_id', '$start_date', '$end_date', '$number', '0');";
  
  if ($con->query($sql) === TRUE) {
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกสำเร็จ');";
    echo "window.location = 'borrow.php';";
    echo "</script>";
  } else {
    echo "<script type='text/javascript'>";
    echo "alert('error เกิดข้อผิดพลาด !');";
    echo "window.location = 'borrow.php'; ";
    echo "</script>";
  }
  
  
  
  $sql0 = "UPDATE `sports_equipment` SET `balance` = '$number1'  WHERE `sport_id` = '$sport_id';";
  
  if ($con->query($sql0) === TRUE) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกสำเร็จ');";
        echo "window.location = 'borrow.php';";
        echo "</script>";
  } else {
        echo "<script type='text/javascript'>";
        echo "alert('error เกิดข้อผิดพลาด !');";
        echo "window.location = 'borrow.php'; ";
      echo "</script>";
      echo $sql0;
  }
}


$con->close();
