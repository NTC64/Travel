<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
  // redirect them to your desired location
  header('location:index.php');
  exit;
}
?>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
  <link rel="stylesheet" href="./asset/css/styleadmin.css" />
  <link rel="stylesheet" href="./asset/font/fontawesome-free-6.1.2-web/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <?php session_start() ?>
  <?php include 'conn.php'; ?>
</head>

<body>
  <!-- partial:index.partial.html -->
  <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
    <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
      <img class="rounded-pill img-fluid" width="65" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="" />
      <div class="ms-2">
        <h5 class="fs-6 mb-0">
          <a class="text-decoration-none" href="#">
            <?php echo $_SESSION['username']; ?>
          </a>
        </h5>
        <p class="mt-1 mb-0"><?php echo $_SESSION['role']; ?></p>
      </div>
    </div>

    <div class="search position-relative text-center px-4 py-3 mt-2">
      <input type="text" class="form-control w-100 border-0 bg-transparent text-white" placeholder="Search here" />
      <i class="fa fa-search position-absolute d-block fs-6"></i>
    </div>

    <ul class="categories list-unstyled">


      <li class="has-dropdown">
        <i class="fa-solid fa-bars"></i><a href="#">Category</a>
        <ul class="sidebar-dropdown hide list-unstyled">
          <li><a href="#">Category news</a></li>
          <li><a href="#">Catogory tours</a></li>
        </ul>
      </li>
      <li class="i">
        <i class="fa-solid fa-location-dot"></i><a href="#">Tour</a>

      </li>
      <li class="i">
        <i class="fa-regular fa-newspaper"></i><a href="#"> News</a>

      </li>
      <li class="has-dropdown"><i class="fa-solid fa-user"></i><a href="#">Account</a>
        <ul class="sidebar-dropdown hide list-unstyled">
          <li class="user"><a href="#">User</a></li>

          <li><a href="#" class="seller">Seller</a></li>
        </ul>
      </li>

    </ul>
    <div class="logout">
      <i class="fa-solid fa-right-from-bracket"></i><a href="index.php">Log Out</a>
    </div>
  </aside>


  <div class="admin__main">

    <div class="container admin__user hide tb">
      <form action=" " method="get">
        <table border="1">
          <tr>
            <td>ID User</td>
            <td>User Name</td>
            <td>Full Name</td>
            <td>Password</td>
            <td>Action</td>
          </tr>
          <?php
          $sql = "SELECT * FROM access";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['ID'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['password'] . "</td>";
              echo "<td><a href='edit.php?id_user=" . $row['ID'] . "'>Edit</a> | <a href='delete.php?id_user=" . $row['ID'] . "'>Delete</a></td>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }
          ?>
        </table>
      </form>

    </div>
    <div class="container admin__seller hide tb">
      <form action=" " method="get">
        <table border="1">
          <tr>
            <td>ID User</td>
            <td>User Name</td>
            <td>Full Name</td>
            <td>Password</td>
            <td>Phone</td>
            <td>Hotel Name</td>
            <td>Action</td>
          </tr>
          <?php
          $sql = "SELECT * FROM access";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['ID'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['password'] . "</td>";
              echo "<td>" . $row['phone'] . "</td>";
              echo "<td>" . $row['hotelName'] . "</td>";
              echo "<td><a href='edit.php?id_user=" . $row['ID'] . "'>Edit</a> | <a href='delete.php?id_user=" . $row['ID'] . "'>Delete</a></td>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }
          ?>
        </table>
      </form>
    </div>

  </div>

  <!-- partial -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="./asset/js/script.js"></script>
</body>

</html>