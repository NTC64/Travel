<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:index.php');
    exit;
}
?>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
    <link rel="stylesheet" href="./asset/css/styleadmin.css" />
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.1.2-web/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <?php session_start() ?>
    <?php
    include 'conn.php';
    ?>
</head>

<body>
    <!-- partial:index.partial.html -->
    <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
        <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
        <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
            <img class="rounded-pill img-fluid" width="65"
                src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance"
                alt="" />
            <div class="ms-2">
                <h5 class="fs-6 mb-0">
                    <a class="text-decoration-none" href="#">
                        <?php echo $_SESSION['name']; ?>
                    </a>
                </h5>
                <p class="mt-1 mb-0 adrole" data-role="<?php echo $_SESSION['role']; ?>">
                    <?php echo $_SESSION['role']; ?></p>
            </div>
        </div>

        <div class="search position-relative text-center px-4 py-3 mt-2">
            <input type="text" class="form-control w-100 border-0 bg-transparent text-white"
                placeholder="Search here" />
            <i class="fa fa-search position-absolute d-block fs-6"></i>
        </div>

        <ul class="categories list-unstyled">

            <li class="dash">
                <i class="fa-solid fa-gauge"></i><a href="#"> Dashboard</a>
            </li>
            <li class="has-dropdown adcategory">
                <i class="fa-solid fa-bars"></i><a href="#">Category</a>
                <ul class="sidebar-dropdown hide list-unstyled">
                    <li class="categorynews"><a href="#">Category news</a></li>
                    <li class="categorytour"><a href="#">Catogory tours</a></li>
                    <li class="crcategory"><a href="#">Create</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <i class="fa-solid fa-location-dot"></i><a href="#">Tour</a>
                <ul class="sidebar-dropdown hide list-unstyled">
                    <li class="tourall"><a href="#">All Tours</a></li>
                    <li class="tourmanagement"><a href="#">Tour Management</a></li>

                </ul>
            </li>
            <li class="news">
                <i class="fa-regular fa-newspaper"></i><a href="#"> News</a>
            </li>
            <li class="has-dropdown account"><i class="fa-solid fa-user"></i><a href="#">Account</a>
                <ul class="sidebar-dropdown hide list-unstyled">
                    <li class="user"><a href="#">User</a></li>
                    <li><a href="#" class="seller">Seller</a></li>
                    <li class="admin"><a href="#">Admin</a></li>
                    <li class="adcreate"><a href="#">Create</a></li>
                </ul>
            </li>

        </ul>
        <a href="logout.php">
            <div class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>Log Out
            </div>
        </a>

    </aside>

    <div class="bg hide"></div>
    <!-- edit -->

    <div class="edit editnews createnews hide">
        <form action="" method="POST" class="edit__form">
            <div class="up__title">
                <h3>Update news</h3>
            </div>
            <input type="text" class="upnewstitle" name="title" required placeholder="Title" />
            <textarea name="describe" class="upnewsdescription" cols="30" rows="10" required
                placeholder="Describe"></textarea>
            <textarea name="content" class="upnewscontent" cols="30" rows="10" required
                placeholder="content"></textarea>

            <div class="row text">

                <div class="col-6 left m-0 p-0">

                    <?php
                    //echo category_news inside select tag
                    $sql = "SELECT * FROM category_news";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    <select name="category" id="upnewscategory">
                        <?php
                            while ($row = mysqli_fetch_assoc(
                                $result
                            )) {
                            ?>

                        <option value="<?php echo $row['categoryID'] ?>"><?php echo $row['categoryName'] ?></option>
                        <?php
                            }
                            ?>
                    </select>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-6 rigth m-0 p-0">

                    <input type="date" class="upnewsdate" name="date" required />
                </div>


            </div>
            <input type="submit" value="Update" name="submit" class="btn btn-success" />
        </form>
    </div>
    <!-- cr category -->
    <div class="create createctg hide">
        <form action="" method="POST" class="create__form">
            <div class="up__title">
                <h3>Create category</h3>
            </div>
            <select class="crctg" id="" name="category">
                <option value="">Select Category</option>
                <option value="category_news">Category News</option>
                <option value="category_tours">Category Tours</option>
            </select>
            <input type="text" class="crid" name="categoryID" placeholder="ID category" required />
            <input type="text" class="crname" name="categoryName" placeholder="Category Name" required />
            <input type="submit" value="Create" name="crtCategory" class="btn btn-success" />
        </form>
    </div>
    <?php
    if (isset($_POST['crtCategory'])) {
        $category = $_POST['category'];
        $categoryID = $_POST['categoryID'];
        $categoryName = $_POST['categoryName'];
        if ($category == 'category_news') {
            $sql = "INSERT INTO category_news (categoryNews, categoryName) VALUES ('$categoryID', '$categoryName')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Create category news success")</script>';
                echo '<script>window.location.href="admin.php"</script>';
            } else {
                echo '<script>alert("Create category news fail")</script>';
                echo '<script>window.location.href="admin.php"</script>';
            }
        } else {
            $sql = "INSERT INTO category_tours (categoryTours, categoryName) VALUES ('$categoryID', '$categoryName')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Create category tours success")</script>';
                echo '<script>window.location.href="admin.php"</script>';
            } else {
                echo '<script>alert("Create category tours fail")</script>';
                echo '<script>window.location.href="admin.php"</script>';
            }
        }
    }
    ?>
    <!-- edit category -->
    <div class="edit editctg hide">
        <form action="" method="POST" class="edit__form">
            <div class="up__title">
                <h3>Update Category</h3>
            </div>
            <input type="text" class="idctg" name="categoryID" placeholder="ID category" readonly />
            <input type="text" class="ctgname" name="categoryName" placeholder="Category Name" required />
            <input type="submit" value="Update" name="updNewsCategory" class="btn btn-success" />
        </form>
    </div>
    <?php
    if (isset($_POST['updNewsCategory'])) {
        $categoryID = $_POST['categoryID'];
        $categoryName = $_POST['categoryName'];
        if (substr($categoryID, 0, 1) == 'N') {
            $sql = "UPDATE category_news SET categoryName = '$categoryName' WHERE categoryNews = '$categoryID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Update category news success")</script>';
                echo  '<script> setTimeout(function(){window.location.href="admin.php"}, 1000)</script>';
            } else {
                echo '<script>alert("Update category news fail")</script>';
                echo  '<script> setTimeout(function(){window.location.href="admin.php"}, 1000)</script>';
            }
        } else {
            $sql = "UPDATE category_tours SET categoryName = '$categoryName' WHERE categoryTours = '$categoryID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Update category tours success")</script>';
                echo  '<script> setTimeout(function(){window.location.href="admin.php"}, 1000)</script>';
            } else {
                echo '<script>alert("Update category tours fail")</script>';
                echo  '<script> setTimeout(function(){window.location.href="admin.php"}, 1000)</script>';
            }
        }
    }
    ?>
    <!-- create tour-->
    <div class="create createtour hide">
        <form action="" method="POST" class="create__form" enctype="multipart/form-data">
            <div class="up__title">
                <h3 class="my-3">Create Tour</h3>
            </div>
            <?php
            $sql = "SELECT * FROM category_tours";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            ?>
            <select name="categoryID" id="">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <option value="<?php echo $row['categoryTours'] ?>"><?php echo $row['categoryName'] ?></option>
                <?php
                    }
                    ?>
            </select>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT * FROM access where role = 'seller'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            ?>

            <select name="sellerID" class="slseller" id="">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <option value="<?php echo $row['userID'] ?>"><?php echo $row['name'] ?></option>
                <?php
                    }
                    ?>
            </select>
            <?php
            }
            ?>
            <input type="text" class="crnewsname" name="tourName" required value="" placeholder="Tour name" />
            <textarea name="tourLocation" class="craddress" cols="30" rows="10" required value=""
                placeholder="Location"></textarea>
            <textarea name="tourDescription" class="crbody" cols="30" rows="10" required value=""
                placeholder="Enter Tour Description"></textarea>
            <input type="file" class="crimg" name="tourImage" id="video" required />
            <div class="row text">
                <!-- list danh muc -->
                <div class="col-4 left m-0 p-0">
                    <input type="text" class="crprice" name="price" required value="" placeholder="Price" />


                </div>
                <div class="col-4 rigth m-0 p-0">
                    <input type="text" class="crtime" name="tourTime" required value="" placeholder="Time(day)" />
                </div>
                <div class="col-4 rigth m-0 p-0">
                    <input type="date" class="crdate" name="tourDate" required value="" />
                </div>
            </div>
            <div class="smnews">
                <input type="submit" value="Create" name="submitTour" class="btn btn-success smcreate" />
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submitTour'])) {
        $categoryID = $_POST['categoryID'];
        $sellerID = $_POST['sellerID'];
        // echo '<script>alert("' . $categoryID . '")</script>';
        // echo '<script>alert("' . $sellerID . '")</script>';
        $tourName = $_POST['tourName'];
        $tourLocation = $_POST['tourLocation'];
        $tourDescription = $_POST['tourDescription'];
        $tourTime = $_POST['tourTime'];
        $tourDate = $_POST['tourDate'];
        $price = $_POST['price'];
        $tourImage = $_FILES['tourImage']['name'];
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
        if ($_FILES["tourImage"]["size"] > 5000000) {
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
            echo '<script> setTimeout(function(){window.location.href="admin.php"}, 1000)</script>';
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["tourImage"]["tmp_name"], $target_file)) {
                echo '<script>alert("The file ' . htmlspecialchars(basename($_FILES["tourImage"]["name"])) . ' has been uploaded.")</script>';
                //insert data
                $sql = "INSERT INTO tours (categoryTours, sellerID, tourName, tourPrice, tourDescription, tourImage, tourLocation, tourDate, tourTime) VALUES ('$categoryID', '$sellerID', '$tourName', '$price', '$tourDescription', '$tourImage', '$tourLocation', '$tourDate', '$tourTime')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<script>alert("Data inserted successfully")</script>';
                    echo '<script> setTimeout(function(){window.location.href="admin.php"}, 1000)</script>';
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>

    <!-- create news-->
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
                                                                                                } ?>"
                placeholder="Describe"></textarea>
            <textarea name="content" class="crbody" cols="30" rows="10" required value="<?php if (isset($_POST['content'])) {
                                                                                            echo $_POST['content'];
                                                                                        } ?>"
                placeholder="Enter content"></textarea>
            <input type="file" class="crimg" name="video" id="video" required />
            <div class="row text">
                <!-- list danh muc -->
                <div class="col-6 left m-0 p-0">
                    <?php
                    //echo category_news inside select tag
                    $sql = "SELECT * FROM category_news";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    <select name="category" id="category">

                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <option value="<?php echo $row['categoryNews'] ?>"><?php echo $row['categoryName'] ?></option>
                        <?php
                            }
                            ?>
                    </select>
                    <?php
                    }
                    ?>

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
        $target_dir = "uploads/video/";
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
            echo "<script>setTimeout('window.location.href = 'admin.php', 1500)</script>";
        }
        //check if file name is existed
        $sql = "SELECT * FROM uploads WHERE resources = '$fileName'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Sorry, file name is existed.')</script>";
            $uploadOk = 0;
            echo "<script>setTimeout('window.location.href = 'admin.php', 1500)</script>";
        }
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.')</script>";
            echo "<script>setTimeout('window.location.href = 'admin.php', 1500)</script>";
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
            $userID = $_SESSION['userID'];
            $description = $_POST['describe'];
            $content = $_POST['content'];
            $categoryID = $_POST['category'];
            $date = $_POST['date'];
            $sql = "INSERT INTO `news` (`userID`,`title`, `description`, `content`,`categoryID`,`date`, `uploadID`) VALUES ('$userID','$title', '$description', '$content','$categoryID', '$date', '$uploadID')";
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

    <div class="edit edituser hide">
        <form action="" method="POST" class="edit__form">
            <div class="up__title">
                <h3>Update Account</h3>
            </div>
            <input type="text" readonly class="id" name="ID" />
            <input type="text" class="username" name="username" required />
            <input type="text" class="name" name="name" required />

            <input type="text" class="password" name="password" placeholder="New password" required />
            <input type="submit" value="Update" name="submit" class="btn btn-success" />
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == 'Update') {
            $id = $_POST['ID'];
            $username = $_POST['username'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $sql = "UPDATE access SET username = '$username', name = '$name', password = '$password' WHERE userID = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Update success")</script>';
                //header('location: admin.php');
            } else {
                echo '<script>alert("Update fail")</script>';
            }
        }
    }
    ?>

    <!-- create -->

    <div class="create createad hide">
        <form action="" method="POST" class="create__form">
            <div class="up__title">
                <h3>Create Account</h3>
            </div>
            <select class="crrole" id="" name="role">
                <option value="user" label="user">User</option>
                <option value="seller" label="seller">Seller</option>
                <option value="admin" label="admin">Admin</option>
                <option value="superadmin" label="admin">Super Admin</option>
            </select>
            <input type="text" class="crusername" name="username" placeholder="User Name" required />
            <input type="text" class="crname" name="name" placeholder="Full Name" required />
            <input type="text" class="crhotelname hide" name="hotelName" placeholder="Hotel Name" />
            <input type="text" class="crphone hide" name="phone" placeholder="Phone" />
            <input type="text" class="crpassword" name="password" placeholder="New password" required />
            <input type="submit" value="Create" name="submit" class="btn btn-success" />
        </form>
    </div>
    <?php
    $hotelName = "";
    $phone = "";
    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == 'Create') {
            $role = $_POST['role'];
            $username = $_POST['username'];
            $name = $_POST['name'];
            $hotelName = $_POST['hotelName'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $sql = "select * from access where username = '$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo " <script> Swal.fire('Error!', 'Username already exists!', 'error');setTimeout(function(){window.location.href='admin.php'}, 2000);</script>";
            } else {
                $sql = "INSERT INTO access (role, username, name, hotelName, phone, password) VALUES ('$role', '$username', '$name', '$hotelName', '$phone', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script> Swal.fire('Success!', 'Sign up successfully!', 'success');
                setTimeout(function(){location.href='admin.php'}, 2000); </script>";
                    //header('location: admin.php');
                } else {
                    echo "  <script> Swal.fire('Error!', 'Sign up failed!', 'error');
          setTimeout(function(){location.href='admin.php'}, 2000); </script> ";
                }
            }
        }
    }
    ?>
    <!-- edit -->

    <div class="edit editseller hide">
        <form action="" method="POST" class="edit__form">
            <div class="up__title">
                <h3>Update Account</h3>
            </div>
            <input type="text" readonly class="id" name="ID" />
            <input type="text" class="username" name="username" required />
            <input type="text" class="name" name="name" required />
            <input type="text" class="hotel_name" name="hotelName" required />
            <input type="text" class="phone" name="phone" required />
            <input type="text" class="password" name="password" placeholder="New password" required />
            <input type="submit" value="Update" name="submit" class="btn btn-success" />
        </form>
    </div>
    <!-- edit -->
    <div class="edit editad hide">
        <form action="" method="POST" class="edit__form">
            <div class="up__title">
                <h3>Update Account</h3>
            </div>
            <input type="text" readonly class="id" name="ID" />
            <input type="text" class="username" name="username" required />
            <input type="text" class="name" name="name" required />

            <input type="text" class="password" name="password" placeholder="New password" required />
            <input type="submit" value="Update" name="submit" class="btn btn-success" />
        </form>
    </div>
    <div class="admin__main">
        <div class="til">
            <h4 class="muc">Dashboard</h4>
        </div>
        <div class="dashboard">
            <div class="row">

                <div class="col-3 bl row green user">
                    <i class="fa-solid fa-users col-2"></i>
                    <div class="col-7">Users</div>

                    <div class="num col-3">
                        <?php
                        $sql = "SELECT * FROM access WHERE role = 'user'";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        ?>
                    </div>
                </div>
                <div class="col-3 bl row purple tourall">
                    <i class="fa-solid fa-location-dot col-2"></i>
                    <div class="col-7">Tours</div>
                    <div class="num col-3">
                        <?php
                        $sql = "SELECT * FROM tours";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        ?>
                    </div>
                </div>
                <div class="col-3 bl row red news">
                    <i class="fa-solid fa-newspaper col-2"></i>
                    <div class="col-7"> News</div>
                    <div class="num col-3">
                        <?php
                        $sql = "SELECT * FROM news";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3 bl row orange seller">
                    <i class="fa-brands fa-sellsy col-2"></i>
                    <div class="col-7">Sellers</div>
                    <div class="num col-3">
                        <?php
                        $sql = "SELECT * FROM access WHERE role = 'seller'";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        ?>
                    </div>
                </div>

                <div class="col-3 bl row pink tourmanagement">
                    <i class="fa-solid fa-plane col-2"></i>
                    <div class="col-7"> Booked Tours</div>
                    <div class="num col-3">
                        <?php
                        $sql = "SELECT * FROM tours";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        ?>
                    </div>
                </div>
                <div class="col-3 bl row brown categorynews">
                    <i class="fa-solid fa-bars col-2"></i>
                    <div class="col-7"> Categories</div>
                    <div class="num col-3">
                        <?php
                        $sql = "SELECT * FROM category_tours,category_news";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- category -->

        <div class="container admincategorynews hide tb">

            <form action=" " method="get">
                <table border="1">
                    <tr>
                        <td>ID Category</td>
                        <td>News's Category</td>
                        <td>Delete</i></td>
                        <td>Update</i></td>
                    </tr>
                    <?php
                    //list all news category
                    $sql = "SELECT * FROM category_news";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['categoryNews'] ?></td>
                        <td><?php echo $row['categoryName'] ?></td>
                        <td><a href="delete.php?categoryNews=<?php echo $row['categoryNews'] ?>" data-id="" class=""><i
                                    class="fa-solid fa-trash"></i></a></td>
                        <td><a href="#!" class="btn__editcategory" data-id="<?php echo $row['categoryNews'] ?>"
                                data-username="" data-name="<?php echo $row['categoryName'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                        <?php
                        }
                    }
                        ?>
                        <!-- <td><a href="#!" data-id="" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
        <td><a href="#!" class="btn__editcategory" data-id="" data-username="" data-name=""><i class="fa-solid fa-pen-to-square"></i></a></td> -->
                    </tr>

                </table>
                <!-- pag -->
                <div class="pag">
                    <ul class="pag__items">
                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
            <!-- aler2 -->
        </div>
        <!-- category tour -->
        <div class="container admincategorytour hide tb">

            <form action=" " method="get">
                <table border="1">
                    <tr>
                        <td>ID Category</td>
                        <td>Tour's Category</td>
                        <td>Delete</i></td>
                        <td>Update</i></td>
                    </tr>
                    <?php
                    //list all news category
                    $sql = "SELECT * FROM category_tours";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['categoryTours'] ?></td>
                        <td><?php echo $row['categoryName'] ?></td>
                        <td><a href="delete.php?categoryTours=<?php echo $row['categoryTours'] ?>" data-id=""
                                class=""><i class="fa-solid fa-trash"></i></a></td>
                        <td><a href="#!" class="btn__editcategory" data-id="<?php echo $row['categoryTours'] ?>"
                                data-username="" data-name="<?php echo $row['categoryName'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                        <?php
                        }
                    }
                        ?>
                    </tr>
                </table>
                <!-- pag -->
                <div class="pag">
                    <ul class="pag__items">
                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
            <!-- aler2 -->


        </div>
        <!-- all tours -->
        <div class="container adminalltour hide tb">
            <div class="btn btn-success btncreatetour btncreate"><i class="fa-solid fa-plus"></i>Create</div>
            <form action=" " method="get">
                <table border="1">
                    <tr>
                        <td>ID Tour</td>
                        <td>ID Category</td>
                        <td>Name Seller</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Image</td>
                        <td>Location</td>
                        <td>Time (Days)</td>
                        <td>Date</td>
                        <td>Description</td>
                        <td>Delete</i></td>
                        <td>Update</i></td>
                    </tr>

                    <?php
                    //list all news category
                    function get_tour_list()
                    {
                        if ($_SESSION['role'] == 'seller') {
                            $sql = "SELECT * FROM tours WHERE sellerID = '" . $_SESSION['userID'] . "'";
                        } else {
                            $sql = "SELECT * FROM tours";
                        }
                        global $conn;
                        $result = mysqli_query($conn, $sql);
                        $tour_list = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $tour_list[] = $row;
                        }
                        return $tour_list;
                    } ?>
                    <?php
                    $tour_list = get_tour_list();
                    foreach ($tour_list as $tour) {
                    ?>
                    <tr>
                        <td><?php echo mb_substr($tour['tourID'], 0, 10) ?></td>
                        <td><?php echo $tour['categoryTours'] ?></td>
                        <td><?php echo $tour['sellerID'] ?></td>
                        <td><?php echo $tour['tourName'] ?></td>
                        <td><?php echo $tour['tourPrice'] ?></td>
                        <td><?php echo mb_substr($tour['tourImage'], 0, 10) ?></td>
                        <td><?php echo $tour['tourLocation'] ?></td>
                        <td><?php echo $tour['tourTime'] ?></td>
                        <td><?php echo $tour['tourDate'] ?></td>
                        <td><?php echo mb_substr($tour['tourDescription'], 0, 20) ?></td>
                        <td><a href="delete.php?tourID=<?php echo $tour['tourID'] ?>" data-id="" class=""><i
                                    class="fa-solid fa-trash"></i></a></td>
                        <td><a href="#!" class="btn__edittour" data-id="<?php echo $tour['tourID'] ?>" data-username=""
                                data-name="<?php echo $tour['tourName'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                </table>
                <!-- pag -->
                <div class="pag">
                    <ul class="pag__items">
                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
            <!-- aler2 -->


        </div>
        <!-- manager tours -->
        <div class="container adminmntour hide tb">

            <form action=" " method="get">
                <table border="1">
                    <tr>
                        <td>ID Tour</td>
                        <td>ID Seller</td>
                        <td>Name user</td>
                        <td>Number phone</td>
                        <td>Address user</td>
                        <td>Date</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Note</td>
                        <td>Status</td>
                        <td>Delete</i></td>
                        <td>Update</i></td>
                    </tr>
                    <tr>
                        <td>ID Tour</td>
                        <td>ID Seller</td>
                        <td>Name user</td>
                        <td>Number phone</td>
                        <td>Address user</td>
                        <td>Date</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Note</td>
                        <td>Status</td>
                        <td><a href="#!" data-id="" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
                        <td><a href="#!" class="btn__editcategory" data-id="" data-username="" data-name=""><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>

                </table>
                <!-- pag -->
                <div class="pag">
                    <ul class="pag__items">
                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
            <!-- aler2 -->
        </div>
        <!-- news -->
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
                            $sql = "SELECT *,resources, name FROM access, news, uploads WHERE news.uploadID = uploads.uploadID and access.userID = news.userID";
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
                        <td><a href="#!" class="btn__editnews" data-title="<?php echo $title ?>"
                                data-description="<?php echo $description; ?>" data-content="<?php echo $content; ?>"
                                data-resources="<?php echo $resources; ?>" data-date="<?php echo $date; ?>"
                                data-categoryid="<?php echo $categoryID; ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- end foreach -->

                </table>
                <!-- pag -->
                <div class="pag">
                    <ul class="pag__items">
                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
            <!-- aler2 -->
        </div>
        <!-- user -->
        <div class="container admin__user hide tb">

            <form action=" " method="get">
                <table border="1">
                    <tr>
                        <td>ID User</td>
                        <td>User Name</td>
                        <td>Full Name</td>
                        <td>Password</td>
                        <td>Role</td>
                        <td>Delete</i></td>
                        <td>Update</i></td>
                    </tr>
                    <?php
                    //list all user
                    function get_user_list()
                    {
                        global $conn;
                        $sql = "SELECT * FROM access where role = 'user'";
                        $result = mysqli_query($conn, $sql);
                        $user_list = array();
                        while ($row = mysqli_fetch_array($result)) {
                            $user_list[] = $row;
                        }
                        return $user_list;
                    }
                    ?>
                    <?php
                    $user_list = get_user_list();
                    foreach ($user_list as $user) {
                        $ID = $user['userID'];
                        $username = $user['username'];
                        $name = $user['name'];
                        $password = $user['password'];
                        $role = 'user';
                    ?>
                    <tr>
                        <td><?php echo $user['userID'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['password'] ?></td>
                        <td><?php echo $user['role'] ?></td>
                        <td><a href="#!" data-id="<?php echo $ID; ?>" class="btn__delete"><i
                                    class="fa-solid fa-trash"></i></a></td>
                        <td><a href="#!" class="btn__edituser" data-id="<?php echo $user['userID']; ?>"
                                data-username="<?php echo $user['username']; ?>"
                                data-name="<?php echo $user['name']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <!-- pag -->
                <div class="pag">
                    <ul class="pag__items">
                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
            <!-- aler2 -->


        </div>

        <div class="container admin__seller hide tb">
            <form action=" " method="get">
                <table border="1">
                    <tr>
                        <td>ID User</td>
                        <td>Full Name</td>
                        <td>User Name</td>
                        <td>Password</td>
                        <td>Hotel Name</td>
                        <td>Phone</td>
                        <td>Delete</td>
                        <td>Edit</td>
                    </tr>
                    <?php
                    //get seller list
                    function get_seller_list()
                    {
                        global $conn;
                        $sql = "SELECT * FROM access where role = 'seller'";
                        $result = mysqli_query($conn, $sql);
                        $seller_list = array();
                        while ($row = mysqli_fetch_array($result)) {
                            $seller_list[] = $row;
                        }
                        return $seller_list;
                    }
                    ?>
                    <?php
                    $seller_list = get_seller_list();
                    foreach ($seller_list as $seller) {
                        $ID = $seller['userID'];
                        $name = $seller['name'];
                        $username = $seller['username'];
                        $password = $seller['password'];
                        $hotel = $seller['hotelName'];
                        $phone = $seller['phone'];
                    ?>
                    <tr>
                        <td><?php echo $seller['userID'] ?></td>
                        <td><?php echo $seller['name'] ?></td>
                        <td><?php echo $seller['username'] ?></td>
                        <td><?php echo $seller['password'] ?></td>
                        <td><?php echo $seller['hotelName'] ?></td>
                        <td><?php echo $seller['phone'] ?></td>
                        <td><a href="#!" data-id="<?php echo $ID; ?>" class="btn__delete"><i
                                    class="fa-solid fa-trash"></i></a></td>
                        <td><a href="#!" class="btn__editseller" data-id="<?php echo $seller['userID']; ?>"
                                data-username="<?php echo $seller['username']; ?>"
                                data-name="<?php echo $seller['name']; ?>"
                                data-hotelname="<?php echo $seller['hotelName']; ?>"
                                data-phone="<?php echo $seller['phone']; ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <div class="pag">
                    <ul class="pag__items">

                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""> <i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
        </div>
        <!-- admin -->
        <div class="container admin__ad hide tb">

            <form action=" " method="get">
                <table border="1">
                    <tr>
                        <td>ID User</td>
                        <td>User Name</td>
                        <td>Full Name</td>
                        <td>Password</td>
                        <td>Role</td>
                        <td>Delete</i></td>
                        <td>Update</i></td>
                    </tr>
                    <?php
                    //get admin list
                    function get_admin_list()
                    {
                        global $conn;
                        $sql = "SELECT * FROM access where role = 'admin' or role = 'superadmin'";
                        $result = mysqli_query($conn, $sql);
                        $admin_list = array();
                        while ($row = mysqli_fetch_array($result)) {
                            $admin_list[] = $row;
                        }
                        return $admin_list;
                    }
                    ?>
                    <?php
                    $admin_list = get_admin_list();
                    foreach ($admin_list as $admin) {
                        $ID = $admin['userID'];
                        $username = $admin['username'];
                        $name = $admin['name'];
                        $password = $admin['password'];
                        $role = $admin['role'];
                    ?>
                    <tr>
                        <td><?php echo $admin['userID'] ?></td>
                        <td><?php echo $admin['username'] ?></td>
                        <td><?php echo $admin['name'] ?></td>
                        <td><?php echo $admin['password'] ?></td>
                        <td><?php echo $admin['role'] ?></td>
                        <td><a href="#!" data-id="<?php echo $ID; ?>" class="btn__delete"><i
                                    class="fa-solid fa-trash"></i></a></td>
                        <td><a href="#!" class="btn__editadmin" data-id="<?php echo $admin['userID']; ?>"
                                data-username="<?php echo $admin['username']; ?>"
                                data-name="<?php echo $admin['name']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <!-- pag -->
                <div class="pag">
                    <ul class="pag__items">
                        <li><a href="">1</a> </li>
                        <li><a href="">2</a> </li>
                        <li><a href="">3</a> </li>
                        <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
                    </ul>
                </div>
            </form>
            <!-- aler2 -->


        </div>

        <!-- partial -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="./asset/js/script.js"></script>
</body>

</html>