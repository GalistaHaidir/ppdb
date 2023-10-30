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

$no_skl = "";
$nisn = "";
$jalur = "";
$skl = "";
$kk = "";
$berkas = "";

if (isset($_GET['no_skl'])) {
    $no_skl = $_GET['no_skl'];

    // Query SQL untuk mengambil data siswa berdasarkan no_skl
    $query = "SELECT * FROM berkas WHERE no_skl = $no_skl";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Mengambil data dari hasil query
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $no_skl = $row['no_skl'];
            $nisn = $row['nisn'];
            $jalur = $row['jalur'];
            $skl = $row['skl'];
            $kk = $row['kk'];
            $berkas = $row['berkas'];
        }
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
    <link rel="shortcut icon" href="../css/ui.png" type="image/x-icon">

    <!-- TABLE -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>
        body {
            background: white;
        }

        #side_nav {
            background: #000000;
            min-width: 250px;
            max-width: 250px;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }


        hr.h-color {
            background: #edeeff;
            height: 1.2px;
        }

        .sidebar li.active {
            background: #474747;
            border-radius: 8px;
        }

        .sidebar li a {
            color: #fff;
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
                        style="background-color: #258a31; color:#fff"><strong>PPDB</strong></span>
                    <span class="text-white">Admin</span>
                </h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white">
                    <i class="bi bi-list-nested"></i>
                </button>
            </div>
            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="../pendaftaran/datapendaftar.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-pencil-square"></i>
                        Data Pendaftar
                    </a>
                </li>
                <li class="">
                    <a href="../siswa/datasiswa.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-person-badge"></i>
                        Data Calon Siswa
                    </a>
                </li>
                <li class="">
                    <a href="../ortu/dataortu.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-people-fill"></i>
                        Data Orang Tua
                    </a>
                </li>
                <li class="">
                    <a href="../sekolah/datasekolah.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-building"></i>
                        Data Sekolah
                    </a>
                </li>
                <li class="active">
                    <a href="databerkas.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-filetype-pdf"></i>
                        Data Berkas
                    </a>
                </li>
                <li class="">
                    <a href="datapembayaran.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-clipboard-data"></i>
                        Data Pembayaran
                    </a>
                </li>
            </ul>

            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="../../logout_admin.php" class="text-decoration-none px-3 py-2 d-block">
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
            <div class="container" id="cetak">
                <div class="col-md my-4 mx-2">
                    <h3 class="fw-bold text-uppercase"><i class="bi bi-filetype-pdf"></i>&nbsp;Detail Berkas Persyaratan
                    </h3>
                </div>
                <hr>
                <div class="col-md my-2 mx-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <label class="col-sm-2 col-form-label"><strong>Nomor SKL</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext form-control-md w-100"
                                    value=": <?php echo $no_skl ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"><strong>NISN</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext form-control-md w-100"
                                    value=": <?php echo $nisn ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"><strong>Jalur Penerimaan</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext form-control-md w-100"
                                    value=": <?php echo $jalur ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="skl" class="form-label"><strong>Berkas SKL</strong></label> <br>
                            <img src="../../file/<?= $row['skl']; ?>" width="50%" style="margin-bottom: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="kk" class="form-label"><strong>Berkas KK</strong></label><br>
                            <img src="../../file/<?= $row['kk']; ?>" width="50%" style="margin-bottom: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="berkas" class="form-label"><strong>Berkas Yang Berkaitan dengan Jalur
                                    Pendaftaran</strong></label><br>
                            <img src="../../file/<?= $row['berkas']; ?>" width="50%" style="margin-bottom: 10px;">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md my-2 mx-4">
                <hr>
                <a href="databerkas.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i>&nbsp;Kembali 
                </a> |
                <a href="javascript:void(0);" onclick="printPageArea('cetak')"class="btn btn-info"><i class="bi bi-printer"></i>&nbsp;Cetak
                </a>
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

    <script>
        function printPageArea(areaID) {
            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent; // Perbaikan 1
            window.print();
            document.body.innerHTML = originalContent; // Perbaikan 2
        }
    </script>

</body>

</html>