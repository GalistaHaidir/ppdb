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
</head>

<body>
    <div class="main-container d-flex">
        <!-- CONTENT -->
        <div class="content">
            <!-- TABLE -->
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
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
                                <option value="afirmasi" <?php if ($jalur == "afirmasi")
                                    echo "selected" ?>>
                                        Afirmasi</option>
                                    <option value="zonasi" <?php if ($jalur == "zonasi")
                                    echo "selected" ?>>Zonasi
                                    </option>
                                    <option value="perpindahan" <?php if ($jalur == "perpindahan")
                                    echo "selected" ?>>Perpindahan
                                    </option>
                                    <option value="prestasi" <?php if ($jalur == "prestasi")
                                    echo "selected" ?>>Prestasi
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="skl" class="form-label">SKL</label>
                            <img src="../file/<?= $berkas['skl']; ?>" width="50%" style="margin-bottom: 10px;">
                        <input class="form-control form-control-sm w-50" id="skl" name="skl" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="kk" class="form-label">KK</label>
                        <input class="form-control form-control-sm w-50" id="kk" name="kk" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="berkas" class="form-label">Berkas Yang Berkaitan dengan Jalur
                            Pendaftaran</label>
                        <input class="form-control form-control-sm w-50" id="berkas" name="berkas" type="file" multiple>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>