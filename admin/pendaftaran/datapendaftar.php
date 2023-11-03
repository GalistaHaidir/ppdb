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

$id_pendaftaran = "";
$nisn = "";
$tanggal_pendaftaran = "";
$username_petugas = "";
$status = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
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
                <li class="active">
                    <a href="datapendaftar.php" class="text-decoration-none px-3 py-3 d-block">
                        <i class="bi bi-pencil-square"></i>
                        Data Pendaftar
                    </a>
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
                    <a href="../logout_admin.php" class="text-decoration-none px-3 py-2 d-block">
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
                <div class="card border-0">
                    <div class="card-body">
                        <h1 class="mb-3">Data Pendaftar</h1>
                        <table id="example" class="display nowrap" style="max-width: 95%;">
                            <thead>
                                <tr>
                                    <th>Id Pendaftar</th>
                                    <th>NISN</th>
                                    <th>Tanggal Pendaftaran</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql2 = "select * from pendaftaran order by id_pendaftaran desc";
                                $q2 = mysqli_query($koneksi, $sql2);
                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id_pendaftaran = $r2['id_pendaftaran'];
                                    $nisn = $r2['nisn'];
                                    $tanggal_pendaftaran = $r2['tanggal_pendaftaran'];
                                    $username_petugas = $r2['username_petugas'];
                                    $status = $r2['status'];
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $id_pendaftaran ?>
                                        </th>
                                        <td scope="row">
                                            <?php echo $nisn ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo $tanggal_pendaftaran ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo $username_petugas ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo $status ?>
                                        </td>
                                        <td scope="row">
                                            <a href="editpendaftar.php?op=edit&id_pendaftaran=<?php echo $id_pendaftaran ?>"
                                                class="btn btn-warning btn-sm" style="font-weight: 600;"><i
                                                    class="bi bi-pen"></i>&nbsp;Ubah Status
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id Pendaftar</th>
                                    <th>NISN</th>
                                    <th>Tanggal Pendaftaran</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
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
                    'excel', 'print'
                ]
            });
        });
    </script>
</body>

</html>