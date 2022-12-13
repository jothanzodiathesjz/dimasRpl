<?php
require_once('./koneksi/db-konek.php');
if (!isset($_SESSION['status'])) {
    header('location:./login.php');
}
$id_film = $_GET["idfilm"];
$id_user = $_SESSION["id_user"];
$id_jadwal = $_GET["idjadwal"];
$sql0 = "SELECT * FROM film WHERE id_film='$id_film'";
$query0 = mysqli_query($koneksi, $sql0) or die(mysqli_error($koneksi));
$data = mysqli_fetch_array($query0);
$url = './public/images/';
$query1 = mysqli_query($koneksi, "SELECT * FROM jam");
$query2 = mysqli_query($koneksi, "SELECT * FROM studio");
?>

<div id="stats-counter" class="stats-counter">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 d-flex justify-content-center">
                <img src="<?php echo filter_var($data["poster"], FILTER_VALIDATE_URL) ? $data["poster"] : './public/images/' . $data['poster'] ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="movie.php?page=bayartiket" method="POST">
                    <input type="hidden" name="id_film" value="<?php echo $id_film ?>">
                    <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal ?>">
                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Studio</label>
                        <select class="form-select" aria-label="Default select example" name="studio">
                            <option selected disabled>Pilih Studio</option>
                            <?php
                            while ($row2 = mysqli_fetch_object($query2)) {
                            ?>
                                <option value="<?php echo $row2->id_studio ?>"><?php echo $row2->nm_studio ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="formGroupExampleInput2" class="form-label">Waktu</label>
                    </div>
                    <?php
                    while ($row = mysqli_fetch_object($query1)) {
                    ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jam" id="inlineRadio1" value="<?php echo $row->id_jam ?>">
                            <label class="form-check-label" for="inlineRadio1"><?php echo $row->jam ?></label>
                        </div>
                    <?php } ?>
                    <div class="text-center mt-3">
                        <select class="form-select" aria-label="Default select example" name="kursi">
                            <option selected disabled>Pilih Kursi</option>
                            <?php
                            for ($i = 1; $i <= 20; $i++) {
                            ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3 text-center">
                        <h4>SCREEN</h4>
                        <table cellpadding="15" class="text-center mx-auto">
                            <tr>
                                <?php
                                for ($i = 1; $i <= 4; $i++) {
                                ?>
                                    <td><?php echo $i ?></td>
                                <?php }
                                ?>
                                <td></td>
                                <td></td>
                                <?php
                                for ($i = 5; $i <= 8; $i++) {
                                ?>
                                    <td><?php echo $i ?></td>
                                <?php }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                for ($i = 9; $i <= 12; $i++) {
                                ?>
                                    <td><?php echo $i ?></td>
                                <?php }
                                ?>
                                <td></td>
                                <td></td>
                                <?php
                                for ($i = 13; $i <= 16; $i++) {
                                ?>
                                    <td><?php echo $i ?></td>
                                <?php }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                for ($i = 17; $i <= 20; $i++) {
                                ?>
                                    <td><?php echo $i ?></td>
                                <?php }
                                ?>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-dark" style="width: 100%;">Bayar Tiket</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>