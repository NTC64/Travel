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
            <h2 class="col-10 text-uppercase p-0">Category</h2>
            <!-- <a class="m-auto text-right text-black-50 hvblack">View all >></a> -->
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active black" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                    role="tab" aria-controls="nav-home" aria-selected="true">Các danh mục bài viết</a>
                <a class="nav-item nav-link black" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Các danh mục tour</a>

            </div>
        </nav>
        <div class="row">
            <div class="tab-content col-6" id="nav-tabContent">
                <div class="tab-pane fade show active row" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <ol class="clo-6">
                        <?php
                        $sql = "SELECT * FROM category_news";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <li class="ullist">
                            <h5 class="black mt-3"><?php echo $row['categoryName'] ?></h5>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ol>



                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <ol>
                        <?php
                        $sql = "SELECT * FROM category_tours";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li class="ullist">
                            <h5 class="black mt-3"><?php echo $row['categoryName'] ?></h5>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ol>
                </div>

            </div>
            <div class="col-5">
                <iframe src="https://giphy.com/embed/3o6nV8OYdUhiuKja1i" width="480" height="270" frameBorder="0"
                    class="giphy-embed" allowFullScreen></iframe>
                <p><a href="https://giphy.com/gifs/voegol-flying-airplane-3o6nV8OYdUhiuKja1i">via GIPHY</a></p>
            </div>
        </div>
        <div class="tourdetail">

        </div>

        <!---->

    </div>



    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>