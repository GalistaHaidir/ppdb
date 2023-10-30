<?php
session_start();
//atur koneksi ke database
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "sekolah";

$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);
if (!$koneksi) {
    die("TIdak bisa terkoneksi ke database");
}

$npsn = "";
$nisn = "";
$nama_sekolah = "";
$alamat_sekolah = "";
$telepon_sekolah = "";

$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $npsn = $_POST['npsn'];
    $nisn = $_POST['nisn'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $alamat_sekolah = $_POST['alamat_sekolah'];
    $telepon_sekolah = $_POST['telepon_sekolah'];

    if ($npsn && $nisn && $nama_sekolah && $alamat_sekolah && $telepon_sekolah) {
        $sql1 = "INSERT INTO asal_sekolah (npsn, nisn, nama_sekolah, alamat_sekolah, telepon_sekolah) 
        VALUES ('$npsn','$nisn','$nama_sekolah', '$alamat_sekolah', '$telepon_sekolah')";

        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
        } else {
            $error = "Gagal memasukkan data";
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../css/ui.png" type="image/x-icon">

    <style>
        body {
            background: ##fff;
        }

        .sidebar{
            border-right: 1px solid #000;
        }
        #side_nav {
            background: #f7f7f7;
            min-width: 250px;
            max-width: 250px;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }

        hr.h-color {
            background: #333;
            height: 1.2px;
        }

        .sidebar li.active {
            background: #23663b;
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar li.active a:hover {
            color: #ffffff;
        }

        .sidebar li a {
            color: #333;
        }

        @media(max-width: 767px) {
            #side_nav {
                margin-left: -250px;
                position: fixed;
                min-height: 100vh;
                z-index: 1;
            }

            #side_nav.active {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="main-container d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4">
                <span class="rounded shadow px-2"
                        style="background-color: #247854; color:#fff">PPDB</span>
                    <span class="text-dark">Siswa</span>
                </h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
                    <i class="bi bi-list-nested"></i>
                </button>
            </div>
            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="biodata.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-person-badge"></i>
                        Data Diri
                    </a>
                </li>
                <li class="">
                    <a href="orangtua.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-people-fill"></i>
                        Data Orang Tua
                    </a>
                </li>
                <li class="active">
                    <a href="sekolah.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-building"></i>
                        Data Asal Sekolah
                    </a>
                </li>
                <li class="">
                    <a href="berkas.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-filetype-pdf"></i>
                        Berkas
                    </a>
                </li>
                <li class="">
                    <a href="pendaftaran.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-pencil-square"></i>
                    Pendaftaran
                    </a>
                </li>
                <li class="">
                    <a href="pengumuman.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-megaphone"></i>
                    Pengumuman
                    </a>
                </li>
            </ul>

            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="../logout_siswa.php" class="text-decoration-none px-3 py-2 d-block">
                        <i class="bi bi-door-closed"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <nav class="navbar navbar-expand-md">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2">
                            <i class="bi bi-list-nested"></i>
                        </button>
                        <a class="navbar-brand fs-4" href="#">
                            <span class="bg-dark rounded px-2 py-0 text-white">
                                PPDB
                            </span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- TABLE -->
            <div class="container">
                <div class="col-md my-4 mx-2">
                    <h3 class="fw-bold text-uppercase"><i class="bi bi-building"></i>&nbsp;Data Asal Sekolah
                    </h3>
                </div>
                <hr>
                <div class="col-md my-2 mx-2">
                    <?php
                    if ($error) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($sukses) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $sukses ?>
                        </div>
                        <?php
                    }
                    ?>
                <div class="col-md my-2 mx-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="npsn" class="form-label">NPSN Asal Sekolah</label>
                            <input type="number" class="form-control w-50" id="npsn" placeholder="Masukkan NPSN" name="npsn" value="<?php echo $npsn ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="number" class="form-control w-50" id="nisn" placeholder="Masukkan NISN untuk kembali keperluan database" name="nisn" value="<?php echo $nisn ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_sekolah" class="form-label">Nama Asal Sekolah</label>
                            <input type="text" class="form-control form-control-md w-50" id="nama_sekolah"
                                placeholder="Masukkan Nama Asal Sekolah" name="nama_sekolah" value="<?php echo $nama_sekolah?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_asalsekolah" class="form-label">Alamat Asal Sekolah</label>
                            <textarea class="form-control w-50" id="alamat_asalsekolah" rows="5" name="alamat_sekolah"
                                placeholder="Masukkan Alamat Asal Sekolah" ><?php echo $alamat_sekolah?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="telepon_sekolah" class="form-label">Telepon Asal Sekolah</label>
                            <input type="text" class="form-control form-control-md w-50" id="telepon_sekolah"
                                placeholder="Masukkan No. Telepon Asal Sekolah" name="telepon_sekolah" value="<?php echo $telepon_sekolah?>">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>

    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- INTERNAL JS -->
    <script>
        $(".sidebar ul li").on('click', function () {
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        });

        $('.open-btn').on('click', function () {
            $('.sidebar').addClass('active');
        });

        $('.close-btn').on('click', function () {
            $('.sidebar').removeClass('active');
        });
    </script>

</body>

</html>