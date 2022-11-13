<?php
$typesport_id = $_POST['typesport_id'];
$sport_name = $_POST['sport_name'];
$balance = $_POST['balance'];
$number = $_POST['number'];
$sport_id  = $_POST['sport_id'];
$status_sport  = $_POST['status_sport'];

include 'connection.php';
$name = $_POST['name'];
$sql = "UPDATE `sports_equipment` SET sport_name ='$sport_name',typesport_id	= '$typesport_id',balance= '$balance',number='$number',status_sport='$status_sport' WHERE `sport_id` = $sport_id ;";
echo $sql;
if ($con->query($sql) === TRUE) {
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
if ($sql){
  echo "<script type='text/javascript'>";
  echo"alert('บันทึกสำเร็จ');";
  echo"window.location = 'sport.php';";
  echo "</script>";
  }
  else {
  //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo"window.location = 'sport.php'; ";
  echo"</script>";
  }
?>