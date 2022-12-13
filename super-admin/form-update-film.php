<?php
require_once("../koneksi/db-konek.php");
$id_film = $_GET["id_film"];
$query = mysqli_query($koneksi, "SELECT id_film,judul,genre,durasi,poster,pemain,sinopsis,harga,kategory FROM film where id_film=$id_film");
$data = mysqli_fetch_array($query);

$msg = isset($_GET['msg']) ? $_GET['msg'] : "";
if ($msg === "true") {
    echo "<script>alert('Succesfull add data')</script>";
} else if ($msg === "false") {
    echo "<script>alert('Failed add data')</script>";
}
?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update User Film</h4>

            <form class="forms-sample" action="updatefilm-action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id_film" value="<?php echo $data["id_film"] ?>">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="judul" value="<?php echo $data["judul"] ?>">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="genre" class="form-control" placeholder="genre" value="<?php echo $data["genre"] ?>">
                </div>
                <div class="form-group">
                    <label>Durasi</label>
                    <input type="text" name="durasi" class="form-control" placeholder="Durasi" value="<?php echo $data["durasi"] ?>">
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <div class="input-group col-xs-12">
                        <input type="file" name="image" class="form-control " placeholder="Upload Image" style="height: 2.6rem;">
                    </div>
                </div>
                <div class="form-group">
                    <label>Cast</label>
                    <input type="text" class="form-control" name="cast" placeholder="Cast" value="<?php echo $data["pemain"] ?>">
                </div>
                <div class="form-group">
                    <label>Sinopsis</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="sinopsis" rows="3" style="height: 5rem;"><?php echo $data["sinopsis"] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Harga" value="<?php echo $data["harga"] ?>">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        <option value="<?php echo $data["kategory"] ?>"><?php echo $data["kategory"] ?></option>
                        <option value="nowplaying">Now Playing</option>
                        <option value="upcoming">Up Comming</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>