<?php 
include 'conn.php';
    $hotel_name = "";
    $phone = "";
    if (isset($_POST["submit"])) {
      if ($_POST["submit"] == "Create") {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $hotel_name = $_POST['hotelName'];
        $phone = $_POST['phone'];
        $sql = "select * from access where username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          echo "  <script> Swal.fire('Error!', 'Username already exists!', 'error'); </script> ";
        } else {
          if ($hotel_name != "") {
            $sql = "INSERT INTO access (name, username, password, role, hotelName, phone) VALUES ('$name', '$username', '$password', 'seller', '$hotel_name', '$phone')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              echo "<script> Swal.fire('Success!', 'Sign up successfully!', 'success'); </script> ";
              header("location: admin.php");
            } else {
              echo "  <script> Swal.fire('Error!', 'Sign up failed!', 'error'); </script> ";
              header("location: admin.php");
            }
          } else {
            $sql = "INSERT INTO access (name, username, password, role) VALUES ('$name', '$username', '$password', 'user')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              echo "  <script> Swal.fire('Success!', 'Sign up successfully!', 'success'); </script> ";
              header("location: admin.php");
            } else {
              echo "  <script> Swal.fire('Error!', 'Sign up failed!', 'error'); </script> ";
              header("location: admin.php");
            }
          }
        }
      }
    }
    ?>