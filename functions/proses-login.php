<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
require(__DIR__ . '/../config/koneksi.php');

function loginUser($email, $password)
{
    global $koneksi;
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    return $koneksi->query($query);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["email"]) && isset($_POST["pass"])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $result = loginUser($email, $pass);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['status'] = "login";
            header("location:pemasukan.php");
        } else {
            menampilkanPesan("Gagal Masuk! email atau password salah");
        }
    };
}
