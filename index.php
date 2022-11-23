<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./asset/css/style.css" />
    <link rel="stylesheet" href="asset/font/fontawesome-free-6.1.2-web/css/all.min.css" />
    <link rel="stylesheet" href="./asset/img/" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <?php session_start() ?>
    <?php
    include 'conn.php';
    ?>
</head>


<body>
    <!-- Login Form -->
    <div class="container-fluid p-0 main">
        <div class="header row m-0 p-0 text-white bg-dark">
            <div class="col-1"></div>
            <div class="header__logo col-2"><a href="../travel">ULSA IT</a></div>
            <div class="header__nav col-5">
                <ul class="nav__items navbar p-0 m-0">
                    <li class="nav__item">
                        <a href="index.php" class="text-white">Home</a>
                    </li>
                    <li class="nav__item"><a href="" class="text-white">Tour</a></li>
                    <li class="nav__item">
                        <a href="" class="text-white">Category</a>
                    </li>
                    <li class="nav__item"><a href="" class="text-white">News</a></li>
                    <li class="nav__item"><a href="" class="text-white">Contact</a></li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['check']) && $_SESSION['check'] == true) {
                echo "<div class='col-2'></div><div class='m-0 p-0'>" . $_SESSION['username'] . "</div>"; ?>
                <a href="logout.php" class="logout">Logout</a>
            <?php } else { ?>
                <div class="col-2"></div>
                <div class="col-2 m-0 p-0">
                    <a href="#" class="header__login">Login</a>
                    <a href="#" class="header__signup">Sign Up</a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="bg"></div>
        <div class="login signin">
            <h2 class="login-header">Log in</h2>

            <form class="login-container" method="POST">
                <p>
                    <input type="text" placeholder="Username" required name="username" />
                </p>
                <p>
                    <input type="password" placeholder="Password" required name="password" class="password" />
                </p>
                <div class="row">
                    <input type="checkbox" name="hide_password" class="hide col-2 ml-2" /><label for="" class="col-9 show__pass">Show password</label>
                </div>
                <p><input type="submit" value="Log in" name="btn" /></p>
            </form>
        </div>
        <?php
        if (isset($_POST["btn"])) {
            if ($_POST['btn'] == "Log in") {
                define('MyConst', TRUE);
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM access WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['role'] == 'seller' || $row['role'] == 'admin' || $row['role'] == 'superadmin') {
                        $_SESSION['username'] = $username;
                        $_SESSION['role'] = $row['role'];
                        header("Location: admin.php");
                    } else {
                        $_SESSION['check'] = true;
                        $_SESSION['username'] = $username;
                        $_SESSION['role'] = $row['role'];
                        header("Location: index.php");
                    }
                } else {
                    echo
                    " <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Check your username or password again!',
                        });
                    </script> ";
                }
            }
        } ?>
        <!-- Sign Up Form -->
        <div class="login signup">
            <h2 class="login-header">Sign Up</h2>

            <form class="login-container" method="POST">
                <p><input type="text" placeholder="Full name" name="name" required /></p>
                <p>
                    <input type="text" placeholder="Username" name="username" required />
                </p>
                <p>
                    <input type="password" placeholder="Password" name="password" required class="password" />
                </p>
                <p>
                    <input type="password" placeholder="Re-enter password" name="re_password" required class="password" />
                </p>
                <p class="ip_hide ip_seller">
                    <input type="text" placeholder="Hotel name" name="hotel_name" class="hotel_name" />
                </p>
                <p class="ip_hide ip_seller">
                    <input type="text" placeholder="Phone" name="phone" class="phone" />
                </p>

                <div class="row">
                    <input type="checkbox" name="hide_password" class="hide col-2 ml-2" /><label for="" class="col-9 show__pass">Show password</label>
                </div>
                <div class="row seller">
                    <p class="m-auto add_input">Seller registration</p>
                </div>
                <div class="row ip_hide user">
                    <p class="m-auto add_input">User registration</p>
                </div>
                <p><input type="submit" value="Sign Up" name="btn" /></p>
            </form>
        </div>
        <?php
        $hotel_name = "";
        if (isset($_POST["btn"])) {
            if ($_POST['btn'] == "Sign Up") {
                $name = $_POST['name'];
                $password = $_POST['password'];
                $username = $_POST['username'];
                $re_password = $_POST['re_password'];
                $hotel_name = $_POST['hotel_name'];
                $phone = $_POST['phone'];
                $sql = "select * from access where username = '$username'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "  <script> Swal.fire('Error!', 'Username already exists!', 'error'); </script> ";
                } else {
                    if ($password != $re_password) {
                        echo "  <script> Swal.fire('Error!', 'Password does not match!', 'error'); </script> ";
                    }
                    //validate phone
                    else if (!is_numeric($phone) && strlen($phone) == 10) {
                        echo "  <script> Swal.fire('Error!', 'Phone number is not valid!', 'error'); </script> ";
                    } else {
                        if ($hotel_name != "") {
                            $sql = "INSERT INTO access (name, username, password, role, hotelName, phone) VALUES ('$name', '$username', '$password', 'seller', '$hotel_name', '$phone')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo "  <script> Swal.fire('Success!', 'Sign up successfully!', 'success'); </script> ";
                            } else {
                                echo "  <script> Swal.fire('Error!', 'Sign up failed!', 'error'); </script> ";
                            }
                        } else {
                            $sql = "INSERT INTO access (name, username, password, role) VALUES ('$name', '$username', '$password', 'user')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo "  <script> Swal.fire('Success!', 'Sign up successfully!', 'success'); </script> ";
                            } else {
                                echo "  <script> Swal.fire('Error!', 'Sign up failed!', 'error'); </script> ";
                            }
                        }
                    }
                }
            }
        }
        ?>
        <!-- End Sign Up Form -->
        <div class="banner">
            <img src="./asset/img/banner1.jpg" alt="" />
            <div class="overlay"></div>
            <div class="search">
                <form action="" method="get">
                    <select name="" id="" class="search__txt">
                        <option value="">Chọn loại tour</option>
                    </select>
                    <select name="" id="" class="search__select">
                        <option value="">Địa điểm</option>
                    </select>
                    <input type="submit" value="Search" class="search__btn" />
                </form>
            </div>
            <!-- main -->
            <div class="container hotTour my-4">
                <div class="tour__title row mt-5">
                    <h2 class="col-10 text-uppercase p-0">Hot Tour</h2>
                    <a class="m-auto text-right text-black-50 hvblack">View all >></a>
                </div>
                <div class="tour__items row">
                    <!-- tour card -->
                    <div class="card col-4 p-0 m-2">
                        <img class="card-img-top" src="asset/img/tour1.jpg" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Tên địa điểm du lịch</h5>
                            <p class="card-text text-black-50">Mô tả</p>
                            <p class="card-price text-danger">Giá</p>
                            <a href="#!" class="btn btn-green" data-id="id">Xem chi tiết</a>
                        </div>
                    </div>
                    <!-- end tour card -->
                    <!-- tour card -->
                    <!-- ..... -->
                    <!-- end tour card -->
                    <!-- chi tiết tour -->
                    <div class="bg"></div>
                    <div class="tourdetail">

                    </div>

                    <!---->

                </div>
            </div>
            <div class="bg__category bg-dark">
                <div class="container category py-5">
                    <div class="category__title row pb-5">
                        <h2 class="col-10 text-uppercase p-0 text-white">Category</h2>
                        <a class="m-auto text-right text-white-50 hvwhite">View all >></a>
                    </div>
                    <div class="category__items row">
                        <div class="col-2"></div>
                        <div class="card col-4 p-0 mx-3 text-center category__left">
                            <img class="card-img-top" src="asset/img/news2.jpg" alt="Card image cap" />
                            <div class="card-body">
                                <p class="card-text w500 text-uppercase">Các danh mục bài viết</p>
                            </div>
                        </div>
                        <div class="card col-4 p-0 mx-3 text-center category__right">
                            <img class="card-img-top" src="asset/img/news2.jpg" alt="Card image cap" />
                            <div class="card-body">
                                <p class="card-text w500 text-uppercase">Các danh mục tour</p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
            <!-- news -->
            <div class="container my-4">
                <div class="row mt-5">
                    <h2 class="col-10 text-uppercase p-0">News</h2>
                    <a class="m-auto text-right text-black-50 hvblack">View all >></a>
                </div>
                <div class="tour__items row">
                    <div class="card col-4 p-0 m-2">
                        <img class="card-img-top" src="asset/img/tour1.jpg" alt="Card image cap" />
                        <div class="card-body">
                            <p class="card-date text-black-50">Thời gian đăng</p>
                            <h5 class="card-title">Tên bài viết</h5>
                            <p class="card-text text-black-50">Mô tả</p>
                        </div>
                    </div>
                </div>
                <?php
                //get list news from database
                function get_news_list()
                {
                    global $conn;
                    $sql = "SELECT resources, date, title, description FROM news,resources WHERE news.resourceID = resources.resourceID";
                    $result = mysqli_query($conn, $sql);
                    $news_list = array();
                    while ($row = mysqli_fetch_array($result)) {
                        $news_list[] = $row;
                    }
                    return $news_list;
                }
                ?>
                <?php
                $news_list = get_news_list();
                foreach ($news_list as $news) {

                ?>
                    <div class="card col-4 p-0 m-2">
                        <img class="card-img-top" src="asset/img/tour1.jpg" alt="Card image cap" />
                        <div class="card-body">
                            <p class="card-date text-black-50"><?php echo $news['date'] ?></p>
                            <h5 class="card-title"><?php echo $news['title'] ?></h5>
                            <p class="card-text text-black-50"><?php echo $news['description'] ?></p>
                            <?php
                            if (isset($_SESSION['user'])) {
                            ?>
                                <a href="news.php?id=<?php echo $news['id'] ?>" class="btn btn-green">Xem chi tiết</a>
                            <?php
                            } else {
                            ?>
                                <a href="login.php" class="btn btn-green">Xem chi tiết</a>
                        <?php
                            }
                        }
                        ?>


                        </div>
                        <!-- Footer -->
                        <?php include 'footer.php'; ?>
                        <!-- Footer -->
                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>