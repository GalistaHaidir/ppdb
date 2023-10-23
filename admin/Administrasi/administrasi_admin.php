<?php
session_start();
//atur koneksi ke database
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "ppdb";

$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);
if (!$koneksi) {
    die("TIdak bisa terkoneksi ke database");
}
date_default_timezone_set('Asia/Jakarta');


$tanggal_pembayaran = "";
$jenis_pembayaran = "";
$harga = "";
$subtotal = "";
$bayar = "";
$kembalian = "";

$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
    $jenis_pembayaran = $_POST['jenis_pembayaran'];
    $harga = $_POST['harga'];
    $subtotal = $_POST['subtotal'];
    $bayar = $_POST['bayar'];
    $kembalian = $_POST['kembalian'];


    if ($tanggal_pembayaran && $jenis_pembayaran && $harga && $subtotal && $bayar && $kembalian) {
        $sql1 = "INSERT INTO pembayaran (tanggal_pembayaran, jenis_pembayaran, harga, subtotal, bayar, kembalian)
        VALUES ('$tanggal_pembayaran', '$jenis_pembayaran', '$harga', '$subtotal', '$bayar', '$kembalian')";

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

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../css/ui.png" type="image/x-icon">

    <!-- PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="main-container d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4">
                    <span class="bg-white text-dark rounded shadow px-2 me-2">PPDB</span>
                    <span class="text-white">Admin</span>
                </h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white">
                    <i class="bi bi-list-nested"></i>
                </button>
            </div>
            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="../Dashboard/dashboard_admin.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="">
                    <a href="../DataPendaftar/datapendaftar.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-pencil-square"></i>
                        Data Pendaftar
                    </a>
                </li>
                <li class="active">
                    <a href="../Administrasi/administrasi_admin.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-calculator"></i>
                        Pembayaran
                    </a>
                </li>
                <li class="">
                    <a href="../Administrasi/datapembayaran.php" class="text-decoration-none px-3 py-3 d-block">
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
                                <a class="nav-link disabled" aria-current="page" href="#">Data Pendaftar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- TABLE -->
            <div class="container">
                <div class="row">
                    <h1 class="display-4"><b>Pembayaran</b></h1>

                    <!-- Kalkulator -->
                    <div class="row">
                        <div class="col">
                            <form method="POST">
                                <div class="p-3 border" style="border-radius: 10px;">
                                    <div style="margin-bottom: 10px;"><b>Kalkulator</b></div>
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
                                    <div class="row mb-3">
                                        <label for="tanggal_pembayaran" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tanggal_pembayaran"
                                                name="tanggal_pembayaran" value="<?php echo date('d/m/Y'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="jenis_pembayaran" class="col-sm-2 col-form-label">Kode</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="jenis_pembayaran"
                                                aria-label="Default select example">
                                                <option selected>- Pilih Jenis Pembayaran -</option>
                                                <option value="Daftar Ulang" <?php if ($jenis_pembayaran == "Daftar Ulang")
                                                    echo "selected" ?>>
                                                        Daftar Ulang</option>
                                                    <option value="Buku" <?php if ($jenis_pembayaran == "Buku")
                                                    echo "selected" ?>>Buku
                                                    </option>
                                                    <option value="Seragam" <?php if ($jenis_pembayaran == "Seragam")
                                                    echo "selected" ?>>Seragam
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control w-50" id="harga" name="harga"
                                                    value="<?php echo $harga ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control w-50" id="subtotal" name="subtotal"
                                                value="<?php echo $subtotal ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <a href="">
                                            <button type="button" class="btn btn-outline-warning mt-2 float-end">
                                                <i class="bi bi-plus-square-fill"></i> Tambah</button>
                                        </a>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="bayar" name="bayar"
                                                value="<?php echo $bayar ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="kembalian" class="col-sm-2 col-form-label">Kembalian</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="inputPassword"
                                                name="kembalian" value="<?php echo $kembalian ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <a href="">
                                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Nota -->
                        <div class="col" id="elem">
                            <div class="p-3 border" id="cetak" style="border-radius: 10px;">
                                <div style="text-align: center;"><b>Daftar Ulang</b></div>
                                <div style="text-align: center;">Jl. Ketintang, Ketintang, Kec. Gayungan, Surabaya,
                                    Jawa
                                    Timur 60231</div>
                                <br>
                                <div class="tlpn" style="float: left;">No Tlpn : +6231-99421835 </div>
                                <div class="tgl" style="float: right;">TGL :
                                    <?php echo date('d/m/Y'); ?>
                                </div>
                                <br>
                                <div class="kasir" style="float: left;">Kasir : Admin</div>
                                <div class="jam" style="float: right;">Jam :
                                    <?php echo date('H:i'); ?>
                                </div>
                                <br>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>
                                </table>
                                <br>
                                <hr>
                                <div class="tlpn" style="float: left;">Total : </div>
                                <br>
                                <div class="kasir" style="float: left;">Bayar : </div>
                                <br>
                                <div class="kasir" style="float: left;">Kembalian : </div>
                                <br><br>
                                <div style="text-align: center;">* Terima Kasih Telah Melakukan Daftar Ulang *</div>
                            </div>
                            <a href="javascript:void(0);" onclick="printPageArea('cetak')">
                                <button type="button" class="btn btn-outline-primary mt-2 float-end"><i
                                        class="bi bi-printer-fill"></i> Print</button>
                            </a>
                            <button id="download" type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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

    <script>
        function printPageArea(areaID) {
            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent; // Perbaikan 1
            window.print();
            document.body.innerHTML = originalContent; // Perbaikan 2
        }
    </script>

    <script>
        let div = document.getElementById("elem");
        let btn = document.getElementById("download");
        btn.addEventListener('click', () => {
            html2pdf().from(div).save()
        })
    </script>

</body>

</html>