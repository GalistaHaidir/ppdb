<?php
session_start();
// Atur koneksi ke database
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "ppdb";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pass = $_POST['password'];
    $confirmpassword = md5($pass);
    $password = $_POST["confirmpassword"];

    // Periksa duplikat email
    $duplicate = mysqli_query($koneksi, "SELECT * FROM akun_siswa WHERE email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Email or Email Has Already Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            // Sisipkan data ke tabel yang sesuai
            $query = "INSERT INTO akun_siswa (email, password) VALUES ('$email', '$password')";
            mysqli_query($koneksi, $query);
            echo "<script> alert('Registration Successful'); </script>";
        } else {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <metiewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container p-5">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"> 
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="confirmpassword">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>