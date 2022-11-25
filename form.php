<?php include 'conn.php' ?>
<div class="create createnews hide">
    <form action="" method="POST" class="create__form" enctype="multipart/form-data">
        <div class="up__title">
            <h3 class="my-3">Create News</h3>
        </div>
        <input type="text" class="crnewsname" name="title" required value="<?php if (isset($_POST['title'])) {
                                                                                echo $_POST['title'];
                                                                            } ?>" placeholder="Title" />
        <textarea name="describe" class="crdescribe" cols="30" rows="10" required value="<?php if (isset($_POST['describe'])) {
                                                                                                echo $_POST['describe'];
                                                                                            } ?>" placeholder="Describe"></textarea>
        <textarea name="content" class="crbody" cols="30" rows="10" required value="<?php if (isset($_POST['content'])) {
                                                                                        echo $_POST['content'];
                                                                                    } ?>" placeholder="Enter content"></textarea>
        <div class="row text">
            <!-- list danh muc -->
            <div class="col-6 left m-0 p-0">
                <select name="" id="">
                    <option value="">danh mục 1</option>
                    <option value="">danh mục 2</option>
                </select>
            </div>
            <div class="col-6 rigth m-0 p-0">
                <input type="date" class="crdate" name="date" required value="<?php if (isset($_POST['date'])) {
                                                                                    echo $_POST['date'];
                                                                                } ?>" />
            </div>
        </div>
        <div class="smnews">
            <input type="submit" value="Create" name="submitNews" class="btn btn-success smcreate" />
        </div>
    </form>
</div>
<!-- php code to get data from form -->
<?php
if (isset($_POST['submitNews'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    $fileName = $_FILES['video']['name'];
    $fileTmpName = $_FILES['video']['tmp_name'];
    $fileExt = explode('.', $fileName);
    $uploadOk = 1;
    $fileActualExt = strtolower(end($fileExt));
    // Check videoFileType is valid
    if ($fileActualExt !== "mp4" && $fileActualExt !== "avi" && $fileActualExt !== "mov" && $fileActualExt !== "wmv" && $fileActualExt !== "flv" && $fileActualExt !== "3gp") {
        echo "<script>alert('Sorry, only MP4, AVI, MOV, WMV, FLV & 3GP files are allowed.')</script>";
        $uploadOk = 0;
    }
    //check if file name is existed
    $sql = "SELECT * FROM uploads WHERE resources = '$fileName'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Sorry, file name is existed.')</script>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
        move_uploaded_file($fileTmpName, $target_file);
        $sql = "INSERT INTO `uploads` (`resources`) VALUES ('$fileName')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('The file " . htmlspecialchars(basename($_FILES["video"]["name"])) . " has been uploaded.')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $uploadID = "SELECT uploadID FROM uploads WHERE resources = '$fileName'";
        $result = mysqli_query($conn, $uploadID);
        $row = mysqli_fetch_assoc($result);
        $uploadID = $row['uploadID'];
        //get data from form
        $title = $_POST['title'];
        $description = $_POST['describe'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $sql = "INSERT INTO `news` (`title`, `description`, `content`, `date`, `uploadID`) VALUES ('$title', '$description', '$content', '$date', '$uploadID')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Create news successfully.')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<!-- edit -->
<div class="container adminnews hide tb">
      <div class="btn btn-success btncreatenews btncreate"><i class="fa-solid fa-plus"></i>Create</div>
      <form action=" " method="get">
        <table border="1">
          <tr>
            <td>ID News</td>
            <td>Author</td>
            <td>ID Category</td>
            <td>Title</td>
            <td>Description</td>
            <td>Content</td>
            <td>Video</td>
            <td>Date</td>
            <td>Delete</i></td>
            <td>Update</i></td>
          </tr>
          <tr>
            <?php
            function get_news_list()
            {
              global $conn;
              $sql = "SELECT *,resources, name FROM access, stuff, uploads WHERE stuff.uploadID = uploads.uploadID and access.userID = stuff.userID";
              $result = mysqli_query($conn, $sql);
              $news_list = array();
              while ($row = mysqli_fetch_assoc($result)) {
                $news_list[] = $row;
              }
              return $news_list;
            }
            ?>
            <?php
            $news_list = get_news_list();
            foreach ($news_list as $news) {
              $newsID = $news['newsID'];
              $author = $news['name'];
              $categoryID = $news['categoryID'];
              $title = $news['title'];
              $description = $news['description'];
              $content = $news['content'];
              $date = $news['date'];
              $resources = $news['resources'];
            ?>
              <td><?php echo $newsID; ?></td>
              <td><?php echo $author; ?></td>
              <td><?php echo $categoryID; ?></td>
              <td><?php echo mb_substr($title, 0, 30); ?></td>
              <td><?php echo $description; ?></td>
              <td><?php echo mb_substr($content, 0, 100) . "...."; ?></td>
              <td><?php echo $resources; ?></td>
              <td><?php echo $date; ?></td>
              <td><a href="#!" data-id="" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
              <td><a href="#!" class="btn__editnews" data-id="" data-username="" data-name=""><i class="fa-solid fa-pen-to-square"></i></a></td>
          </tr>
        <?php } ?>
        </table>
      </form>
      <!-- aler2 -->
    </div>