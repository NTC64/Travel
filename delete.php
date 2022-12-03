<?php
include 'conn.php';
?>
<?php
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $sql = "delete from access where userID = $ID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<?php
if (isset($_GET['categoryNews'])) {
    $category_news_ID = $_GET['categoryNews'];
    $sql = "delete from category_news where categoryNews = '$category_news_ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<?php
if (isset($_GET['categoryTours'])) {
    $category_tours_ID = $_GET['categoryTours'];
    $sql = "delete from category_tours where categoryTours = '$category_tours_ID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>