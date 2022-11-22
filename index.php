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
            <div class="header__logo col-2">ULSA IT</div>
            <div class="header__nav col-5">
                <ul class="nav__items navbar p-0 m-0">
                    <li class="nav__item">
                        <a href="" class="text-white">Home</a>
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
            </div>
            <!-- Footer -->
            <footer class="text-center text-lg-start bg-dark text-muted mt-5">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <span>Get connected with us on social networks:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div class="footer__connect">
                        <a href="https://fb.com/ulsait"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://fb.com/ulsait"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://fb.com/ulsait"><i class="fa-brands fa-github"></i></a>
                        <a href="https://fb.com/ulsait"><i class="fa-brands fa-telegram"></i></a>
                        <a href="https://fb.com/ulsait"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3 mx-0 p-0">
                            <!-- Grid column -->
                            <div class="col-2 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <i class="fas fa-gem me-3 text-secondary"></i>gotravel
                                </h6>
                                <p>xin chào các bạn !!!.</p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Menu</h6>
                                <p>
                                    <a href="#!" class="text-reset">Home</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Tour</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Category</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">News</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Contact</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-2 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                                <p>
                                    <i class="fas fa-home me-3 text-secondary"></i> ULSA IT, ULSA,
                                    Hà Nội
                                </p>
                                <p>
                                    <i class="fas fa-envelope me-3 text-secondary"></i>
                                    info@example.com
                                </p>
                                <p>
                                    <i class="fas fa-phone me-3 text-secondary"></i> +84 123456789
                                </p>
                                <p>
                                    <i class="fas fa-print me-3 text-secondary"></i> +84 123456789
                                </p>
                            </div>
                            <div class="col-3 map m-0 p-0"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5103316823797!2d105.80005365096947!3d21.012256893647578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab5f7e8677a7%3A0xe8e81820d9c9ed9b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBMYW8gxJHhu5luZyAtIFjDoyBo4buZaQ!5e0!3m2!1svi!2s!4v1668503845781!5m2!1svi!2s" width="300" height="250" style="border:0; border-radius:10px;opacity:0.8;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025)">
                    © 2022 Copyright:
                    <a class="text-reset fw-bold" href="#">ULSA IT</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="asset/js/js.js"></script>
        <!-- Footer -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>