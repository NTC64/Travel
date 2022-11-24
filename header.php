<div class="container-fluid p-0 main">
    <div class="header row m-0 p-0 text-white bg-dark">
        <div class="col-1"></div>
        <div class="header__logo col-2"><a href="../travel">ULSA IT</a></div>
        <div class="header__nav col-5">
            <ul class="nav__items navbar p-0 m-0">
                <li class="nav__item">
                    <a href="index.php" class="text-white">Home</a>
                </li>
                <li class="nav__item"><a href="alltour.php" class="text-white">Tour</a></li>
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
        <div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./asset/img/ban4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./asset/img/ban5.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./asset/img/ban6.jpg" alt="Third slide">
                    </div>
                </div>
                <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
            </div>
        </div>
        <div class="overlay"></div>
        <div class="search">
            <form action="" method="get">
                <select id="" class="search__txt">
                    <option value="">Chọn loại tour</option>
                </select>
                <select id="" class="search__select">
                    <option value="">Địa điểm</option>
                </select>
                <input type="submit" value="Search" class="search__btn" />
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/asset/js/js.js"></script>
<!-- <footer>

</footer> -->