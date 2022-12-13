<?php
require_once('../koneksi/db-konek.php');
include('imgfunction.php');
$id_film = $_POST["id_film"];
$judul = $_POST["judul"];
$genre = $_POST["genre"];
$durasi = $_POST["durasi"];
$poster = $_FILES;
$cast = $_POST['cast'];
$sinopsis = $_POST["sinopsis"];
$harga = $_POST["harga"];
$kategory = $_POST["category"];
$imageFunction = saveImage($poster);
$pemain = mysqli_escape_string($koneksi, $cast);

if (isset($_POST)) {
    if (!$poster["image"]["name"]) {
        $sql = "UPDATE film SET judul = '$judul', genre = '$genre', durasi='$durasi',pemain='" . $pemain . "',sinopsis='$sinopsis',harga='$harga',kategory='$kategory' WHERE id_film='$id_film'";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        echo $cast;
        if ($query) {
            // header('location: index.php?page=update-film&id_film=$id_film&msg=true');
            echo "<script>window.location.href='index.php?page=update-film&id_film=$id_film&msg=true'</script>";
        } else {
            echo $cast;
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // echo $query;
            // echo $sql;
            // echo $harga;
            // echo "<script>window.location.href='index.php?page=update-film&id_film=$id_film&msg=false'</script>";
        }
    } else if ($imageFunction === "size") {
        echo '<script>alert("size max 3MB")</script>';
    } else if ($imageFunction === "extension") {
        echo '<script>alert("extension must JPG or PNG")</script>';
    } else {
        $sql = "UPDATE film SET judul = '$judul', genre = '$genre', durasi='$durasi',pemain='$cast',poster='$imageFunction',sinopsis='$sinopsis',harga='$harga',kategory='$category' WHERE id_film='$id_film'";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        echo $cast;
        if ($query) {
            // header('location: index.php?page=update-film&id_film=$id_film&msg=true');
            echo "<script>window.location.href='index.php?page=update-film&id_film=$id_film&msg=true'</script>";
        } else {
            echo $cast;
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // echo $query;
            // echo $sql;
            // echo $harga;
            echo "<script>window.location.href='index.php?page=update-film&id_film=$id_film&msg=false'</script>";
        }
    }
}

// $query = "UPDATE `film` SET judul = '$judul', genre = '$genre', durasi=$durasi', 'poster=$imageFunction', 'pemain=$cast','sinopsis=$sinopsis','harga=$harga' WHERE id_film='$id_film'";
