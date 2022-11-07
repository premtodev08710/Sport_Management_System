<?php

include 'connection.php';
$borrow_id = $_GET['borrow_id'];
$sport_id = $_GET['sport_id'];
$number = $_GET['number'];
echo $number;


$sql1 = "SELECT * FROM `sports_equipment` where sport_id = '$sport_id' ";
$result1 = $con->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while ($row = $result1->fetch_assoc()) {
        // echo 'ff';
        $number += $row['balance'];
        echo $number;
    }
}
$date1 = date("Y-m-d");

$sql = "UPDATE `borrow` SET `status` = '1' , `end_date` = '$date1' WHERE `borrow_id` = '$borrow_id'";

if ($con->query($sql) === TRUE) {
      echo "<script type='text/javascript'>";
    //   echo "alert('status  end_date ');";
    //   echo "window.location = 'borrow.php';";
      echo "</script>";
} else {
      echo "<script type='text/javascript'>";
      echo "alert('error เกิดข้อผิดพลาด !');";
    //   echo "window.location = 'borrow.php'; ";
    echo "</script>";
}

$sql0 = "UPDATE `sports_equipment` SET `balance` = '$number'  WHERE `sport_id` = '$sport_id';";

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

$con->close();
