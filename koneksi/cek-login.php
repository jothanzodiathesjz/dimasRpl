<?php
// berfungsi mengaktifkan session
session_start();

// berfungsi menghubungkan koneksi ke database
include './db-konek.php';

// berfungsi menangkap data yang dikirim
$user = $_POST['username'];
$pass = $_POST['password'];

// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");

//berfungsi menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);

// berfungsi mengecek apakah username dan password ada pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($sql);
    // berfungsi mengecek jika user login sebagai admin
    if ($data['role'] == "super_admin") {
        // berfungsi membuat session
        $_SESSION['nama'] =  $data['name'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['status'] = "login";
        //berfungsi mengalihkan ke halaman admin
        header("location: ../super-admin/index.php");
        // berfungsi mengecek jika user login sebagai moderator
    } else if ($data['role'] == "customer") {
        // berfungsi membuat session
        $_SESSION['nama'] = $data['name'];
        $_SESSION['role'] = "customer";
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['status'] = "login";
        // berfungsi mengalihkan ke halaman moderator
        header("location:../index.php");
    } else if ($data['role'] == "admin") {
        // berfungsi membuat session
        $_SESSION['nama'] = $data['name'];
        $_SESSION['role'] = "admin";
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['status'] = "login";
        // berfungsi mengalihkan ke halaman moderator
        header("location:../admin/index.php");
    } else {
        // berfungsi mengalihkan alihkan ke halaman login kembali
        header("location:../login.php?alert=gagal");
    }
} else {
    header("location:../login.php?alert=gagal");
}
