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
</head>
<?php
include 'conn.php';
?>

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
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM access WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['role'] == 'seller' || $row['role'] == 'admin') {
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
                <p><input type="text" placeholder="Name" name="name" required /></p>
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
                            $sql = "INSERT INTO access (name, username, password, role, hotel_name, phone) VALUES ('$name', '$username', '$password', 'seller', '$hotel_name', '$phone')";
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
            <?php
            //echo news information base on id after click a href in index.php
            if (isset($_GET['newsID'])) {
                $id = $_GET['newsID'];
                $sql = "SELECT * FROM news WHERE newsID = '$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
            ?>
                    <div class="container newsmain my-5">
                        <h3><?php echo $row['title']; ?></h3>
                        <p class="text-black-50"><?php echo $row['date']; ?></p>
                        <p><?php echo $row['content'] ?></p>
                        <img class="my-3" src="./asset/img/news6.jpg" alt="">
                    </div>
            <?php
                }
            }
            ?>
            
            <!-- <div class="container newsmain my-5">
                <h3>tiêu đề bài viết</h3>
                <p class="text-black-50"> Thời gian đăng</p>
                <p>Theo Bộ Giao thông vận tải, sau khi bổ sung, hiện nay tổng số các công trình, dự án thuộc Ban Chỉ đạo là 70 dự án, dự án thành phần tại 40 tỉnh, thành phố, gồm 63 dự án đường bộ, 5 dự án đường sắt, 2 dự án cảng hàng không.
                    Tại phiên họp, lãnh đạo các địa phương, bộ, ngành, nhà thầu báo cáo rà soát, tiến độ thực hiện các công trình công trình, dự án quan trọng quốc gia, trọng điểm ngành Giao thông vận tải; tình hình giải ngân.
                    Theo đó, sau những chỉ đạo quyết liệt của Chính phủ, Thủ tướng Chính phủ và việc điều chỉnh kịp thời các cơ chế, chính sách, nhất là cải cách thủ tục hành chính, các công trình, dự án cơ bản được triển khai tích cực. Tuy nhiên tiến độ thực hiện các dự án vẫn còn chậm so với yêu cầu.
                    Phát biểu kết luận Phiên họp, Thủ tướng Chính phủ Phạm Minh Chính nhấn mạnh, chúng ta đang thực hiện 3 đột phá chiến lược, trong đó có đột phá về hạ tầng giao thông. Do đó, chúng ta phải có đổi mới tư duy, cách xử lý, tiếp cận vấn đề. “Mỗi người phải thay đổi cách nghĩ, cách làm, cách tổ chức thực hiện, cách ứng xử với công việc, ứng xử với nhau;
                    đã nói, đã hứa phải làm, phải thực hiện hiệu quả. Phải tôn trọng kỷ luật, kỷ cương”, Thủ tướng nhắc nhở.
                    Thủ tướng Chính phủ Phạm Minh Chính đề nghị Văn phòng Chính phủ theo dõi,
                    nếu họp mà vẫn trì trệ, bất kể ai trong Ban Chỉ đạo vắng họp 3 lần liên tiếp
                    (trừ những lý do bất khả kháng) thì loại khỏi Ban Chỉ đạo. “Đây là kỷ luật,
                    kỷ cương hành chính; việc bảo đảm kỷ luật, kỷ cương trong họp Ban Chỉ đạo là
                    hết sức quan trọng, cần siết chặt lại”, Thủ tướng cương quyết.</p>
                <img class="my-3" src="./asset/img/news6.jpg" alt="">
                <p>Theo Bộ Giao thông vận tải, sau khi bổ sung, hiện nay tổng số các công trình, dự án thuộc Ban Chỉ đạo là 70 dự án, dự án thành phần tại 40 tỉnh, thành phố, gồm 63 dự án đường bộ, 5 dự án đường sắt, 2 dự án cảng hàng không.
                    Tại phiên họp, lãnh đạo các địa phương, bộ, ngành, nhà thầu báo cáo rà soát, tiến độ thực hiện các công trình công trình, dự án quan trọng quốc gia, trọng điểm ngành Giao thông vận tải; tình hình giải ngân.
                    Theo đó, sau những chỉ đạo quyết liệt của Chính phủ, Thủ tướng Chính phủ và việc điều chỉnh kịp thời các cơ chế, chính sách, nhất là cải cách thủ tục hành chính, các công trình, dự án cơ bản được triển khai tích cực. Tuy nhiên tiến độ thực hiện các dự án vẫn còn chậm so với yêu cầu.
                    Phát biểu kết luận Phiên họp, Thủ tướng Chính phủ Phạm Minh Chính nhấn mạnh, chúng ta đang thực hiện 3 đột phá chiến lược, trong đó có đột phá về hạ tầng giao thông. Do đó, chúng ta phải có đổi mới tư duy, cách xử lý, tiếp cận vấn đề. “Mỗi người phải thay đổi cách nghĩ, cách làm, cách tổ chức thực hiện, cách ứng xử với công việc, ứng xử với nhau;
                    đã nói, đã hứa phải làm, phải thực hiện hiệu quả. Phải tôn trọng kỷ luật, kỷ cương”, Thủ tướng nhắc nhở.
                    Thủ tướng Chính phủ Phạm Minh Chính đề nghị Văn phòng Chính phủ theo dõi,
                    nếu họp mà vẫn trì trệ, bất kể ai trong Ban Chỉ đạo vắng họp 3 lần liên tiếp
                    (trừ những lý do bất khả kháng) thì loại khỏi Ban Chỉ đạo. “Đây là kỷ luật,
                    kỷ cương hành chính; việc bảo đảm kỷ luật, kỷ cương trong họp Ban Chỉ đạo là
                    hết sức quan trọng, cần siết chặt lại”, Thủ tướng cương quyết.</p>
                <iframe class="my-3" width="100%" height="400px" src="https://www.youtube.com/embed/fRb8Ch6cN_w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>Theo Bộ Giao thông vận tải, sau khi bổ sung, hiện nay tổng số các công trình, dự án thuộc Ban Chỉ đạo là 70 dự án, dự án thành phần tại 40 tỉnh, thành phố, gồm 63 dự án đường bộ, 5 dự án đường sắt, 2 dự án cảng hàng không.
                    Tại phiên họp, lãnh đạo các địa phương, bộ, ngành, nhà thầu báo cáo rà soát, tiến độ thực hiện các công trình công trình, dự án quan trọng quốc gia, trọng điểm ngành Giao thông vận tải; tình hình giải ngân.
                    hết sức quan trọng, cần siết chặt lại”, Thủ tướng cương quyết.</p>
                <p class="text-black-50 my-5">Tác giả</p>
            </div> -->
            <!-- Footer -->
            <?php include 'footer.php'; ?>
</body>

</html>