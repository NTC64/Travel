<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:index.php');
    exit;
}
?>

<head>
    <title>Bài viết review</title>
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
        $sql = "SELECT *,resources,name FROM access,news, uploads WHERE news.newsID = '$id' AND news.uploadID = uploads.uploadID and access.userID = news.userID";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container newsmain my-5">
        <h3><?php echo $row['title']; ?></h3>
        <p class="text-black-50"><?php echo $row['date']; ?></p>
        <p><?php echo nl2br($row['content']) ?></p>
        <div class="video">
            <video width="80%" height="auto" controls src="uploads/video/<?php echo $row['resources'] ?>"></video>
        </div>
        <br>
        <h5 class="text-black-50">Author: <?php echo $row['name'] ?></h5>
    </div>
    <?php
        }
    }
    ?>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/asset/js/js.js"></script>

</html>