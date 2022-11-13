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
    // echo $number;
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




  $sql = "SELECT * FROM `borrow` where `borrow_id` = '$borrow_id'";
  $result = $con->query($sql);
  $num = 0;
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $datestart = $row['start_date'];
      $dateend = $row['end_date'];

      $calculate = strtotime("$dateend") - strtotime("$datestart");
      $summary = floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
      if ($summary == 0) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกสำเร็จ');";
        echo "window.location = 'borrow.php';";
        echo "</script>";
      } else { 
        // ราคาค่าปรับ
        $price = $summary * 5;
        $sql = "INSERT INTO `receipt`(`borrow_id`, `date`, `price`)
         VALUES ('$borrow_id','$summary','$price')";
        if ($con->multi_query($sql) === TRUE) {
          echo "New records created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $con->error;
        }
      ?>
        <script type='text/javascript'>
          alert('เสียค่าปรับ เกินเวลาไปจำนวน <?=$summary.' วัน' ?>');
          window.location = 'receipt.php?id=<?=$borrow_id ?>';
        </script>

<?php

      }
    }
  }
} else {
  echo "<script type='text/javascript'>";
  echo "alert('error เกิดข้อผิดพลาด !');";
  echo "window.location = 'borrow.php'; ";
  echo "</script>";
  echo $sql0;
}

$con->close();
