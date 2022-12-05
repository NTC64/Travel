<!DOCTYPE html>
<html lang="en">

<head>
    <title>ULSA IT</title>
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
            <?php
            function get_tour_list($conn)
            {
                $sql = "SELECT * FROM tours";
                $result = mysqli_query($conn, $sql);
                $tour_list = array();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tour_list[] = $row;
                    }
                }
                return $tour_list;
            }
            ?>
            <?php
            $tour_list = get_tour_list($conn);
            foreach ($tour_list as $tour) {
            ?>
                <!-- tour card -->
                <div class="card col-4 p-0 m-2">
                    <img class="card-img-top" src="uploads/images/<?php echo $tour['tourImage']; ?>" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $tour['tourName']; ?></h5>

                        <p class="card-text text-black-70"><?php
                                                            //echo first line of description
                                                            $firstline = explode("\n", $tour['tourDescription']);
                                                            echo $firstline[0];
                                                            // echo  mb_substr($tour['tourDescription'], 0, 40); 
                                                            ?></p>
                        <p class="card-price text-danger">Giá: <?php echo $tour['tourPrice']; ?></p>
                    </div>
                    <a href="tour.php?tourID=<?php echo $tour['tourID'] ?>" class="btn btn-green btnnews" data-id="id">Đặt
                        Tour</a>
                </div>
                <?php } ?>'
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
                <div class="card col-4 p-0 mx-3 text-center category__left" data-category='news'>
                    <img class="card-img-top" src="https://th.bing.com/th/id/OIP.Eh5VUNnnLJ_eh701C5kgjwHaE8?pid=ImgDet&rs=1" alt="Card image cap" />
                    <div class="card-body">
                        <p class="card-text w500 text-uppercase">Các danh mục bài viết</p>
                    </div>
                </div>
                <div class="card col-4 p-0 mx-3 text-center category__right" data-category='tour'>
                    <img class="card-img-top" src="https://th.bing.com/th/id/R.9d88e3210f675be1f3f86975378aa494?rik=MV80xP7ruw5FcQ&riu=http%3a%2f%2fwww.servistur.ru%2fupload%2f6050183_xlarge.jpg&ehk=xTIkcHaDgYtR02IB1FTaEFyOPF7HC5YaRntxv2Gojlk%3d&risl=&pid=ImgRaw&r=0" alt="Card image cap" />
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
            $sql = "SELECT newsID, resources, date, title, description FROM news,uploads WHERE news.uploadID = uploads.uploadID limit 3";
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
                    <video src="uploads/video/<?php echo $news['resources']; ?>"></video>
                    <div class="card-body">
                        <p class="card-date text-black-50"><?php echo $news['date']; ?></p>
                        <h5 class="card-title"><?php echo mb_substr($news['title'], 0, 40);  ?></h5>
                    </div>
                    <a href="news.php?newsID=<?php echo $news['newsID']; ?>" class="btn btn-green btnnews">Xem chi tiết</a>
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