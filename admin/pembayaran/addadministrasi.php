<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
//atur koneksi ke database
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "sekolah";

$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);
if (!$koneksi) {
    die("TIdak bisa terkoneksi ke database");
}

$id_daftarulang = "";
$id_pendaftaran = "";
$nisn = "";
$tanggal = "";
$jenis_bayar = "";
$keterangan = "";

$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $id_daftarulang = $_POST['id_daftarulang'];
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $nisn = $_POST['nisn'];
    $tanggal = date('Y-m-d');
    $jenis_bayar = $_POST['jenis_bayar'];
    $keterangan = $_POST['keterangan'];

    $jenis_bayar = implode(",", $jenis_bayar);


    if ($id_daftarulang && $id_pendaftaran && $nisn && $tanggal && $jenis_bayar && $keterangan) {
        $sql1 = "INSERT INTO daftar_ulang (id_daftarulang, id_pendaftaran ,nisn, tanggal, jenis_bayar, keterangan )  
        VALUES ('$id_daftarulang','$id_pendaftaran', '$nisn', '$tanggal', '$jenis_bayar', '$keterangan')";

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
                <li class="">
                    <a href="../berkas/databerkas.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-filetype-pdf"></i>
                        Data Berkas
                    </a>
                </li>
                <li class="active">
                    <a href="../pembayaran/datapembayaran.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-clipboard-data"></i>
                        Daftar Ulang
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
            <div class="container">
                <div class="col-md my-4 mx-2">
                    <h3 class="fw-bold text-uppercase"><i class="bi bi-clipboard-data"></i>&nbsp;Daftar Ulang
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
                                <label for="id_daftarulang" class="form-label">Id Daftar Ulang</label>
                                <input type="number" class="form-control w-50" id="id_daftarulang"
                                    placeholder="Masukkan NPSN" name="id_daftarulang"
                                    value="<?php echo $id_daftarulang ?>">
                            </div>
                            <div class="mb-3">
                                <label for="id_pendaftaran">Id Pendaftaran</label>
                                <div class="col-sm-6 mt-1">
                                    <select class="form-select" name="id_pendaftaran"
                                        aria-label="Default select example">
                                        <option selected>- Pilih Id Pendaftaran -</option>
                                        <option value="1" <?php if ($id_pendaftaran == "1")
                                            echo "selected" ?>>
                                                1</option>
                                            <option value="2" <?php if ($id_pendaftaran == "2")
                                            echo "selected" ?>>2
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="text" class="form-control form-control-md w-50" id="nisn"
                                        placeholder="Masukkan Nama Asal Sekolah" name="nisn" value="<?php echo $nisn ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pendaftaran</label>
                                <input type="text" class="form-control form-control-md w-50" id="tanggal" name="tanggal"
                                    value="<?php echo date('d/m/Y'); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis_bayar[]" id="Buku"
                                        value="Buku">
                                    <label class="form-check-label" for="Buku">Buku</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis_bayar[]" id="Seragam"
                                        value="Seragam">
                                    <label class="form-check-label" for="Seragam">Seragam</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis_bayar[]" id="Alat Tulis"
                                        value="Alat Tulis">
                                    <label class="form-check-label" for="Alat Tulis">Alat Tulis</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan Pembayaran</label>
                                <div class="col-sm-6 mt-1">
                                    <select class="form-select" name="keterangan"
                                        aria-label="Default select example">
                                        <option selected>- Keterangan -</option>
                                        <option value="Belum Lunas" <?php if ($keterangan == "Belum Lunas")
                                            echo "selected" ?>>
                                                Belum Lunas</option>
                                            <option value="Lunas" <?php if ($keterangan == "Lunas")
                                            echo "selected" ?>>Lunas
                                            </option>
                                        </select>
                                    </div>
                                </div>

                            <hr>
                            <a href="datapembayaran.php" class="btn btn-secondary"><i
                                    class="bi bi-arrow-left-circle"></i>&nbsp;Kembali
                            </a> |
                            <a href="">
                                <button type="submit" class="btn btn-primary" name="simpan"><i
                                        class="bi bi-floppy"></i>&nbsp; Simpan</button>
                            </a>
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
    <!-- Jquery Table -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [

                ]
            });
        });
    </script>

</body>

</html>