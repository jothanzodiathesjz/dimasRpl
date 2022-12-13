<?php
require_once('../koneksi/db-konek.php');
// menghapus jadwal berdasarkan id
$id_film = $_GET['deletefilm'];

mysqli_query($koneksi, "DELETE FROM film WHERE id_film='$id_film'");
header("location:index.php?page=data-film");
