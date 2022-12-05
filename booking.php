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
                        <input type="text" placeholder="Tên tour" readonly>
                        <input type="text" placeholder="Giá" class="price" readonly>
                        <input type="number" placeholder="Số lượng người" class="quantity" value="1" min="1" max="50">
                    </div>
                    <div class="col-6 right">

                        <input type="text" placeholder="Ngày khởi hành" readonly>
                        <input type="text" placeholder="Ngày kết thúc" readonly>
                        <textarea name="" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                        <select name="" id="pay">
                            <option value="">Chọn phương thức thanh toán</option>
                            <option value="atm">Thanh toán trực tiếp</option>
                            <option value="momo">Thanh toán ví điện tử</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <h3 class="col-12">Tổng tiền: <span class="total"></span> VND</h3>
                </div>
                <div class="row btnbook">
                    <div class="btn btn-success btnbook">Đặt tour</div>
                </div>

            </form>

        </div>
        <!-- tour card -->

        <!-- end tour card -->
        <!-- tour card -->
        <!-- ..... -->
        <!-- end tour card -->
        <!-- chi tiết tour -->
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
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<script> alert("Bạn đã đăng nhập");</script>';
} else {
    echo '<script> alert("Bạn chưa đăng nhập");</script>';
}
?>