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

$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $no_skl = $_POST['no_skl'];
    $nisn = $_POST['nisn'];
    $jalur = $_POST['jalur'];
    $skl = upload('skl'); // Memanggil fungsi upload untuk berkas skl
    $kk = upload('kk'); // Memanggil fungsi upload untuk berkas kk
    $berkas = upload('berkas'); // Memanggil fungsi upload untuk berkas berkas

    if ($no_skl && $nisn && $jalur && $skl && $kk && $berkas) {
        $sql1 = "INSERT INTO berkas (no_skl, nisn, jalur, skl, kk, berkas) 
        VALUES ('$no_skl','$nisn','$jalur', '$skl', '$kk', '$berkas')";

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
// Membuat fungsi upload gambar
function upload($jenisBerkas)
{
    // Variabel-variabel yang diperlukan
    $namaFile = $_FILES[$jenisBerkas]['name'];
    $ukuranFile = $_FILES[$jenisBerkas]['size'];
    $error = $_FILES[$jenisBerkas]['error'];
    $tmpName = $_FILES[$jenisBerkas]['tmp_name'];

    // Inisialisasi pesan kesalahan
    $pesanKesalahan = "";

    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan di bawah, akan mengembalikan pesan kesalahan
    if ($error === 4) {
        $pesanKesalahan = "Pilih gambar terlebih dahulu untuk $jenisBerkas!";
    } else {
        // Format atau ekstensi yang diperbolehkan untuk mengunggah gambar adalah
        $extValid = ['jpg', 'jpeg', 'png'];
        $ext = pathinfo($namaFile, PATHINFO_EXTENSION);

        // Jika format atau ekstensi bukan gambar, akan mengembalikan pesan kesalahan
        if (!in_array($ext, $extValid)) {
            $pesanKesalahan = "File yang anda upload untuk $jenisBerkas bukan gambar!";
        }

        // Jika ukuran gambar lebih dari 3.000.000 byte, akan mengembalikan pesan kesalahan
        if ($ukuranFile > 3000000) {
            $pesanKesalahan = "Ukuran gambar $jenisBerkas terlalu besar!";
        }
    }

    // Jika ada pesan kesalahan, tampilkan pesan dan mengembalikan false
    if ($pesanKesalahan) {
        echo "<script>alert('$pesanKesalahan');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // Memindahkan file ke dalam folder 'file' dengan nama asli
    $folderTujuan = '../../file/';
    move_uploaded_file($tmpName, $folderTujuan . $namaFileBaru);

    // Mengembalikan nama file asli
    return $namaFileBaru;
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
                <li class="active">
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
                    <h3 class="fw-bold text-uppercase"><i class="bi bi-filetype-pdf"></i>&nbsp;Berkas Persyaratan</h3>
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
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="no_skl" class="form-label">Nomor SKL</label>
                            <input type="number" class="form-control w-50" id="no_skl" placeholder="Masukkan Nomor KK"
                                name="no_skl" value="<?php echo $no_skl ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="number" class="form-control w-50" id="nisn"
                                placeholder="Masukkan NISN untuk kebutuhan Database" name="nisn"
                                value="<?php echo $nisn ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jalur">Jalur</label>
                            <div class="col-sm-6 mt-1">
                                <select class="form-select" name="jalur" aria-label="Default select example">
                                    <option selected>- Pilih Jenis Jalur -</option>
                                    <option value="Afimasi" <?php if ($jalur == "Afimasi")
                                        echo "selected" ?>>
                                            Afirmasi</option>
                                        <option value="Zonasi" <?php if ($jalur == "Zonasi")
                                        echo "selected" ?>>Zonasi
                                        </option>
                                        <option value="Perpindahan" <?php if ($jalur == "Perpindahan")
                                        echo "selected" ?>>Perpindahan
                                        </option>
                                        <option value="Prestasi" <?php if ($jalur == "Prestasi")
                                        echo "selected" ?>>Prestasi
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="skl" class="form-label">SKL</label>
                                <input class="form-control form-control-sm w-50" id="skl" name="skl" type="file">
                            </div>
                            <div class="mb-3">
                                <label for="kk" class="form-label">KK</label>
                                <input class="form-control form-control-sm w-50" id="kk" name="kk" type="file">
                            </div>
                            <div class="mb-3">
                                <label for="berkas" class="form-label">Berkas Yang Berkaitan dengan Jalur
                                    Pendaftaran</label>
                                <input class="form-control form-control-sm w-50" id="berkas" name="berkas" type="file">
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