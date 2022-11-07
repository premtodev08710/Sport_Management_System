<?php session_start(); ?>
<?php
include 'connection.php';
$id = $_SESSION["UserID"];
$sql1 = "SELECT * FROM `user` where ID = '$id' ";
$result1 = $con->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while ($row = $result1->fetch_assoc()) {
    
        echo $row['Firstname'].' '.$row['Lastname'];
    
    }
} ?>