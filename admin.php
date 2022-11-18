<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
  // redirect them to your desired location
  header('location:index.php');
  exit;
}
?>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
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
  <?php
  include 'conn.php';
  ?>
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
      <i class="fa-solid fa-right-from-bracket"></i><a href="logout.php">Log Out</a>
    </div>
  </aside>


  <div class="admin__main">

    <div class="container admin__user hide tb">
      <div class="btn btn-success create"><i class="fa-solid fa-plus"></i>Create</div>
      <form action=" " method="get">
        <table border="1">
          <tr>
            <td>ID User</td>
            <td>User Name</td>
            <td>Full Name</td>
            <td>Password</td>
            <td>Role</td>
            <td>Delete</i></td>
            <td>Update</i></td>
          </tr>
          <?php
          //list all user
          function get_user_list()
          {
            global $conn;
            $sql = "SELECT * FROM access where role = 'user'";
            $result = mysqli_query($conn, $sql);
            $user_list = array();
            while ($row = mysqli_fetch_array($result)) {
              $user_list[] = $row;
            }
            return $user_list;
          }
          ?>
          <?php
          $user_list = get_user_list();
          foreach ($user_list as $user) {
            $ID = $user['ID'];
            $username = $user['username'];
            $name = $user['name'];
            $password = $user['password'];
            $role = 'user';
          ?>
            <tr>
              <td><?php echo $user['ID'] ?></td>
              <td><?php echo $user['username'] ?></td>
              <td><?php echo $user['name'] ?></td>
              <td><?php echo $user['password'] ?></td>
              <td><?php echo $user['role'] ?></td>
              <td><a href="delete.php?ID=<?php echo $ID; ?>" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
              <td><a href="#!" class="btn__edit"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
          <?php
          }
          ?>
        </table>
        <!-- pag -->
        <div class="page">
          <ul class="pag__items">
            <li><a href="">1</a> </li>
            <li><a href="">2</a> </li>
            <li><a href="">3</a> </li>
            <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
          </ul>
        </div>
      </form>
      <!-- aler2 -->

      <!-- edit -->
      <div class="bg hide"></div>
      <div class="edit hide">
        <form action="" method="get" class="edit__form">
          <div class="up__title">
            <h3>Update Account</h3>
          </div>
          <input type="text" readonly class="id" value="<?php echo $ID ?>" />
          <input type="text" class="username" placeholder="Username" value="<?php echo $username; ?>" />
          <input type="text" class="name" value="<?php echo $name ?>" />
          <input type="text" class="password" />
          <input type="submit" value="Update" class="btn btn-success" />
        </form>
      </div>
      <!-- Seller list -->
    </div>
    <div class="container admin__seller hide tb">
      <div class="btn btn-success create"><i class="fa-solid fa-plus"></i>Create</div>
      <form action=" " method="get">
        <table border="1">
          <tr>
            <td>ID User</td>
            <td>Full Name</td>
            <td>User Name</td>
            <td>Password</td>
            <td>Hotel Name</td>
            <td>Phone</td>
            <td>Delete</td>
            <td>Edit</td>
          </tr>
          <tr>
            <td><?php echo $seller['ID'] ?></td>
            <td><?php echo $seller['name'] ?></td>
            <td><?php echo $seller['username'] ?></td>
            <td><?php echo $seller['password'] ?></td>
            <td><?php echo $seller['hotelName'] ?></td>
            <td><?php echo $seller['phone'] ?></td>
            <td><a href="delete.php?ID=<?php echo $ID; ?>" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
            <td><a href="#!" class=""><i class="fa-solid fa-pen-to-square"></i></a></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <div class="pag">
          <ul class="pag__items">

            <li><a href="">1</a> </li>
            <li><a href="">2</a> </li>
            <li><a href="">3</a> </li>
            <li><a href=""> <i class="fa-solid fa-chevron-right"></i></a> </li>
          </ul>
        </div>
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