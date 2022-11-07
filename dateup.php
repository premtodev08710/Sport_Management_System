
<?php
include 'connection.php';
$sql = "SELECT * FROM `borrow`";
$result = $con->query($sql);
$num = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $datestart = $row['start_date'];
        $dateend = $row['end_date'];
        
        $calculate = strtotime("$dateend") - strtotime("$datestart");
        $summary = floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
        echo "$summary วัน";
    }
}

?>