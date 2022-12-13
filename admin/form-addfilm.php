<?php
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
            <h4 class="card-title">Add Film</h4>

            <form class="forms-sample" action="addfilm-action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="judul">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="genre" class="form-control" placeholder="genre">
                </div>
                <div class="form-group">
                    <label>Durasi</label>
                    <input type="text" name="durasi" class="form-control" placeholder="Durasi">
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <div class="input-group col-xs-12">
                        <input type="file" name="image" class="form-control " placeholder="Upload Image" style="height: 2.6rem;">
                    </div>
                </div>
                <div class="form-group">
                    <label>Poster With Link</label>
                    <input type="text" class="form-control" name="posterLink" placeholder="Link">
                </div>
                <div class="form-group">
                    <label>Cast</label>
                    <input type="text" class="form-control" name="cast" placeholder="Cast">
                </div>
                <div class="form-group">
                    <label>Sinopsis</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="sinopsis" rows="3" style="height: 5rem;"></textarea>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Harga">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        <option value="nowplaying">Now Playing</option>
                        <option value="upcoming">Up Comming</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>