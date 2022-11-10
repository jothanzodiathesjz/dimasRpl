<?php
require_once('../koneksi/db-konek.php');
include('imgfunction.php');
$judul = $_POST["judul"];
$genre = $_POST["genre"];
$durasi = $_POST["durasi"];
$poster = $_FILES;
$cast = $_POST["cast"];
$sinopsis = $_POST["sinopsis"];
$harga = $_POST["harga"];
$imageFunction = saveImage($poster);
if (isset($_POST)) {
    if ($imageFunction === "size") {
        echo '<script>alert("size max 3MB")</script>';
    } else if ($imageFunction === "extension") {
        echo '<script>alert("extension must JPG or PNG")</script>';
    } else {
        $sql = "INSERT INTO film (judul,genre,durasi,poster,pemain,sinopsis,harga) VALUES('$judul','$genre','$durasi','$imageFunction','$cast','$sinopsis','$harga')";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

        if ($query) {
            header('location: index.php?page=addfilm&msg=true');
            // echo '<script>alert("succes")</script>';
        } else {
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            echo $query;
            echo $sql;
            // echo $harga;
            // echo $cast;
            // header('location: index.php?page=addfilm&msg=false');
        }
    }
}
