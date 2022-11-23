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
    <?php
    include("header.php");
    ?>
    <!-- main -->
    <div class="container hotTour my-4">
        <div class="tour__title row mt-5">
            <h2 class="col-10 text-uppercase p-0">Tour</h2>
            <!-- <a class="m-auto text-right text-black-50 hvblack">View all >></a> -->
        </div>
        <div class="tour__title row mt-5">
            <h3 class="col-10 text-uppercase p-0">Tên địa điểm du lịch</h3>

        </div>
        <div class="tour__items row">
            <!-- tour card -->
            <div class="col-8">
                <img src="./asset/img/ban5.jpg" alt="">
                <img src="./asset/img/ban2.jpg" alt="">
                <img src="./asset/img/ban2.jpg" alt="">
                <span>

                </span>
            </div>
            <div class="col-4 booking">
                <p class="tour-price text-or">Giá <span>Vnđ/Người</span></p>
                <div class="text_box my-3">

                    <label for="">Số người:</label><input type="number" value="1" min="1" max="10">
                </div>
                <div class="text_box my-3">
                    <label for="">Khởi hành:</label><input type="date" name="" class="date" id="">

                </div>
                <a href="tour.php" class="btn btn-green mt-4 btn__tour" data-id="id">Đặt Tour</a>
            </div>
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
<script src="asset/js/js.js"></script>

</html>