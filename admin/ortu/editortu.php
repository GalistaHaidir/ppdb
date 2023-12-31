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

$id_ortu = "";
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

if (isset($_GET['id_ortu'])) {
    $id_ortu = $_GET['id_ortu'];

    // Query SQL untuk mengambil data siswa berdasarkan id_ortu
    $query = "SELECT * FROM orang_tua WHERE id_ortu = $id_ortu";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Mengambil data dari hasil query
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $no_kk = $row['no_kk'];
            $nama_ayah = $row['nama_ayah'];
            $pendidikan_ayah = $row['pendidikan_ayah'];
            $penghasilan_ayah = $row['penghasilan_ayah'];
            $nama_ibu = $row['nama_ibu'];
            $pendidikan_ibu = $row['pendidikan_ibu'];
            $penghasilan_ibu = $row['penghasilan_ibu'];
            $no_hportu = $row['no_hportu'];
            $alamat_ortu = $row['alamat_ortu'];
        }
    }
}

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
        $sql1 = "UPDATE orang_tua SET no_kk = '$no_kk', nama_ayah = '$nama_ayah', pendidikan_ayah = '$pendidikan_ayah', penghasilan_ayah = '$penghasilan_ayah', nama_ibu = '$nama_ibu', pendidikan_ibu = '$pendidikan_ibu', penghasilan_ibu = '$penghasilan_ibu', no_hportu = '$no_hportu', alamat_ortu = '$alamat_ortu' WHERE no_kk = $no_kk";

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
                <li class="active">
                    <a href="dataortu.php" class="text-decoration-none px-3 py-3 d-block">
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
                <li class="">
                    <a href="../pembayaran/datapembayaran.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-clipboard-data"></i>
                        Daftar Ulang
                    </a>
                </li>
                <li class="">
                    <a href="../kelas/datakelas.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-door-open"></i>
                        Data Kelas
                    </a>
                </li>
                <li class="">
                    <a href="../siswabaru/datasiswabaru.php" class="text-decoration-none px-3 py-3 d-block">
                    <i class="bi bi-person-arms-up"></i>
                        Data Siswa Baru
                    </a>
                </li>
            </ul>

            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="../../logout_admin.php" class="text-decoration-none px-3 py-2 d-block">
                    <i class="bi bi-box-arrow-right"></i>
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
                                name="no_kk" value="<?php echo $no_kk ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama_ayah" class="form-label">Nama Lengkap Ayah</label>
                            <input type="text" class="form-control form-control-md w-50" id="nama_ayah"
                                placeholder="Masukkan Nama Lengkap Ayah" name="nama_ayah"
                                value="<?php echo $nama_ayah ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_ayah" class="form-label">Pendidikan Terakhir Ayah</label>
                            <input type="text" class="form-control form-control-md w-50" id="pendidikan_ayah"
                                placeholder="Masukkan Pendidikan Terakhir Ayah" name="pendidikan_ayah"
                                value="<?php echo $pendidikan_ayah ?>">
                        </div>
                        <div class="mb-3">
                            <label for="penghasilan_ayah" class="form-label">Penghasilan Perbulan Ayah</label>
                            <input type="text" class="form-control form-control-md w-50" id="penghasilan_ayah"
                                placeholder="Masukkan Penghasilan Perbulan Ayah" name="penghasilan_ayah"
                                value="<?php echo $penghasilan_ayah ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_ibu" class="form-label">Nama Lengkap Ibu</label>
                            <input type="text" class="form-control form-control-md w-50" id="nama_ibu"
                                placeholder="Masukkan Nama Lengkap Ibu" name="nama_ibu" value="<?php echo $nama_ibu ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_ibu" class="form-label">Pendidikan Terakhir Ibu</label>
                            <input type="text" class="form-control form-control-md w-50" id="pendidikan_ibu"
                                placeholder="Masukkan Pendidikan Terakhir Ibu" name="pendidikan_ibu"
                                value="<?php echo $pendidikan_ibu ?>">
                        </div>
                        <div class="mb-3">
                            <label for="penghasilan_ibu" class="form-label">Penghasilan Perbulan Ibu</label>
                            <input type="text" class="form-control form-control-md w-50" id="penghasilan_ibu"
                                placeholder="Masukkan Penghasiilan Perbulan Ibu" name="penghasilan_ibu"
                                value="<?php echo $penghasilan_ibu ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_hportu" class="form-label">No. HP Orang tua</label>
                            <input type="text" class="form-control form-control-md w-50" id="no_hportu"
                                placeholder="Masukkan No. HP Orang tua" name="no_hportu"
                                value="<?php echo $no_hportu ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_ortu" class="form-label">Alamat</label>
                            <textarea class="form-control w-50" id="alamat_ortu" rows="5" name="alamat_ortu"
                                placeholder="Masukkan Alamat Orang tua"><?php echo $alamat_ortu ?></textarea>
                        </div>
                        <hr>
                        <a href="dataortu.php" class="btn btn-secondary"><i
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

</body>

</html>