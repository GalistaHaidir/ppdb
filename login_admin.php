<?php
require 'inc_koneksi.php';
if (isset($_POST["submit"])) {
    $username_petugas = $_POST["username_petugas"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username_petugas = '$username_petugas'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id_user"] = $row["id_user"];
            header("location: ../../admin/dashboard/dashboard_admin.html");
        } else {
            echo "<script>alert ('Wrong Password')</script>";
        }
    } else {
        echo "<script>('User Not Registeret')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - GoSNippets</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <link rel="stylesheet" href="css/stylelogadmin.css">
    <script type='text/javascript' src=''></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript'
        src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <section class="body">
        <div class="container">
            <div class="login-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <span class="logo-font">Hi</span>Guys
                        </div>
                    </div>
                </div>
                <!--awal-->
                <div class="row">
                    <div class="col-sm-6">
                        <br>`
                        <h3 class="header-title">Login</h3>
                        <form class="login-form" id="form" method="post" autocomplete="off">
                            <div class="form-group">
                                <input type="text" name="username_petugas" class="form-control" placeholder="username_petugas"
                                    id="username_petugas" required value="">
                            </div>
                            <div class="form-group">
                                <input type="Password" name="password" class="form-control" placeholder="Password"
                                    id="password" required value="">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                    <!--akhir-->
                    <div class="col-sm-6 hide-on-mobile">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                            </ul>
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="slider-feature-card">
                                        <img src="https://i.imgur.com/YMn8Xo1.png" alt="">
                                        <h3 class="slider-title">Title Here</h3>
                                        <p class="slider-description">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Iure, odio!</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="slider-feature-card">
                                        <img src="https://i.imgur.com/Yi5KXKM.png" alt="">
                                        <h3 class="slider-title">Title Here</h3>
                                        <p class="slider-description">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Ratione, debitis?</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>