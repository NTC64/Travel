<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
    <link rel="stylesheet" href="./asset/css/styleadmin.css" />
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.1.2-web/css/all.min.css" />
    <?php session_start() ?>
    <?php include 'conn.php'; ?>
</head>

<body>
    <!-- partial:index.partial.html -->
    <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
        <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
        <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
            <img class="rounded-pill img-fluid" width="65"
                src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance"
                alt="" />
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
            <input type="text" class="form-control w-100 border-0 bg-transparent text-white"
                placeholder="Search here" />
            <i class="fa fa-search position-absolute d-block fs-6"></i>
        </div>

        <ul class="categories list-unstyled">
            <li class="">
                <i class="uil-estate fa-fw"></i><a href="#"> Dashboard</a>

            </li>

            <li class="has-dropdown">
                <i class="fa-solid fa-bars"></i><a href="#">Category</a>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="#">Category news</a></li>
                    <li><a href="#">Catogory tours</a></li>
                </ul>
            </li>
            <li class="">
                <i class="fa-solid fa-location-dot"></i><a href="#">Tour</a>

            </li>
            <li class="">
                <i class="fa-regular fa-newspaper"></i><a href="#"> News</a>

            </li>
            <li class=""><i class="fa-solid fa-user"></i><a href="#">User</a></li>
            <li class="">
                <i class="uil-setting"></i><a href="#"> Settings</a>

            </li>
        </ul>
        <div class="logout">
            <i class="fa-solid fa-right-from-bracket"></i><a href="index.php">Log Out</a>
        </div>
    </aside>

    <section id="wrapper">
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid mx-2">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="uil-bars text-white"></i>
                    </button>
                    <a class="navbar-brand" href="#">admin<span class="main-color">kit</span></a>
                </div>
                <div class="collapse navbar-collapse" id="toggle-navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Settings
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">My account</a>
                                </li>
                                <li><a class="dropdown-item" href="#">My inbox</a></li>
                                <li><a class="dropdown-item" href="#">Help</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="#">Log out</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="uil-comments-alt"></i><span>23</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="uil-bell"></i><span>98</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-show="show-side-navigation1" class="uil-bars show-side-btn"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <div class="admin__user">
            <div class="container">
                <form action="" method="get">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" id=""></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" id=""></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Login" name="login"></td>
                        </tr>
                        
                    </table>
                </form>
            </div>
        </div> -->
    </section>

    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.jshttps://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="./asset/js/script.js"></script>
</body>

</html>