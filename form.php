<?php
include 'conn.php';
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required>
    <br>
    <input type="text" name="description" placeholder="description" required>
    <br>
    <input type="text" name="content" placeholder="Content" required>
    <br>
    Video: <input type="file" name="video" id="video" required>
    <br>
    <input type="date" name="date" placeholder="Date" required>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php 
$title = "";
?>
<?php
if (isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    $fileName = $_FILES['video']['name'];
    $fileTmpName = $_FILES['video']['tmp_name'];
    $fileExt = explode('.', $fileName);
    $uploadOk = 1;
    $fileActualExt = strtolower(end($fileExt));
    // Check videoFileType is valid
    if ($fileActualExt !== "mp4" && $fileActualExt !== "avi" && $fileActualExt !== "mov" && $fileActualExt !== "wmv" && $fileActualExt !== "flv" && $fileActualExt !== "3gp") {
        echo "Sorry, only MP4, AVI, MOV, WMV, FLV & 3GP files are allowed.";
        $uploadOk = 0;
    }
    //check if file name is existed
    $sql = "SELECT * FROM resources WHERE resources = '$fileName'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "File name is existed, please change file name.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "<br>";
        echo "There was an error uploading your file, please try again.";
    } else {
        move_uploaded_file($fileTmpName, $target_file);
        $sql = "INSERT INTO `uploads` (`resources`) VALUES ('$fileName')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Upload video successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $resourceID = "SELECT resourceID FROM uploads WHERE resources = '$fileName'";
        $result = mysqli_query($conn, $resourceID);
        $row = mysqli_fetch_assoc($result);
        $resourceID = $row['resourceID'];
        //get data from form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $sql = "INSERT INTO `news` (`title`, `description`, `content`, `date`, `resourceID`) VALUES ('$title', '$description', '$content', '$date', '$resourceID')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Insert data successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<?php
//echo all data from news table
$sql = "SELECT title, description, content, date, resources  FROM `news`, uploads WHERE news.uploadID = uploads.uploadID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div>
            <h1><?php echo $row['title']; ?></h1>
            <p><?php echo $row['description']; ?></p>
            <p><?php echo $row['content']; ?></p>
            <p><?php echo $row['date']; ?></p>
            <video width="320" height="240" controls >
                <source src="resource/<?php echo $row['resources']; ?>" type="video/mp4">
            </video>
        </div>
<?php }
} else {
    echo "0 results";
}
?>