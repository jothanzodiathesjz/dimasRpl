<?php
require_once('db-konek.php');
// memasukkan nilai yg ada diform register ke dalam database
if ($_POST) {
    $sql = "INSERT INTO user (name, username, password, role) VALUES ('{$_POST['name']}', '{$_POST['username']}', '{$_POST['password']}', 'customer')";
    $query = mysqli_query($koneksi, $sql);
    // jika berhasil maka diarahkan ke login.php
    if ($query) {
        echo "<script>alert('Registrasi Berhasil Silahkan Login');window.location='../login.php'</script>";
        // jika gagal maaka registrasi ulang
    } else {
        echo "<script>alert('Gagal Disimpan');window.location='../signup.php'</script>";
    }
}

?>
<!-- INSERT INTO user (id_user, nama_user, username, passwor`, level) VALUES (NULL, '{$_POST['nama_user']}', '{$_POST['username']}', MD5('{$_POST['password']}'), 'user'); -->