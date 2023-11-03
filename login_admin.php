<?php
session_start();
//atur koneksi ke database
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "sekolah";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);
//atur variabel
$err = "";
$username_petugas = "";

//error_reporting(0);//
if (isset($_POST['login'])) {
    $username_petugas = $_POST['username_petugas'];
    $password = $_POST['password'];
    if ($username_petugas == '' or $password == '') {
    } else {
        $sql1 = "select * from petugas where username_petugas = '$username_petugas'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if ($r1['username_petugas'] == '') {
            $err .= "<li>Username <b>$username_petugas</b> tidak tersedia</li>";
        } elseif ($r1['password'] != md5($password)) {
            $err .= "<li>Password yang dimasukkan tidak sesuai</li>";
        }
        if (empty($err)) {
            $_SESSION['session_username_petugas'] = $username_petugas;
            $_SESSION['session_password'] = md5($password);
            header("location:admin/pendaftaran/datapendaftar.php");
        }
    }
}
?>

<!--HTML-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Gabarito&family=Ubuntu:wght@400;500;700&display=swap');

        body {
            font-family: 'Gabarito', sans-serif;
            background: #ececec;
        }

        .box-area {
            width: 930px;
        }

        .right-box {
            padding: 40px 30px 40px 40px;
        }

        ::placeholder {
            font-size: 16px;
        }

        @media only screen and(max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }

            .left-box {
                height: 100px;
                overflow: hidden;
            }

            .right-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Main Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!-- Login Container -->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!-- Left Box -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #968c00;">
                <div class="featured-image mb-3">
                    <img src="css/note.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Silahkan Login</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem; font-family: 'Courier New', Courier, monospace;">Untuk bisa mengakses web PPDB</small>
            </div>

            <!-- Right Box -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-1">
                        <h2>Hello Admin</h2>
                        <p>Selamat Datang, Selamat Bertugas</p>
                    </div>
                    <?php if ($err) { ?>
                        <div id="login-alert" class="alert alert-danger col-sm-12">
                            <ul>
                                <?php echo $err ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="username_petugas"
                            placeholder="Username">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password"
                            placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" name="login" class="btn btn-lg btn-warning w-100 fs-6" value="Login">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

</body>

</html>