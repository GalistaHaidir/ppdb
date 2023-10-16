<?php
session_start();
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

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../css/ui.png" type="image/x-icon">
</head>

<body>
    <div class="main-container d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4">
                    <span class="bg-white text-dark rounded shadow px-2 me-2">PPDB</span>
                    <span class="text-white">Siswa</span>
                </h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white">
                    <i class="bi bi-list-nested"></i>
                </button>
            </div>
            <ul class="list-unstyled px-2">
                <li class="active">
                    <a href="dashboardsiswa.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="">
                    <a href="../Formulir/biodata.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-person-badge"></i>
                        Data Diri
                    </a>
                </li>
                <li class="">
                    <a href="../Formulir/orangtua.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-people-fill"></i>
                        Data Orang Tua
                    </a>
                </li>
                <li class="">
                    <a href="../Formulir/sekolah.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-building"></i>
                        Data Asal Sekolah
                    </a>
                </li>
                <li class="">
                    <a href="../Formulir/berkas.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-filetype-pdf"></i>
                        Berkas
                    </a>
                </li>
                <li class="">
                    <a href="../Formulir/preview.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-file-earmark-check"></i>
                    Preview
                    </a>
                </li>
                <li class="">
                    <a href="../Formulir/pendaftaran.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-pencil-square"></i>
                    Pendaftaran
                    </a>
                </li>

            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="../../logout_siswa.php" class="text-decoration-none px-3 py-2 d-block">
                        <i class="bi bi-door-closed"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
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
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list-nested"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-current="page" href="#">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- TABLE -->
            <div class="container">
                <div class="row">
                    <h1 class="display-4 pb-3]"><b>Dashboard</b></h1>

                    <div class="col-sm-3">
                        <div class="card mb-3 border-primary">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <h1 class="text-center"><i class="bi bi-pin-map"></i></h1>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Zonasi</h5>
                                        <p class="card-text">45</p>
                                        <hr>
                                        <p class="card-text"><small class="text-muted">Kuota 50</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card mb-3 border-danger">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <h1 class="text-center"><i class="bi bi-arrow-left-right"></i></h1>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Perpindahan</h5>
                                        <p class="card-text">45</p>
                                        <hr>
                                        <p class="card-text"><small class="text-muted">Kuota 50</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card mb-3 border-info">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <h1 class="text-center"><i class="bi bi-mortarboard-fill"></i></h1>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Prestasi</h5>
                                        <p class="card-text">45</p>
                                        <hr>
                                        <p class="card-text"><small class="text-muted">Kuota 50</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card mb-3 border-warning">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <h1 class="text-center"><i class="bi bi-person-vcard-fill"></i></h1>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Afirmasi</h5>
                                        <p class="card-text">45</p>
                                        <hr>
                                        <p class="card-text"><small class="text-muted">Kuota 50</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card card mb-3" style="background: #0073b7;">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <h1 class="text-center text-light"><i class="bi bi-journal"></i></h1>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-light">55</h5>
                                        <p class="card-text text-light">Total Pendaftar</p>
                                        <hr style="border: 1px solid white">
                                        <a href="../DataPendaftar/datapendaftar.php">
                                            <button type="button" class="btn text-light">Info Lengkap
                                                <i class="bi bi-arrow-right-circle-fill"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card mb-3" style="background: #ff851b;">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <h1 class="text-center text-light"><i class="bi bi-person"></i></h1>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-light">90</h5>
                                        <p class="card-text text-light">Sudah Daftar Ulang</p>
                                        <hr style="border: 1px solid white">
                                        <a href="../Administrasi/datapembayaran.php">
                                            <button type="button" class="btn text-light">Info Lengkap
                                                <i class="bi bi-arrow-right-circle-fill"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card mb-3" style="background: #39cccc;">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <h1 class="text-center text-light"><i class="bi bi-check-all"></i></h1>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-light">80</h5>
                                        <p class="card-text text-light">Sudah diterima</p>
                                        <hr style="border: 1px solid white">
                                        <a href="../DataPendaftar/datapendaftar.php">
                                            <button type="button" class="btn text-light">Info Lengkap
                                                <i class="bi bi-arrow-right-circle-fill"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
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