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
        <p class="mt-1 mb-0 adrole" data-role="<?php echo $_SESSION['role']; ?>"><?php echo $_SESSION['role']; ?></p>
      </div>
    </div>

    <div class="search position-relative text-center px-4 py-3 mt-2">
      <input type="text" class="form-control w-100 border-0 bg-transparent text-white" placeholder="Search here" />
      <i class="fa fa-search position-absolute d-block fs-6"></i>
    </div>

    <ul class="categories list-unstyled">


      <li class="has-dropdown adcategory">
        <i class="fa-solid fa-bars"></i><a href="#">Category</a>
        <ul class="sidebar-dropdown hide list-unstyled">
          <li class="categorynews"><a href="#">Category news</a></li>
          <li class="categorytour"><a href="#">Catogory tours</a></li>
          <li class="crcategory"><a href="#">Create</a></li>
        </ul>
      </li>
      <li class="has-dropdown">
        <i class="fa-solid fa-location-dot"></i><a href="#">Tour</a>
        <ul class="sidebar-dropdown hide list-unstyled">
          <li class="categorynews"><a href="#">Category news</a></li>
          <li class="categorytour"><a href="#">Catogory tours</a></li>
          <li class="crcategory"><a href="#">Create</a></li>
        </ul>
      </li>
      <li class="news">
        <i class="fa-regular fa-newspaper"></i><a href="#"> News</a>

      </li>
      <li class="has-dropdown account"><i class="fa-solid fa-user"></i><a href="#">Account</a>
        <ul class="sidebar-dropdown hide list-unstyled">
          <li class="user"><a href="#">User</a></li>
          <li><a href="#" class="seller">Seller</a></li>
          <li class="admin"><a href="#">Admin</a></li>
          <li class="adcreate"><a href="#">Create</a></li>
        </ul>
      </li>

    </ul>
    <div class="logout">
      <i class="fa-solid fa-right-from-bracket"></i><a href="logout.php">Log Out</a>
    </div>
  </aside>

  <div class="bg hide"></div>
  <!-- edit -->

  <div class="edit editnews hide">
    <form action="" method="POST" class="edit__form">
      <div class="up__title">
        <h3>Update news</h3>
      </div>
      <input type="text" readonly class="id" name="ID" />
      <input type="text" readonly class="iduser" name="iduser" />
      <input type="text" class="idcategory" name="idcategory" required />
      <input type="text" class="newsname" name="newsname" required />
      <textarea name="describe" class="describe" cols="30" rows="10" required placeholder="Describe"></textarea>
      <textarea name="body" class="body" cols="30" rows="10" required placeholder="Body"></textarea>
      <input type="file" class="img" name="img" required />
      <input type="date" class="date" name="date" required />
      <input type="submit" value="Update" name="submit" class="btn btn-success" />
    </form>
  </div>
  <!-- cr category -->
  <div class="create createctg hide">
    <form action="" method="POST" class="create__form">
      <div class="up__title">
        <h3>Create category</h3>
      </div>
      <select class="crctg" id="" name="role">
        <option value="categorynews">Category News</option>
        <option value="categorytour">Category Tour</option>

      </select>
      <input type="text" class="crid" name="idcategory" placeholder="ID category" required />
      <input type="text" class="crname" name="category name" placeholder="Category Name" required />

      <input type="submit" value="Create" name="submit" class="btn btn-success" />
    </form>
  </div>
  <!-- edit category -->

  <div class="edit editctg hide">
    <form action="" method="POST" class="edit__form">
      <div class="up__title">
        <h3>Update Category</h3>
      </div>
      <input type="text" class="idctg" name="" placeholder="ID category" />
      <input type="text" class="ctgname" name="" placeholder="Category Name" required />



      <input type="submit" value="Update" name="submit" class="btn btn-success" />
    </form>
  </div>
  <!-- create -->
  <div class="create createnews hide">
    <form action="" method="POST" class="create__form">
      <div class="up__title">
        <h3>Create News</h3>
      </div>
      <input type="text" class="criduser" name="iduser" required />
      <input type="text" class="cridcategory" name="idcategory" required />
      <input type="text" class="crnewsname" name="newsname" required />
      <textarea name="describe" class="crdescribe" cols="30" rows="10" required placeholder="Describe"></textarea>
      <textarea name="body" class="crbody" cols="30" rows="10" required placeholder="Body"></textarea>
      <input type="file" class="crimg" name="img" required />
      <input type="date" class="crdate" name="date" required />
      <input type="submit" value="Create" name="submit" class="btn btn-success smcreate" />
    </form>
  </div>
  <!-- edit -->

  <div class="edit edituser hide">
    <form action="" method="POST" class="edit__form">
      <div class="up__title">
        <h3>Update Account</h3>
      </div>
      <input type="text" readonly class="id" name="ID" />
      <input type="text" class="username" name="username" required />
      <input type="text" class="name" name="name" required />

      <input type="text" class="password" name="password" placeholder="New password" required />
      <input type="submit" value="Update" name="submit" class="btn btn-success" />
    </form>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Update') {
      $id = $_POST['ID'];
      $username = $_POST['username'];
      $name = $_POST['name'];
      $password = $_POST['password'];
      $sql = "UPDATE access SET username = '$username', name = '$name', password = '$password' WHERE ID = '$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<script>alert("Update success")</script>';
        //header('location: admin.php');
      } else {
        echo '<script>alert("Update fail")</script>';
      }
    }
  }
  ?>

  <!-- create -->

  <div class="create createad hide">
    <form action="" method="POST" class="create__form">
      <div class="up__title">
        <h3>Create Account</h3>
      </div>
      <select class="crrole" id="" name="role">
        <option value="user" label="user">User</option>
        <option value="seller" label="seller">Seller</option>
        <option value="admin" label="admin">Admin</option>
        <option value="superadmin" label="admin">Super Admin</option>
      </select>
      <input type="text" class="crusername" name="username" placeholder="User Name" required />
      <input type="text" class="crname" name="name" placeholder="Full Name" required />
      <input type="text" class="crhotelname hide" name="hotelName" placeholder="Hotel Name" />
      <input type="text" class="crphone hide" name="phone" placeholder="Phone" />
      <input type="text" class="crpassword" name="password" placeholder="New password" required />
      <input type="submit" value="Create" name="submit" class="btn btn-success" />
    </form>
  </div>
  <?php
  $hotelName = "";
  $phone = "";
  if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Create') {
      $role = $_POST['role'];
      $username = $_POST['username'];
      $name = $_POST['name'];
      $hotelName = $_POST['hotelName'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];
      $sql = "select * from access where username = '$username'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo " <script> Swal.fire('Error!', 'Username already exists!', 'error');setTimeout(function(){window.location.href='admin.php'}, 2000);</script>";
      } else {
        $sql = "INSERT INTO access (role, username, name, hotelName, phone, password) VALUES ('$role', '$username', '$name', '$hotelName', '$phone', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          echo "<script> Swal.fire('Success!', 'Sign up successfully!', 'success');
                setTimeout(function(){location.href='admin.php'}, 2000); </script>";
          //header('location: admin.php');
        } else {
          echo "  <script> Swal.fire('Error!', 'Sign up failed!', 'error');
          setTimeout(function(){location.href='admin.php'}, 2000); </script> ";
        }
      }
    }
  }
  ?>
  <!-- edit -->

  <div class="edit editseller hide">
    <form action="" method="POST" class="edit__form">
      <div class="up__title">
        <h3>Update Account</h3>
      </div>
      <input type="text" readonly class="id" name="ID" />
      <input type="text" class="username" name="username" required />
      <input type="text" class="name" name="name" required />
      <input type="text" class="hotel_name" name="hotelName" required />
      <input type="text" class="phone" name="phone" required />
      <input type="text" class="password" name="password" placeholder="New password" required />
      <input type="submit" value="Update" name="submit" class="btn btn-success" />
    </form>
  </div>
  <!-- edit -->

  <div class="edit editad hide">
    <form action="" method="POST" class="edit__form">
      <div class="up__title">
        <h3>Update Account</h3>
      </div>
      <input type="text" readonly class="id" name="ID" />
      <input type="text" class="username" name="username" required />
      <input type="text" class="name" name="name" required />
      <input type="text" class="hotel_name" name="hotelName" required />
      <input type="text" class="phone" name="phone" required />
      <input type="text" class="password" name="password" placeholder="New password" required />
      <input type="submit" value="Update" name="submit" class="btn btn-success" />
    </form>
  </div>
  <div class="admin__main">
    <!-- category -->
    <div class="container admincategorynews hide tb">

      <form action=" " method="get">
        <table border="1">
          <tr>

            <td>ID Category</td>
            <td>News's Category</td>

            <td>Delete</i></td>
            <td>Update</i></td>
          </tr>


          <tr>
            <td></td>
            <td></td>

            <td><a href="#!" data-id="" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
            <td><a href="#!" class="btn__editcategory" data-id="" data-username="" data-name=""><i class="fa-solid fa-pen-to-square"></i></a></td>
          </tr>

        </table>
        <!-- pag -->
        <div class="pag">
          <ul class="pag__items">
            <li><a href="">1</a> </li>
            <li><a href="">2</a> </li>
            <li><a href="">3</a> </li>
            <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
          </ul>
        </div>
      </form>
      <!-- aler2 -->


    </div>
    <!-- category tour -->
    <div class="container admincategorytour hide tb">

      <form action=" " method="get">
        <table border="1">
          <tr>

            <td>ID Category</td>
            <td>Tour's Category</td>

            <td>Delete</i></td>
            <td>Update</i></td>
          </tr>


          <tr>
            <td></td>
            <td></td>

            <td><a href="#!" data-id="" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
            <td><a href="#!" class="btn__editcategory" data-id="" data-username="" data-name=""><i class="fa-solid fa-pen-to-square"></i></a></td>
          </tr>

        </table>
        <!-- pag -->
        <div class="pag">
          <ul class="pag__items">
            <li><a href="">1</a> </li>
            <li><a href="">2</a> </li>
            <li><a href="">3</a> </li>
            <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
          </ul>
        </div>
      </form>
      <!-- aler2 -->


    </div>
    <!-- news -->
    <div class="container adminnews hide tb">
      <div class="btn btn-success btncreatenews btncreate"><i class="fa-solid fa-plus"></i>Create</div>
      <form action=" " method="get">
        <table border="1">
          <tr>
            <td>ID News</td>
            <td>ID User</td>
            <td>ID Category</td>
            <td>Title</td>
            <td>Description</td>
            <td>Body</td>
            <td>Image</td>
            <td>Date</td>

            <td>Delete</i></td>
            <td>Update</i></td>
          </tr>


          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="m-0 p-0"><textarea name="" class="m-0 p-0 fs" id="" cols="100" rows="10">Bodsdsdgsdgssehuifsdoufuoasbfuobasuofbaubfu9asbdufbasuidfbuiasbdfuiabsfuibasuidfbasiufbuidgsdgdsgdsgsdgsdgsdg</textarea> </td>
            <td>Image</td>
            <td>Date</td>

            <td><a href="#!" data-id="" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
            <td><a href="#!" class="btn__editnews" data-id="" data-username="" data-name=""><i class="fa-solid fa-pen-to-square"></i></a></td>
          </tr>

        </table>
        <!-- pag -->
        <div class="pag">
          <ul class="pag__items">
            <li><a href="">1</a> </li>
            <li><a href="">2</a> </li>
            <li><a href="">3</a> </li>
            <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
          </ul>
        </div>
      </form>
      <!-- aler2 -->


    </div>
    <!-- user -->
    <div class="container admin__user hide tb">

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
              <td><a href="#!" data-id="<?php echo $ID; ?>" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
              <td><a href="#!" class="btn__edituser" data-id="<?php echo $user['ID']; ?>" data-username="<?php echo $user['username']; ?>" data-name="<?php echo $user['name']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
          <?php
          }
          ?>
        </table>
        <!-- pag -->
        <div class="pag">
          <ul class="pag__items">
            <li><a href="">1</a> </li>
            <li><a href="">2</a> </li>
            <li><a href="">3</a> </li>
            <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
          </ul>
        </div>
      </form>
      <!-- aler2 -->


    </div>

    <div class="container admin__seller hide tb">


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
          <?php
          //get seller list
          function get_seller_list()
          {
            global $conn;
            $sql = "SELECT * FROM access where role = 'seller'";
            $result = mysqli_query($conn, $sql);
            $seller_list = array();
            while ($row = mysqli_fetch_array($result)) {
              $seller_list[] = $row;
            }
            return $seller_list;
          }
          ?>
          <?php
          $seller_list = get_seller_list();
          foreach ($seller_list as $seller) {
            $ID = $seller['ID'];
            $name = $seller['name'];
            $username = $seller['username'];
            $password = $seller['password'];
            $hotel = $seller['hotelName'];
            $phone = $seller['phone'];
          ?>
            <tr>
              <td><?php echo $seller['ID'] ?></td>
              <td><?php echo $seller['name'] ?></td>
              <td><?php echo $seller['username'] ?></td>
              <td><?php echo $seller['password'] ?></td>
              <td><?php echo $seller['hotelName'] ?></td>
              <td><?php echo $seller['phone'] ?></td>
              <td><a href="#!" data-id="<?php echo $ID; ?>" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
              <td><a href="#!" class="btn__editseller" data-id="<?php echo $seller['ID']; ?>" data-username="<?php echo $seller['username']; ?>" data-name="<?php echo $seller['name']; ?>" data-hotelname="<?php echo $seller['hotelName']; ?>" data-phone="<?php echo $seller['phone']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
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
    <!-- admin -->
    <div class="container admin__ad hide tb">

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
          //get admin list
          function get_admin_list()
          {
            global $conn;
            $sql = "SELECT * FROM access where role = 'admin' or role = 'superadmin'";
            $result = mysqli_query($conn, $sql);
            $admin_list = array();
            while ($row = mysqli_fetch_array($result)) {
              $admin_list[] = $row;
            }
            return $admin_list;
          }
          ?>
          <?php
          $admin_list = get_admin_list();
          foreach ($admin_list as $admin) {
            $ID = $admin['ID'];
            $username = $admin['username'];
            $name = $admin['name'];
            $password = $admin['password'];
            $role = $admin['role'];
          ?>
            <tr>
              <td><?php echo $admin['ID'] ?></td>
              <td><?php echo $admin['username'] ?></td>
              <td><?php echo $admin['name'] ?></td>
              <td><?php echo $admin['password'] ?></td>
              <td><?php echo $admin['role'] ?></td>
              <td><a href="#!" data-id="<?php echo $ID; ?>" class="btn__delete"><i class="fa-solid fa-trash"></i></a></td>
              <td><a href="#!" class="btn__editadmin" data-id="<?php echo $admin['ID']; ?>" data-username="<?php echo $admin['username']; ?>" data-name="<?php echo $admin['name']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
          <?php
          }
          ?>
        </table>
        <!-- pag -->
        <div class="pag">
          <ul class="pag__items">
            <li><a href="">1</a> </li>
            <li><a href="">2</a> </li>
            <li><a href="">3</a> </li>
            <li><a href=""><i class="fa-solid fa-chevron-right"></i></a> </li>
          </ul>
        </div>
      </form>
      <!-- aler2 -->


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