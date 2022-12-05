<!DOCTYPE html>
<html lang="en">
<?php
// if (!isset($_SERVER['HTTP_REFERER'])) {
//     // redirect them to your desired location
//     header('location:index.php');
//     exit;
// }
?>

<head>
    <title>Chi tiết tour</title>
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
            <h2 class="col-10 text-uppercase p-0">Chi Tiết Tour</h2>
            <!-- <a class="m-auto text-right text-black-50 hvblack">View all >></a> -->
        </div>
        <div class="tour__title row mt-5">
            <h3 class="col-10 text-uppercase p-0"><?php echo $row['tourName'] ?> </h3>
        </div>
        <div class="tour__items row">
            <!-- tour card -->

            <div class="col-8 slide_tour">
                <img src="uploads/images/<?php echo $row['tourImage']; ?>" alt="">
                <img class="hide" src="./asset/img/ban2.jpg" alt="">
                <img class="hide" src="./asset/img/ban2.jpg" alt="">
                <div class="row my-3 text-black-50">
                    <div class="col-6">Địa điểm: <?php echo $row['tourLocation'] ?> </div>

                    <div class="col-4">Thời gian: <?php echo $row['tourTime'] ?> ngày</div>
                </div>
                <div class="row text-black-50">
                    <div class="col-6">Thời gian khởi hành: <?php echo $row['tourDate'] ?></div>
                </div>
                <div class="row my-3">
                    <div class="col-12"><?php echo nl2br($row['tourDescription']) ?><br>

                    </div>

                </div>



            </div>
            <div class="col-4 booking">
                <p class="tour-price text-or">Giá: <span class="pricetour"><?php echo $row['tourPrice'] ?></span>
                    <span>VNĐ/Người</span>
                </p>
                <div class="text_box my-3">

                    <label for="">Số người:</label><input type="number" name="" value="1" min="1" max="50" class="sluong">
                </div>
                <div class="text_box my-3">
                    <label for="">Khởi hành:</label><input type="date" name="" class="" id="" readonly value="<?php echo $row['tourDate'] ?>">

                </div>
                <p class="text-white f14">" Sao chép mã giảm giá (ULSAIT) để được khuyến mãi 20% "</p>
                <div class="btn btn-green mt-4 btn__tour" data-id="<?php echo $row['tourID'] ?>">Đặt Tour</div>
                <!-- <a href="booking.php"></a> -->
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
<script src="/asset/js/js.js"></script>

</html>