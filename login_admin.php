<?php
include("inc_koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<li>Silahkan masukkan username dan password</li>";
    }
    if (empty($err)) {
        $sql1 = "select * from petugas where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] != md5($password)) {
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    }
    if (empty($err)) {
        $_SESSION['petugas_username'] = $username;
        header("location:admin_page.php");
        exit();
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <link rel="stylesheet" href="css/stylelogadmin.css">
    <script type='text/javascript' src=''></script>
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
                            <span class="logo-font">Hi</span>Admin
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <br>
                        <h3 class="header-title">LOGIN</h3>
                        <form class="login-form" action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="UserName"
                                    value="<?php echo $username ?>" name="username">
                            </div>
                            <div class="form-group">
                                <input type="Password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" value="login"
                                    class="btn btn-primary btn-block">LOGIN</button>
                            </div>
                            <?php
                            if ($err) {
                                echo "<ul>$err</ul>";
                            }
                            ?>
                        </form>
                    </div>
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
    <script type='text/javascript'></script>
</body>