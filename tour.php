<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:index.php');
    exit;
}
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
            <h3 class="col-10 text-uppercase p-0">Tên địa điểm du lịch</h3>

        </div>
        <div class="tour__items row">
            <!-- tour card -->
            <div class="col-8 slide_tour">
                <img src="./asset/img/ban5.jpg" alt="">
                <img class="hide" src="./asset/img/ban2.jpg" alt="">
                <img class="hide" src="./asset/img/ban2.jpg" alt="">
                <div class="row my-3 text-black-50">
                    <div class="col-4">địa điểm:</div>

                    <div class="col-4">thời gian:</div>
                </div>
                <div class="row text-black-50">
                    <div class="col-4">Thời Gian khởi hành:</div>

                </div>
                <div class="row my-3">
                    <div class="col-12">TOUR CÓ GÌ HẤP DẪN? <br>

                        Tận mắt ngắm nhìn phong cảnh hùng vĩ miền sơn cước: đèo Thung Khe, thác Dải Yếm
                        Khám phá những giá trị lịch sử vẻ vang, hào hùng một thời dân tộc tại Điện Biên.
                        Check - in giữa khung cảnh núi non trùng điệp, hùng vĩ và nên thơ: cầu Kính Tình Yêu, đồi chè
                        Trái Tim, Ô Quy Hồ, Swing Sapa...
                        Chinh phục một trong "tứ mã đỉnh đèo" của Việt Nam: Đèo Pha Đin.
                        Trải nghiệm ẩm thực địa phương độc đáo.
                        Điểm hấp dẫn
                        – Tàu hoạt động theo mô hình du lịch – nhà hàng mỗi ngày trên sông Sài Gòn tại khu du lịch Tân
                        Cảng - A100 Ung Văn Khiêm, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh

                        – Du khách đi du thuyền có thể thưởng thức các món ăn ngon theo sở thích riêng của mình trong
                        khung cảnh lãng mạn.

                        – Mỗi tầng là mỗi phong cách nhạc khác nhau. Bên cạnh đó tầng 1 và tầng 2 : Phục vụ các món ăn
                        Việt – Hoa đa dạng phong phú nhạc sống, ảo thuật, múa Hawai. Tầng 3 : Nhà hàng Âu – quầy bar với
                        các loại thức uống cocktail, chương trình nhạc Flamenco, hòa tấu violon, guitar, ảo thuật, thổi
                        sáo.
                        1. Điều kiện giá vé:

                        – Nhóm dưới 4 khách phụ thu phí lên tàu là 40.000 Vnđ/ khách.

                        – Giá vé áp dụng trên một khách đối với nhóm khách tối thiểu là 02 người trở lên cho một thực
                        đơn tự chọn trước (tàu Saigon), áp dụng với thực đơn từ Menu 01 đến menu 06.

                        – Nhóm của Qúy Khách sẽ ngồi bàn ăn riêng biệt, không ngồi chung bàn ăn với nhóm khách khác.

                        – Đơn giá áp dụng cho tất cả các ngày kể ngày cả cuối tuần, ngày lễ.

                        – Vé đã mua không được hoàn đổi trong mọi trường hợp, trừ những trường hợp bất khả kháng như:
                        thiên tai, hỏa hoạn hoặc tàu không thể hoạt động do điều kiện khách quan.

                        2. Gía vé bao gồm:

                        – Vé tham quan tàu du lịch nhà hàng tàu Sài Gòn trên Sông Sài Gòn.

                        – Ăn uống: Bao gồm bữa ăn tối theo thực đơn (đính kèm trong chương trình bên dưới) + Trà đá miễn
                        phí.

                        – Chương trình ca múa nhạc, ảo thuật, múa Hawai phục vụ khách.

                        – HDV suốt hành trình

                        – Bảo hiểm 10.000.000 Vnd/ Vụ

                        3. Gía vé không bao gồm:</div>

                </div>



            </div>
            <div class="col-4 booking">
                <p class="tour-price text-or">Giá: <span class="pricetour">10000</span> <span>Vnđ/Người</span></p>
                <div class="text_box my-3">

                    <label for="">Số người:</label><input type="number" value="1" min="1" max="10">
                </div>
                <div class="text_box my-3">
                    <label for="">Khởi hành:</label><input type="date" name="" class="date" id="">

                </div>
                <a href="booking.php" class="btn btn-green mt-4 btn__tour" data-id="id">Đặt Tour</a>
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