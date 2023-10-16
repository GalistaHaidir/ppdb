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

$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nisn = $_POST['nisn'];
    $no_kk = $_POST['no_kk'];
    $npsn = $_POST['npsn'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_hp = $_POST['no_hp'];
    $jumlah_saudara = $_POST['jumlah_saudara'];
    $anak_ke = $_POST['anak_ke'];
    $alamat = $_POST['alamat'];

    if ($nama && $email && $nisn && $no_kk && $npsn && $jenis_kelamin && $tempat_lahir && $tanggal_lahir && $no_hp && $jumlah_saudara && $anak_ke && $alamat) {
        $sql1 = "INSERT INTO calon_siswa (nama, email, nisn, no_kk, npsn, jenis_kelamin, tanggal_lahir, tempat_lahir, no_hp, jumlah_saudara, anak_ke, alamat) 
        VALUES ('$nama', '$email', '$nisn', '$no_kk', '$npsn', '$jenis_kelamin', '$tanggal_lahir', '$tempat_lahir', '$no_hp', '$jumlah_saudara', '$anak_ke', '$alamat')";

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
                <li class="active">
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
                    <h3 class="fw-bold text-uppercase"><i class="bi bi-person-badge"></i>&nbsp;Data Diri Siswa
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-md w-50" id="nama"
                                placeholder="Masukkan Nama Lengkap" name="nama" value="<?php echo $nama ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control form-control-md w-50" id="email"
                                placeholder="Masukkan Email" name="email" value="<?php echo $email ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="number" class="form-control w-50" id="nisn" placeholder="Masukkan NISN" min="1"
                                name="nisn" value="<?php echo $nisn ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="number" class="form-control w-50" id="no_kk" placeholder="Masukkan Nomor KK"
                                name="no_kk" value="<?php echo $no_kk ?>">
                        </div>
                        <div class="mb-3">
                            <label for="npsn" class="form-label">NPSN Asal Sekolah</label>
                            <input type="number" class="form-control w-50" id="npsn" placeholder="Masukkan NPSN"
                                name="npsn" value="<?php echo $npsn ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="col-sm-6 mt-1">
                                <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                    <option selected>- Pilih Jenis Kelamin -</option>
                                    <option value="Laki-Laki" <?php if ($jenis_kelamin == "Laki-Laki")
                                        echo "selected" ?>>
                                            Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($jenis_kelamin == "Perempuan")
                                        echo "selected" ?>>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control form-control-md w-50" id="tempat_lahir"
                                    placeholder="Masukkan Tempat Lahir" name="tempat_lahir"
                                    value="<?php echo $tempat_lahir ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control w-50" id="tanggal_lahir" name="tanggal_lahir"
                                value="<?php echo $tanggal_lahir ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="text" class="form-control form-control-md w-50" id="no_hp"
                                placeholder="Masukkan Nomor HP" name="no_hp" value="<?php echo $no_hp ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_saudara" class="form-label">Jumlah Saudara</label>
                            <input type="number" class="form-control form-control-md w-50" id="jumlah_saudara"
                                placeholder="Jumlah Saudara" name="jumlah_saudara"
                                value="<?php echo $jumlah_saudara ?>">
                        </div>
                        <div class="mb-3">
                            <label for="anak_ke" class="form-label">Anak Ke</label>
                            <input type="number" class="form-control form-control-md w-50" id="anak_ke"
                                placeholder="Anak Ke" name="anak_ke" value="<?php echo $anak_ke ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control w-50" id="alamat" rows="5" name="alamat"
                                placeholder="Masukkan Alamat"><?php echo $alamat ?></textarea>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
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