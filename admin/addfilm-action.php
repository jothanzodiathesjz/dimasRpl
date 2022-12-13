<?php
require_once('../koneksi/db-konek.php');
include('imgfunction.php');
$judul = mysqli_escape_string($koneksi, $_POST["judul"]);
$genre = $_POST["genre"];
$durasi = $_POST["durasi"];
$poster = $_FILES;
$cast = mysqli_escape_string($koneksi, $_POST["cast"]);
$sinopsis = mysqli_escape_string($koneksi, $_POST["sinopsis"]);
$harga = $_POST["harga"];
$kategory = $_POST["category"];
$posterLink = $_POST["posterLink"];
$imageFunction = saveImage($poster);
if (isset($_POST)) {
    if (!$poster["image"]["name"]) {
        $sql = "INSERT INTO film (judul,genre,durasi,poster,pemain,sinopsis,harga,kategory) VALUES('$judul','$genre','$durasi','$posterLink','$cast','$sinopsis','$harga','$kategory')";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        if ($query) {
            header('location: index.php?page=addfilm&msg=true');
            // echo '<script>alert("succes")</script>';
        } else {
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            header('location: index.php?page=addfilm&msg=false');
        }
    } else if ($imageFunction === "size") {
        echo '<script>alert("size max 3MB")</script>';
    } else if ($imageFunction === "extension") {
        echo '<script>alert("extension must JPG or PNG")</script>';
    } else {
        $sql = "INSERT INTO film (judul,genre,durasi,poster,pemain,sinopsis,harga,kategory) VALUES('$judul','$genre','$durasi','$imageFunction','$cast','$sinopsis','$harga','$category')";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

        if ($query) {
            header('location: index.php?page=addfilm&msg=true');
            // echo '<script>alert("succes")</script>';
        } else {
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            header('location: index.php?page=addfilm&msg=false');
        }
    }
}
