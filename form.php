<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thanh toán</title>
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
    <?php
    include("header.php");
    ?>
    <?php
    if (isset($_GET['tourID'])) {
        $id = $_GET['tourID'];
        $sql = "SELECT * FROM tours WHERE tours.tourID = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        }
    }
    ?>
    <!-- main -->
    <div class="container hotTour my-4">
        <div class="tour__title row mt-5">
            <h2 class="col-12 text-uppercase p-0">Book Tour</h2>
            <!-- <a class="m-auto text-right text-black-50 hvblack">View all >></a> -->
        </div>
        <div class="tour__title row mt-5">
            <h3 class="col-10 text-uppercase p-0">Thông tin khách hàng</h3>
            <form action="tour.php" method="post" class="fm">
                <div class="row form my-3">

                    <div class="col-6 left">

                        <input type="text" placeholder="Họ và tên">
                        <input type="text" placeholder="Số điện thoại">
                        <input type="text" placeholder="Địa chỉ">
                        <input type="text" placeholder="Tên tour" value="">
                        <input type="text" placeholder="Giá" class="price" value="">
                        <input type="number" placeholder="Số lượng người" class="quantity" value="" min="1" max="50">
                        <input type="text" placeholder="Mã giảm giá" class="discount" require>
                        <div class="btn btn-success btnad">Áp dụng</div>
                    </div>
                    <div class="col-6 right">

                        <input type="date" value="">
                        Đến
                        <input type="date" value="">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                        <select name="" id="pay">
                            <option value="">Chọn phương thức thanh toán</option>
                            <option value="atm">Thanh toán trực tiếp</option>
                            <option value="momo">Thanh toán ví điện tử</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <h3 class="col-12">Tổng tiền: <span class="total"></span> <span class="totaldc"></span> VND</h3>
                </div>
                <div class="row btnbook">
                    <!-- <div class="btn btn-success btnbook">Đặt tour</div> -->
                    <input type="button" value="Đặt tour" name="doanxem" class="btn btn-success btnbook">
                </div>
            </form>
        </div>
        <!-- tour card -->
        <!-- end tour card -->
        <?php
        if (isset($_POST['doanxem'])) {
            $userID = $_SESSION['userID'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $tour = $_POST['tour'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $discount = $_POST['discount'];
            $date = $_POST['date'];
            $pay = $_POST['pay'];
            $sql = "INSERT INTO `booktour`(`name`, `phone`, `address`, `tour`, `price`, `quantity`, `discount`, `date`, `pay`) VALUES ('$name','$phone','$address','$tour','$price','$quantity','$discount','$date','$pay')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>Swal.fire({
                        icon: "success",
                        title: "Đặt tour thành công",
                        showConfirmButton: false,
                        timer: 1500
                    })</script>';
            } else {
                echo '<script>Swal.fire({
                        icon: "error",
                        title: "Đặt tour thất bại",
                        showConfirmButton: false,
                        timer: 1500
                    })</script>';
            }
        }
        ?>
        <div class="tourdetail">

        </div>

        <!---->

    </div>
    </div>
    <!-- Footer -->
    <?php include('footer.php') ?>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/asset/js/js.js"></script>

</html>