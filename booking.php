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
    //return tourID with GET method
    function getTourID()
    {
        if (isset($_GET['tourID'])) {
            $id = $_GET['tourID'];
            return $id;
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
            <form action="payment.php" method="post" class="fm">
                <div class="row form my-3">

                    <div class="col-6 left">
                        <input type="hidden" class="idtour">
                        <input type="text" name="fullName" placeholder="Họ và tên">
                        <input type="text" name="phone" placeholder="Số điện thoại">
                        <input type="text" name="address" placeholder="Địa chỉ">
                        <input type="text" name="" placeholder="Tên tour" readonly value="<?php echo $row["tourName"] ?>">
                        <input type="text" name="" placeholder="Giá" class="price" readonly value="<?php echo $row["tourPrice"] ?>">
                        <input type="number" placeholder="Số lượng người" class="quantity" name="people" value="<?php echo $_GET["quantity"] ?>" min="1" max="50">
                        <input type="text" placeholder="Mã giảm giá" class="discount" require>
                        <div class="btn btn-success btnad">Áp dụng</div>
                    </div>
                    <div class="col-6 right">
                        <input type="date" name="startDate" readonly value="<?php echo $row["tourDate"] ?>">
                        Đến
                        <input type="date" name="endDate" readonly value="<?php echo date('Y-m-j', strtotime('+' . $row["tourTime"] . ' day', strtotime($row['tourDate']))) ?>">
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
        // if (isset($_POST['doanxem'])) {
        //     $order_code = rand(100000, 999999);
        //     $userID = $_SESSION['userID'];
        //     $tourID = getTourID();
        //     $fullName = $_POST['fullName'];
        //     $phone = $_POST['phone'];
        //     $address = $_POST['address'];
        //     $cartPrice = $_POST['cartPrice'];
        //     $people = $_POST['people'];
        //     $startDate = $_POST['startDate'];
        //     $endDate = $_POST['endDate'];
        //     $note = $_POST['note'];
        //     $cartPayment = $_POST['cartPayment'];
        //     $cartStatus = "Đang chờ xác nhận";
        //     if ($cartPayment == "CASH") {
        // $sql = "INSERT INTO cart ('order_code',`userID`, `tourID`, `fullName`, `phone`, `address`, `cartPrice`, `people`, `startDate`, `endDate`, `note`, `cart_payment`, `cartStatus`) VALUES ('$order_code','$userID', '$tourID', '$fullName', '$phone', '$address', '$cartPrice', '$people', '$startDate', '$endDate', '$note', '$cartPayment', '$cartStatus')";
        // $result = mysqli_query($conn, $sql);
        // if ($result) {
        //     echo "<script>alert('Đặt tour thành công!')</script>";
        //     // echo "<script>window.location.href='index.php'</script>";
        // } else {
        //     echo "<script>alert('Đặt tour thất bại!')</script>";
        // }
        // } else if ($cartPayment == "VNPAY") {
        //     $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        //     $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $vnp_TxnRef . ' tại website của ULSA IT ';
        //     $vnp_OrderType = '170000';
        //     $vnp_Amount = $cartPrice * 100;
        //     $vnp_Locale = 'vn';
        //     $vnp_BankCode = 'NCB';
        //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //     //Add Params of 2.0.1 Version
        //     $vnp_ExpireDate = $expire;

        //     $inputData = array(
        //         "vnp_Version" => "2.1.0",
        //         "vnp_TmnCode" => $vnp_TmnCode,
        //         "vnp_Amount" => $vnp_Amount,
        //         "vnp_Command" => "pay",
        //         "vnp_CreateDate" => date('YmdHis'),
        //         "vnp_CurrCode" => "VND",
        //         "vnp_IpAddr" => $vnp_IpAddr,
        //         "vnp_Locale" => $vnp_Locale,
        //         "vnp_OrderInfo" => $vnp_OrderInfo,
        //         "vnp_OrderType" => $vnp_OrderType,
        //         "vnp_ReturnUrl" => $vnp_Returnurl,
        //         "vnp_TxnRef" => $vnp_TxnRef,
        //         "vnp_ExpireDate" => $vnp_ExpireDate
        //     );

        //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        //         $inputData['vnp_BankCode'] = $vnp_BankCode;
        //     }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        //         ksort($inputData);
        //         $query = "";
        //         $i = 0;
        //         $hashdata = "";
        //         foreach ($inputData as $key => $value) {
        //             if ($i == 1) {
        //                 $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        //             } else {
        //                 $hashdata .= urlencode($key) . "=" . urlencode($value);
        //                 $i = 1;
        //             }
        //             $query .= urlencode($key) . "=" . urlencode($value) . '&';
        //         }

        //         $vnp_Url = $vnp_Url . "?" . $query;
        //         if (isset($vnp_HashSecret)) {
        //             $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        //             $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        //         }
        //         $returnData = array(
        //             'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        //         );
        //         if (isset($_POST['redirect'])) {
        //             header('Location: ' . $vnp_Url);
        //             die();
        //         } else {
        //             echo json_encode($returnData);
        //         }
        //         echo '<script> window.location.href="https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"</script>';
        //     }
        // }
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