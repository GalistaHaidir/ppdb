<?php
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "sekolah";

$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

$nama = "";
$email = "";
$nisn = "";
$no_kk = "";
$npsn = "";
$jenis_kelamin = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$no_hp = "";
$jumlah_saudara = "";
$anak_ke = "";
$alamat = "";

// Mengambil data dari nisn dengan fungsi get (PERHATIKAN: Anda perlu menangani ini dengan baik untuk menghindari SQL Injection)
$nisn = mysqli_real_escape_string($koneksi, $_GET['nisn']);

// Mengambil data dari tabel sekolah dengan query SQL yang aman
$query = "SELECT * FROM sekolah WHERE nisn = '$nisn'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Kesalahan dalam query: " . mysqli_error($koneksi));
}

// Mengekstrak data siswa
$nisn = mysqli_fetch_assoc($result);

if (!$nisn) {
    die("Data siswa tidak ditemukan.");
}

// Sekarang Anda dapat mengakses data siswa dengan $siswa['nama_kolom']
// Contoh: $nama = $siswa['nama'];
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

    <style>
        #elem {
  height: 100%;
  overflow: hidden;
}
    </style>
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
                <li class="">
                    <a href="../Dashboard/dashboardsiswa.php" class="text-decoration-none px-3 py-3 d-block">
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
                <li class="active">
                    <a href="../Formulir/preview.php>" class="text-decoration-none px-3 py-3 d-block">
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
            </ul>

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
                <div class="col-md my-4 mx-2">
                    <h3 class="fw-bold text-uppercase"><i class="bi bi-file-earmark-check"></i>&nbsp;Halaman Preview
                    </h3>
                </div>
                <hr>
                <div class="col-md my-2 mx-2" id="elem">
                    <!-- Biodata -->
                    <h5><strong>A. Data Diri Siswa</strong></h5>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">NPSN Asal Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor HP Siswa</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jumlah Saudara</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Anak Ke - </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea type="text" readonly class="form-control-plaintext form-control-md w-100">:</textarea>
                        </div>
                    </div>
                    <!-- Data Orang Tua -->
                    <h5><strong>B. Data Orang Tua</strong></h5>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap Ayah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Pendidikan Terakhir Ayah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Penghasilan Perbulan Ayah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap Ibu</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Pendidikan Terakhir Ibu</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Penghasilan Perbulan Ibu</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor HP Orang Tua</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                        <div class="col-sm-10">
                            <textarea type="text" readonly class="form-control-plaintext form-control-md w-100">:</textarea>
                        </div>
                    </div>
                    <!-- Data Asal Sekolah -->
                    <h5><strong>C. Data Asal Sekolah</strong></h5>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">NPSN Sekolah Asal</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Sekolah Asal</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon Sekolah Asal</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Alamat Asal Sekolah</label>
                        <div class="col-sm-10">
                            <textarea type="text" readonly class="form-control-plaintext form-control-md w-100">:</textarea>
                        </div>
                    </div>
                    <!-- Berkas Persyaratan -->
                    <h5><strong>D. Berkas Persyaratan</strong></h5>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor SKL</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jalur</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext form-control-md w-100" value=":">
                        </div>
                    </div>
                    <hr>
                    <button id="download" type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <a href="preview.php?op=edit&nisn=<?php echo $nisn?>"></a>
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

    <!-- PDF -->
    <script>
        let div = document.getElementById("elem");
        let btn = document.getElementById("download");
        btn.addEventListener('click', () => {
            html2pdf()
            .from(div)
            .set({ format: 'Letter', margin: 10 })
            .save()
        })
    </script>

</body>

</html>