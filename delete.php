<?php 
include 'conn.php';
$ID = $_GET['ID'];
$sql = "delete from access where userID = $ID";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}