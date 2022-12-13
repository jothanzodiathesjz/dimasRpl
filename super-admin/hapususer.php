<?php
require_once('../koneksi/db-konek.php');
// menghapus jadwal berdasarkan id
$id_user = $_GET['id_user'];

mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id_user'");
header("location:index.php?page=users");
