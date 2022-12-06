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
require_once('config_vnpay.php');
?>

<head>
    <meta charset="UTF-8">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<?php
if (isset($_POST['redirect'])) {
    $order_code = rand(100000, 999999);
    $userID = $_SESSION['userID'];
    $tourID = $_POST['tourID'];
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
    if ($cartPayment == "CASH") {
        $sql = "INSERT INTO cart (`order_code`, `userID`, `tourID`, `fullName`, `phone`, `address`, `cartPrice`, `people`, `startDate`, `endDate`, `note`, `cart_payment`, `cartStatus`) VALUES ('$order_code','$userID', '$tourID', '$fullName', '$phone', '$address', '$cartPrice', '$people', '$startDate', '$endDate', '$note', '$cartPayment', '$cartStatus')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script> swal.fire ({
                title: "Đặt tour thành công",
                text: "Vui lòng chờ xác nhận từ nhân viên",
                icon: "success",
                confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../index.php";
                    }
                }) </script>';
        } else {
            echo "<script>alert('Đặt tour thất bại!')</script>";
        }
        $sql = "UPDATE `cart` SET `cartStatus` = 'Sẽ thanh toán tiền mặt' WHERE cart.order_code = '$order_code'";
        $result = mysqli_query($conn, $sql);
    } else if ($cartPayment == "VNPAY") {
        $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $vnp_TxnRef . ' tại website của ULSA IT ';
        $vnp_OrderType = '170000';
        $vnp_Amount = $cartPrice * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $expire;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            $_SESSION['order_code'] = $order_code;
            $sql = "INSERT INTO cart (`order_code`, `userID`, `tourID`, `fullName`, `phone`, `address`, `cartPrice`, `people`, `startDate`, `endDate`, `note`, `cart_payment`, `cartStatus`) VALUES ('$order_code','$userID', '$tourID', '$fullName', '$phone', '$address', '$cartPrice', '$people', '$startDate', '$endDate', '$note', '$cartPayment', '$cartStatus')";
            $result = mysqli_query($conn, $sql);
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
            
	// vui lòng tham khảo thêm tại code demo