<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tất cả bài viết</title>
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
            <h2 class="col-10 text-uppercase p-0">All News</h2>
            <!-- <a class="m-auto text-right text-black-50 hvblack">View all >></a> -->
        </div>
        <!-- tour card -->
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
                <video src="uploads/video/<?php echo $news['resources']; ?>"></video>
                <div class="card-body">
                    <p class="card-date text-black-50"><?php echo $news['date']; ?></p>
                    <h5 class="card-title"><?php echo $news['title']; ?></h5>
                </div>
                <a href="news.php?newsID=<?php echo $news['newsID']; ?>" class="btn btn-green">Xem chi tiết</a>
            </div>
            <?php
            }
            ?>
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
    </div>


    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>