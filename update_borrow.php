<?php session_start(); ?>
<?php
include 'connection.php';
$borrow_id = $_POST['borrow_id'];
$number = $_POST['number'];
$student_id = $_POST['student_id'];
$sport_id  = $_POST['sport_id'];

$sql2 = "SELECT * FROM `sports_equipment` where sport_id = '$sport_id' ";
$result2 = $con->query($sql2);


if ($result2->num_rows > 0) {
    // output data of each row
    while ($row1 = $result2->fetch_assoc()) {
      $balance = $row1['balance'];
     
      
    }
}

$sql1 = "SELECT * FROM `borrow` where borrow_id = '$borrow_id' ";
$result1 = $con->query($sql1);


if ($result1->num_rows > 0) {
    // output data of each row
    while ($row = $result1->fetch_assoc()) {
        // echo 'ff';
       $num = $row['number'] + $balance ;
       
    }
}




if($num < $number){
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาดยืมอุปกรณ์เกินจำนวนที่มี !');";
  echo "window.location = 'borrow.php'; ";
echo "</script>";
}else{
  $sql0 = "UPDATE `sports_equipment` SET `balance` = '$num'  WHERE `sport_id` = '$sport_id';";
  // echo $num; //ใช้คืนของก่อนแก้ใขจำนวนจริง
 if ($con->query($sql0) === TRUE) {
       echo "<script type='text/javascript'>";
       echo "alert('ใช้คืนของก่อนแก้ใขจำนวนจริง');";
       // echo "window.location = 'borrow.php';";
       echo "</script>";
 
 } else {
       echo "<script type='text/javascript'>";
       echo "alert('error เกิดข้อผิดพลาด !');";
       echo "window.location = 'borrow.php'; ";
     echo "</script>";
     echo $sql0;
 }
  $sql0 = "UPDATE `borrow` SET `number` = '$number', `student_id` = '$student_id'  WHERE `borrow_id` = '$borrow_id';";
  // ยืมต่อ
  if ($con->query($sql0) === TRUE) {
        echo "<script type='text/javascript'>";
        echo "alert('ยืมต่อสำเร็จ');";
        echo "window.location = 'borrow.php';";
        echo "</script>";
  } else {
        echo "<script type='text/javascript'>";
        echo "alert('error เกิดข้อผิดพลาด !');";
        echo "window.location = 'borrow.php'; ";
      echo "</script>";
      echo $sql0;
  }
  echo $sum = $num - $number ;
  $sql1 = "UPDATE `sports_equipment` SET `balance` = '$sum'  WHERE `sport_id` = '$sport_id';";
// ตัดสต็อก
if ($con->query($sql1) === TRUE) {
      echo "<script type='text/javascript'>";
      echo "alert('ตัดสต็อกสำเร็จ');";
      echo "window.location = 'borrow.php';";
      echo "</script>";
} else {
      echo "<script type='text/javascript'>";
      echo "alert('error เกิดข้อผิดพลาด !');";
      echo "window.location = 'borrow.php'; ";
    echo "</script>";
    echo $sql1;
}


}


$con->close();

?>