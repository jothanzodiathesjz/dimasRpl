<?php
require_once("./koneksi/db-konek.php");
$id_film = $_GET["idfilm"];
$sql = "SELECT * FROM film WHERE id_film='$id_film'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>


<div id="stats-counter" class="stats-counter">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 d-flex justify-content-center">
                <img src="<?php echo filter_var($data["poster"], FILTER_VALIDATE_URL) ? $data["poster"] : './public/images/' . $data['poster'] ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <div class="stats-item d-flex align-items-center">
                    <span class="judul">Judul</span>
                    <p>: <?php echo $data["judul"] ?></p>
                </div><!-- End Stats Item -->

                <div class="stats-item d-flex align-items-center">
                    <span class="judul">Genre</span>
                    <p>: <?php echo $data["genre"] ?></p>
                </div>
                <div class="stats-item d-flex align-items-center">
                    <span class="judul">Cast</span>
                    <p>: <?php echo $data["pemain"] ?></p>
                </div>
                <div class="stats-item d-flex align-items-center">
                    <span class="judul">Durasi</span>
                    <p>: <?php echo $data["durasi"] ?></p>
                </div>
                <div class="stats-item d-flex align-items-center">
                    <span class="judul">Sinopsis</span>
                    <p>: <?php echo $data["sinopsis"] ?></p>
                </div>

                <!-- End Stats Item -->

                <div class="stats-item d-flex align-items-center">
                    <span class="judul">Price</span>
                    <p>: IDR <?php echo $data["harga"] ?></p>
                </div><!-- End Stats Item -->
                <div class="mt-4 d-flex justify-content-start align-items-center">
                    <?php
                    if ($data["kategory"] !== "upcoming") {
                    ?>
                        <a href="movie.php?page=jadwalfilm&idfilm=<?php echo $id_film ?>" class="btn btn-dark" style="width: 15rem;">Buy Ticket</a>
                    <?php
                    }
                    ?>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </div>
</div>