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
</head>
<?php
include 'conn.php';
?>

<body>
    <!-- header -->
    <?php
    include 'header.php';
    ?>
    <!-- main -->
    <?php
    //echo news information base on id after click a href in index.php
    if (isset($_GET['newsID'])) {
        $id = $_GET['newsID'];
        $sql = "SELECT *,resources FROM news, uploads WHERE news.newsID = '$id' AND news.uploadID = uploads.uploadID";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <div class="container newsmain my-5">
                <h3><?php echo $row['title']; ?></h3>
                <p class="text-black-50"><?php echo $row['date']; ?></p>
                <p><?php echo nl2br($row['content']) ?></p>
                <div class="video">
                    <video width="80%" height="auto" controls src="uploads/<?php echo $row['resources'] ?>" type='video/mp4'></video>

                </div>
            </div>
    <?php
        }
    }
    ?>

    <!-- <div class="container newsmain my-5">
                <h3>tiêu đề bài viết</h3>
                <p class="text-black-50"> Thời gian đăng</p>
                <p>Theo Bộ Giao thông vận tải, sau khi bổ sung, hiện nay tổng số các công trình, dự án thuộc Ban Chỉ đạo là 70 dự án, dự án thành phần tại 40 tỉnh, thành phố, gồm 63 dự án đường bộ, 5 dự án đường sắt, 2 dự án cảng hàng không.
                    Tại phiên họp, lãnh đạo các địa phương, bộ, ngành, nhà thầu báo cáo rà soát, tiến độ thực hiện các công trình công trình, dự án quan trọng quốc gia, trọng điểm ngành Giao thông vận tải; tình hình giải ngân.
                    Theo đó, sau những chỉ đạo quyết liệt của Chính phủ, Thủ tướng Chính phủ và việc điều chỉnh kịp thời các cơ chế, chính sách, nhất là cải cách thủ tục hành chính, các công trình, dự án cơ bản được triển khai tích cực. Tuy nhiên tiến độ thực hiện các dự án vẫn còn chậm so với yêu cầu.
                    Phát biểu kết luận Phiên họp, Thủ tướng Chính phủ Phạm Minh Chính nhấn mạnh, chúng ta đang thực hiện 3 đột phá chiến lược, trong đó có đột phá về hạ tầng giao thông. Do đó, chúng ta phải có đổi mới tư duy, cách xử lý, tiếp cận vấn đề. “Mỗi người phải thay đổi cách nghĩ, cách làm, cách tổ chức thực hiện, cách ứng xử với công việc, ứng xử với nhau;
                    đã nói, đã hứa phải làm, phải thực hiện hiệu quả. Phải tôn trọng kỷ luật, kỷ cương”, Thủ tướng nhắc nhở.
                    Thủ tướng Chính phủ Phạm Minh Chính đề nghị Văn phòng Chính phủ theo dõi,
                    nếu họp mà vẫn trì trệ, bất kể ai trong Ban Chỉ đạo vắng họp 3 lần liên tiếp
                    (trừ những lý do bất khả kháng) thì loại khỏi Ban Chỉ đạo. “Đây là kỷ luật,
                    kỷ cương hành chính; việc bảo đảm kỷ luật, kỷ cương trong họp Ban Chỉ đạo là
                    hết sức quan trọng, cần siết chặt lại”, Thủ tướng cương quyết.</p>
                <img class="my-3" src="./asset/img/news6.jpg" alt="">
                <p>Theo Bộ Giao thông vận tải, sau khi bổ sung, hiện nay tổng số các công trình, dự án thuộc Ban Chỉ đạo là 70 dự án, dự án thành phần tại 40 tỉnh, thành phố, gồm 63 dự án đường bộ, 5 dự án đường sắt, 2 dự án cảng hàng không.
                    Tại phiên họp, lãnh đạo các địa phương, bộ, ngành, nhà thầu báo cáo rà soát, tiến độ thực hiện các công trình công trình, dự án quan trọng quốc gia, trọng điểm ngành Giao thông vận tải; tình hình giải ngân.
                    Theo đó, sau những chỉ đạo quyết liệt của Chính phủ, Thủ tướng Chính phủ và việc điều chỉnh kịp thời các cơ chế, chính sách, nhất là cải cách thủ tục hành chính, các công trình, dự án cơ bản được triển khai tích cực. Tuy nhiên tiến độ thực hiện các dự án vẫn còn chậm so với yêu cầu.
                    Phát biểu kết luận Phiên họp, Thủ tướng Chính phủ Phạm Minh Chính nhấn mạnh, chúng ta đang thực hiện 3 đột phá chiến lược, trong đó có đột phá về hạ tầng giao thông. Do đó, chúng ta phải có đổi mới tư duy, cách xử lý, tiếp cận vấn đề. “Mỗi người phải thay đổi cách nghĩ, cách làm, cách tổ chức thực hiện, cách ứng xử với công việc, ứng xử với nhau;
                    đã nói, đã hứa phải làm, phải thực hiện hiệu quả. Phải tôn trọng kỷ luật, kỷ cương”, Thủ tướng nhắc nhở.
                    Thủ tướng Chính phủ Phạm Minh Chính đề nghị Văn phòng Chính phủ theo dõi,
                    nếu họp mà vẫn trì trệ, bất kể ai trong Ban Chỉ đạo vắng họp 3 lần liên tiếp
                    (trừ những lý do bất khả kháng) thì loại khỏi Ban Chỉ đạo. “Đây là kỷ luật,
                    kỷ cương hành chính; việc bảo đảm kỷ luật, kỷ cương trong họp Ban Chỉ đạo là
                    hết sức quan trọng, cần siết chặt lại”, Thủ tướng cương quyết.</p>
                <iframe class="my-3" width="100%" height="400px" src="https://www.youtube.com/embed/fRb8Ch6cN_w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>Theo Bộ Giao thông vận tải, sau khi bổ sung, hiện nay tổng số các công trình, dự án thuộc Ban Chỉ đạo là 70 dự án, dự án thành phần tại 40 tỉnh, thành phố, gồm 63 dự án đường bộ, 5 dự án đường sắt, 2 dự án cảng hàng không.
                    Tại phiên họp, lãnh đạo các địa phương, bộ, ngành, nhà thầu báo cáo rà soát, tiến độ thực hiện các công trình công trình, dự án quan trọng quốc gia, trọng điểm ngành Giao thông vận tải; tình hình giải ngân.
                    hết sức quan trọng, cần siết chặt lại”, Thủ tướng cương quyết.</p>
                <p class="text-black-50 my-5">Tác giả</p>
            </div> -->
    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/asset/js/js.js"></script>

</html>