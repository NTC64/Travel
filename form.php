<?php 
include 'conn.php';
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" > 
    <br>
    <input type="text" name="description" placeholder="description">
    <br>
    <input type="text" name="content" placeholder="Content" >
    <br>
    Video: <input type="file" name="video" id="">
    <br>
    <input type="date" name="date" placeholder="Date" >
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $video = $_POST['video'];
    $date = $_POST['date'];
    $sql = "INSERT INTO `access` (`title`, `description`, `content`, `video`, `date`) VALUES ('$title', '$description', '$content', '$video', '$date')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
