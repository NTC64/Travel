<?php session_start() ?>
<?php
include '../conn.php';
?>
<?php
require_once('../config_vnpay.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thank you</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <!-- partial:index.partial.html -->
    <section class="login-main-wrapper">
        <div class="main-container">
            <div class="login-process">
                <div class="login-main-container">
                    <div class="thankyou-wrapper">
                        <h1><img src="http://montco.happeningmag.com/wp-content/uploads/2014/11/thankyou.png"
                                alt="thanks" /></h1>
                        <p>for contacting us, we will get in touch with you soon... </p>
                        <a href="../index.php">Back to home</a>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </section>
    <!-- partial -->
    <?php
    if (isset($_GET['vnp_Amount'])) {
        $vnp_Amount = $_GET['vnp_Amount'];
        $vnp_BankCode = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = "";
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $order_code = $_SESSION['order_code'];
        $ResponseCode = $_GET['vnp_ResponseCode'];
        if ($ResponseCode == 24) {
            $sql = "UPDATE cart SET cartStatus = 'Giao dịch bị hủy' WHERE order_code = '$order_code'";
            $result = mysqli_query($conn, $sql);
    ?>
    <script>
    swal.fire({
        title: "Thanh toán thất bại",
        text: "Khách hàng hủy giao dịch",
        icon: "error",
        confirmButtonText: "OK"
    })
    // .then((result) => {
    //     if (result.isConfirmed) {
    //         window.location.href = "../index.php";
    //     }
    // })
    </script>
    <?php
        } else if ($ResponseCode == 00) {
            $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
            //insert data to database
        }
        $sql = "INSERT INTO `vnpay`(`price`, `code_cart`, `bankcode`, `banktranno`, `cardtype`, `orderinfor`, `paydate`, `tmncode`, `transaction_no`,`ResponseCode`) VALUES ('$vnp_Amount','$order_code','$vnp_BankCode','$vnp_BankTranNo','$vnp_CardType','$vnp_OrderInfo','$vnp_PayDate','$vnp_TmnCode','$vnp_TransactionNo','$ResponseCode')";
        $result = mysqli_query($conn, $sql);
        if ($ResponseCode == 00) {
            if ($result) {
                $sql1 = "UPDATE `cart` SET `cartStatus` = 'Đã thanh toán qua VNPAY' WHERE `order_code` = '$order_code'";
                $result = mysqli_query($conn, $sql1);
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "Đặt tour thành công",
                    showConfirmButton: false,
                    timer: 1500
                })</script>';
            } else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Đặt tour thất bại',
                    showConfirmButton: false,
                    timer: 1500
                  })</script>";
            }
        }
    }
    ?>
</body>

</html>