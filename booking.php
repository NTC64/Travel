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
<?php
include("header.php");
?>
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


</head>


<body>
    <!-- Login Form -->

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
            <h2 class="col-12 text-uppercase p-0">Book Tour</h2>
            <!-- <a class="m-auto text-right text-black-50 hvblack">View all >></a> -->
        </div>
        <div class="tour__title row mt-5">
            <h3 class="col-10 text-uppercase p-0">Thông tin khách hàng</h3>
            <form action="" method="post" class="fm">
                <div class="row form my-3">

                    <div class="col-6 left">

                        <input type="text" name="fullName" placeholder="Họ và tên">
                        <input type="text" name="phone" placeholder="Số điện thoại">
                        <input type="text" name="address" placeholder="Địa chỉ">
                        <input type="text" name="" placeholder="Tên tour" readonly
                            value="<?php echo $row["tourName"] ?>">
                        <input type="text" name="" placeholder="Giá" class="price" readonly
                            value="<?php echo $row["tourPrice"] ?>">
                        <input type="number" placeholder="Số lượng người" class="quantity" name="people"
                            value="<?php echo $_GET["quantity"] ?>" min="1" max="50">
                        <input type="text" placeholder="Mã giảm giá" class="discount" require>
                        <div class="btn btn-success btnad">Áp dụng</div>
                    </div>
                    <div class="col-6 right">
                        <input type="date" name="startDate" readonly value="<?php echo $row["tourDate"] ?>">
                        Đến
                        <input type="date" name="endDate" readonly
                            value="<?php echo date('Y-m-j', strtotime('+' . $row["tourTime"] . ' day', strtotime($row['tourDate']))) ?>">
                        <textarea name="note" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                        <select name="cartPayment" id="pay">
                            <option value="">Chọn phương thức thanh toán</option>
                            <option value="CASH">Thanh toán trực tiếp</option>
                            <option name="" value="VNPAY">Thanh toán ví điện tử</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <h3 class="col-12">Tổng tiền: <span class="total"></span> <span class="totaldc"></span> VND</h3>
                    <input type="hidden" class="tong" name="cartPrice">
                </div>
                <div class="row btnbook">
                    <!-- <div class="btn btn-success btnbook">Đặt tour</div> -->
                    <input type="submit" value="Đặt tour" name="doanxem" class="btn btn-success btnbook">
                </div>
            </form>
        </div>
        <!-- tour card -->
        <!-- end tour card -->
        <?php
        //return tourID with GET method
        function getTourID()
        {
            if (isset($_GET['tourID'])) {
                $id = $_GET['tourID'];
                return $id;
            }
        }
        //return quantity with GET method
        function getQuantity()
        {
            if (isset($_GET['quantity'])) {
                $quantity = $_GET['quantity'];
                return $quantity;
            }
        }
        ?>
        <?php
        require_once('vnpay_php/config.php');
        ?>
        <?php
        if (isset($_POST['doanxem'])) {
            $userID = $_SESSION['userID'];
            $tourID = getTourID();
            $fullName = $_POST['fullName'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $cartPrice = $_POST['cartPrice'];
            $people = $_POST['people'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $note = $_POST['note'];
            $cartPayment = $_POST['cartPayment'];
            $cartStatus = "Đang chờ xác nhận";
            $check = 0;
            if ($cartPayment != "VNPAY") {
                echo '<script>Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "The feature is under maintenance. Please come back in the future!!",
                  });</script>';
            } else {
                echo '<script> window.location.href="./vnpay_php/"</script>';
            }

            // //validate phone number
            // if (!preg_match("/^[0-9]{10}$/", $phone)) {
            //     echo '<script>Swal.fire({
            //         icon: "error",
            //         title: "Oops...",
            //         text: "Phone number is invalid!!",
            //       });</script>';
            // }
            // //validate address
            // if (!preg_match("/^[a-zA-Z0-9\s,.'-]{3,}$/", $address)) {
            //     echo '<script>Swal.fire({
            //         icon: "error",
            //         title: "Oops...",
            //         text: "Address is invalid!!",
            //       });</script>';
            // }

            // $sql = "INSERT INTO cart (`userID`, `tourID`, `fullName`, `phone`, `address`, `cartPrice`, `people`, `startDate`, `endDate`, `note`, `cart_payment`, `cartStatus`) VALUES ('$userID', '$tourID', '$fullName', '$phone', '$address', '$cartPrice', '$people', '$startDate', '$endDate', '$note', '$cartPayment', '$cartStatus')";
            // $result = mysqli_query($conn, $sql);
            // if ($result) {
            //     echo "<script>alert('Đặt tour thành công!')</script>";
            //     // echo "<script>window.location.href='index.php'</script>";
            // } else {
            //     echo "<script>alert('Đặt tour thất bại!')</script>";
            // }

        }
        ?>
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