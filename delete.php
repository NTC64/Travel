<?php 
include 'conn.php';
$ID = $_GET['ID'];
$category_tours_ID = $_GET['categoryID'];
//delete table depend on assigned value
if($categoryID !== null){
    $sql = "delete from category_news where categoryID = '$category_tours_ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $sql = "delete from news where newsID = '$ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
//What is the difference between 0 and null?
//0 is a value, null is a state.