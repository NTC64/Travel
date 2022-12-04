<?php
include 'conn.php';
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="categoryTours" placeholder="categoryTours" />
    <br>
    <input type="text" name="sellerID" placeholder="sellerID" />
    <br>
    <input type="text" name="tourName" placeholder="tourName" />
    <br>
    <input type="text" name="tourPrice" placeholder="tourPrice" />
    <br>
    <input type="text" name="tourDescription" placeholder="tourDescription" />
    <br>
    <input type="file" name="tourImage" placeholder="tourImage" required />
    <br>
    <input type="text" name="tourLocation" placeholder="tourLocation" />
    <br>
    <input type="date" name="tourDate" placeholder="tourDate" />
    <br>
    <input type="text" name="tourTime" placeholder="tourTime" />
    <br>
    <input type="submit" name="submit" value="submit" />
</form>
<?php
//insert data   
if (isset($_POST['submit'])) {
    $categoryTours = $_POST['categoryTours'];
    $sellerID = $_POST['sellerID'];
    $tourName = $_POST['tourName'];
    $tourPrice = $_POST['tourPrice'];
    $tourDescription = $_POST['tourDescription'];
    $tourImage = $_FILES['tourImage']['name'];
    $tourLocation = $_POST['tourLocation'];
    $tourDate = $_POST['tourDate'];
    $tourTime = $_POST['tourTime'];
    //upload image
    $target_dir = "uploads/images/";
    $target_file = $target_dir . basename($_FILES["tourImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo '<script>alert("Sorry, file already exists.")</script>';
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["tourImage"]["size"] > 500000) {
        echo '<script>alert("Sorry, your file is too large.")</script>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"  && $imageFileType != "gif") {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<script>alert("Sorry, your file was not uploaded.")</script>';
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["tourImage"]["tmp_name"], $target_file)) {
            echo '<script>alert("The file ' . htmlspecialchars(basename($_FILES["tourImage"]["name"])) . ' has been uploaded.")</script>';
            //insert data
            $sql = "INSERT INTO tours (categoryTours, sellerID, tourName, tourPrice, tourDescription, tourImage, tourLocation, tourDate, tourTime) VALUES ('$categoryTours', '$sellerID', '$tourName', '$tourPrice', '$tourDescription', '$tourImage', '$tourLocation', '$tourDate', '$tourTime')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Data inserted successfully")</script>';
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<div>

</div>