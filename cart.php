    <?php session_start() ?>
    <?php
    include 'conn.php';
    ?>
    <?php
    if (!isset($_SERVER['HTTP_REFERER'])) {
        // redirect them to your desired location
        header('location:index.php');
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Cart</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="./asset/css/style.css" />
        <link rel="stylesheet" href="asset/font/fontawesome-free-6.1.2-web/css/all.min.css" />
        <link rel="stylesheet" href="./asset/img/" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>


    <body>
        <!-- Login Form -->
        <?php
        include("header.php");
        ?>
        <!-- main -->
        <div class="container hotTour my-4">
            <div class="tour__title row mt-5">
                <h2 class="col-12 text-uppercase p-0">Booked Tour</h2>
                <!-- <a class="m-auto text-right text-black-50 hvblack">View all >></a> -->
            </div>
            <div class="tour__title  mt-5">
                <h3 class="row text-suppercase p-0">Thông tin Tour</h3>
                <div class="row">
                    <table>
                        <tr>
                            <th>Tên Tour</th>
                            <th>Ngày khởi hành</th>
                            <th>Ngày kết thúc</th>
                            <th>Giá</th>
                            <th>Số lượng người</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>

                        </tr>
                        <?php
                        function get_my_tour()
                        {
                            global $conn;
                            $id = $_SESSION['userID'];
                            $sql = "SELECT * FROM cart,tours WHERE cart.tourID = tours.tourID AND cart.userID = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $my_tour = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            return $my_tour;
                        }
                        ?>
                        <?php
                        $my_tour = get_my_tour();
                        foreach ($my_tour as $tour) {
                        ?>
                        <tr>
                            <td><?php echo $tour['tourName']; ?></td>
                            <td><?php echo $tour['startDate']; ?></td>
                            <td><?php echo $tour['endDate']; ?></td>
                            <td><?php echo $tour['tourPrice']; ?></td>
                            <td><?php echo $tour['people']; ?></td>
                            <td><?php echo $tour['cartPrice']; ?></td>
                            <td><?php echo $tour['cartStatus']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>


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