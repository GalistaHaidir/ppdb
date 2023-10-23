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

$no_kk = "";
$nama_ayah = "";
$pendidikan_ayah = "";
$penghasilan_ayah = "";
$nama_ibu = "";
$pendidikan_ibu = "";
$penghasilan_ibu = "";
$no_hportu = "";
$alamat_ortu = "";

$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $no_kk = $_POST['no_kk'];
    $nama_ayah = $_POST['nama_ayah'];
    $pendidikan_ayah = $_POST['pendidikan_ayah'];
    $penghasilan_ayah = $_POST['penghasilan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $penghasilan_ibu = $_POST['penghasilan_ibu'];
    $no_hportu = $_POST['no_hportu'];
    $alamat_ortu = $_POST['alamat_ortu'];

    if ($no_kk && $nama_ayah && $pendidikan_ayah && $penghasilan_ayah && $nama_ibu && $pendidikan_ibu && $penghasilan_ibu && $no_hportu && $alamat_ortu) {
        $sql1 = "INSERT INTO orang_tua (no_kk, nama_ayah, pendidikan_ayah, penghasilan_ayah, nama_ibu, pendidikan_ibu, penghasilan_ibu, no_hportu, alamat_ortu)
        VALUES ('$no_kk', '$nama_ayah', '$pendidikan_ayah', '$penghasilan_ayah', '$nama_ibu', '$pendidikan_ibu', '$penghasilan_ibu', '$no_hportu', '$alamat_ortu')";

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
                <li class="">
                    <a href="../Formulir/biodata.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-person-badge"></i>
                        Data Diri
                    </a>
                </li>
                <li class="active">
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
                    <h3 class="fw-bold text-uppercase"><i class="bi bi-people-fill"></i>&nbsp;Data Orang Tua
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
                            <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control w-50" id="no_kk" placeholder="Masukkan Nomor KK"
                                name="no_kk" value="<?php echo $no_kk?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_ayah" class="form-label">Nama Lengkap Ayah</label>
                            <input type="text" class="form-control form-control-md w-50" id="nama_ayah"
                                placeholder="Masukkan Nama Lengkap Ayah" name="nama_ayah" value="<?php echo $nama_ayah?>">
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_ayah" class="form-label">Pendidikan Terakhir Ayah</label>
                            <input type="text" class="form-control form-control-md w-50" id="pendidikan_ayah"
                                placeholder="Masukkan Pendidikan Terakhir Ayah" name="pendidikan_ayah" value="<?php echo $pendidikan_ayah?>"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="penghasilan_ayah" class="form-label">Penghasilan Perbulan Ayah</label>
                            <input type="text" class="form-control form-control-md w-50" id="penghasilan_ayah"
                                placeholder="Masukkan Penghasilan Perbulan Ayah" name="penghasilan_ayah" value="<?php echo $penghasilan_ayah?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_ibu" class="form-label">Nama Lengkap Ibu</label>
                            <input type="text" class="form-control form-control-md w-50" id="nama_ibu"
                                placeholder="Masukkan Nama Lengkap Ibu" name="nama_ibu" value="<?php echo $nama_ibu?>">
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_ibu" class="form-label">Pendidikan Terakhir Ibu</label>
                            <input type="text" class="form-control form-control-md w-50" id="pendidikan_ibu"
                                placeholder="Masukkan Pendidikan Terakhir Ibu" name="pendidikan_ibu" value="<?php echo $pendidikan_ibu?>">
                        </div>
                        <div class="mb-3">
                            <label for="penghasilan_ibu" class="form-label">Penghasilan Perbulan Ibu</label>
                            <input type="text" class="form-control form-control-md w-50" id="penghasilan_ibu"
                                placeholder="Masukkan Penghasiilan Perbulan Ibu" name="penghasilan_ibu" value="<?php echo $penghasilan_ibu?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_hportu" class="form-label">No. HP Orang tua</label>
                            <input type="text" class="form-control form-control-md w-50" id="no_hportu"
                                placeholder="Masukkan No. HP Orang tua" name="no_hportu" value="<?php echo $no_hportu?>"> 
                        </div>
                        <div class="mb-3">
                            <label for="alamat_ortu" class="form-label">Alamat</label>
                            <textarea class="form-control w-50" id="alamat_ortu" rows="5" name="alamat_ortu"
                                placeholder="Masukkan Alamat Orang tua"><?php echo $alamat_ortu?></textarea>
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