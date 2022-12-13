<?php
require_once('../koneksi/db-konek.php');
$id_user = $_POST["id_user"];
$name = $_POST["name"];
$username = $_POST["username"];
$role = $_POST["role"];
if (isset($_POST)) {
    $sql = "UPDATE user SET `name` = '$name', username = '$username', `role`='$role' WHERE id_user='$id_user'";
    $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    if ($query) {
        // header('location: index.php?page=update-film&id_film=$id_film&msg=true');
        echo "<script>window.location.href='index.php?page=update-user&id_user=$id_user&msg=true'</script>";
    } else {
        echo $cast;
        echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        // echo $query;
        // echo $sql;
        // echo $harga;
        echo "<script>window.location.href='index.php?page=update-user&id_user=$id_user&msg=false'</script>";
    }
}
