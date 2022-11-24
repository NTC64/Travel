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
            <h2 class="col-10 text-uppercase p-0">Hot Tour</h2>
            <a class="m-auto text-right text-black-50 hvblack" href="alltour.php">View all >></a>
        </div>
        <div class="tour__items row">
            <!-- tour card -->
            <div class="card col-4 p-0 m-2">
                <img class="card-img-top" src="asset/img/tour1.jpg" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Tên địa điểm du lịch</h5>
                    <p class="card-text text-black-50">Mô tả</p>

                    <p class="card-price text-danger">Giá</p>
                    <a href="tour.php" class="btn btn-green" data-id="id">Đặt Tour</a>
                </div>
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
            <a class="m-auto text-right text-black-50 hvblack" href="allnews.php">View all >></a>
        </div>
        <?php
        //get list news from database
        function get_news_list()
        {
            global $conn;
            $sql = "SELECT newsID, resources, date, title, description FROM news,uploads WHERE news.uploadID = uploads.uploadID";
            $result = mysqli_query($conn, $sql);
            $news_list = array();
            while ($row = mysqli_fetch_array($result)) {
                $news_list[] = $row;
            }
            return $news_list;
        }
        ?>
        <div class="tour__items row">
            <?php
            $news_list = get_news_list();
            foreach ($news_list as $news) {
            ?>
                <div class="card col-4 p-0 m-2">
                    <video src="uploads/<?php echo $news['resources']; ?>"></video>
                    <div class="card-body">
                        <p class="card-date text-black-50"><?php echo $news['date']; ?></p>
                        <h5 class="card-title"><?php echo $news['title']; ?></h5>
                        <a href="news.php?newsID=<?php echo $news['newsID']; ?>" class="btn btn-green">Xem chi tiết</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/asset/js/js.js"></script>

</html>