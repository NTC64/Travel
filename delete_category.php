<?php
include 'conn.php';
?>
<?php
$category_tours_ID = $_GET['categoryID'];
$sql = "delete from category_news where categoryID = '$category_tours_ID'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>