<?php
$typesport_id = $_POST['typesport_id'];
$name = $_POST['name'];
$status = $_POST['satatus'];

include 'connection.php';
$name = $_POST['name'];
$sql = "UPDATE `type_sport` SET `name` = '$name',`status` = '$status' WHERE `typesport_id` = $typesport_id ;";

if ($con->query($sql) === TRUE) {
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
if ($sql){
  echo "<script type='text/javascript'>";
  echo"alert('บันทึกสำเร็จ');";
  echo"window.location = 'typesport.php';";
  echo "</script>";
  }
  else {
  //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo"window.location = 'typesport.php'; ";
  echo"</script>";
  }
?>