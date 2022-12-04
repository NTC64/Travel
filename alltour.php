<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tất cả tour</title>
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
            <h2 class="col-10 text-uppercase p-0">All Tours</h2>
        </div>
        <!-- tour card -->
        <?php
        //list all tours
        function get_tour_list()
        {
            global $conn;
            $sql = "SELECT * FROM tours";
            $result = mysqli_query($conn, $sql);
            $tour_list = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $tour_list[] = $row;
            }
            return $tour_list;
        } ?>
        <div class="tour__items row">
            <!-- tour card -->
            <?php
            $tour_list = get_tour_list();
            foreach ($tour_list as $tour) {
            ?>
            <div class="card col-4 p-0 m-2">
                <img class="card-img-top" src="uploads/images/<?php echo $tour['tourImage']; ?>" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title"><?php echo $tour['tourName'] ?></h5>
                    <p class="card-text text-black-50"><?php echo $tour['tourDescription'] ?></p>
                    <p class="card-price text-danger">Giá: <?php echo $tour['tourPrice'] ?></p>
                    <a href="tour.php?tourID=<?php echo $tour['tourID'] ?>" class="btn btn-green" data-id="id">Đặt
                        Tour</a>
                </div>
            </div>
            <?php } ?>
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