<?php
require_once('./koneksi/db-konek.php');
$id_film = $_GET["idfilm"];
$sql0 = "SELECT * FROM film WHERE id_film='$id_film'";
$query0 = mysqli_query($koneksi, $sql0) or die(mysqli_error($koneksi));
$data = mysqli_fetch_array($query0);
$url = './public/images/';
?>

<div id="stats-counter" class="stats-counter">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 d-flex justify-content-center">
                <img src="<?php echo filter_var($data["poster"], FILTER_VALIDATE_URL) ? $data["poster"] : './public/images/' . $data['poster'] ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <?php

                $query = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY id_jadwal DESC LIMIT 3 ");
                $url = './public/images/';
                while ($q = mysqli_fetch_array($query)) {
                ?>
                    <div class="stats-item d-flex align-items-center">
                        <a href="movie.php?page=pesan&idfilm=<?php echo $id_film ?>&idjadwal=<?php echo $q["id_jadwal"] ?>" class="btn btn-dark" style="width: 100%;"><?php echo $q["tanggal"] ?></a>
                    </div><!-- End Stats Item -->
                <?php
                }
                ?>

            </div>

        </div>

    </div>
</div>