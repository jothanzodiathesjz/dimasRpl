<?php
require_once('../koneksi/db-konek.php');
$query = mysqli_query($koneksi, "SELECT * FROM film");
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Film</h4>
            <a href="?page=addfilm" class="btn btn-primary">+Add Film</a>
            <div class="table-responsive table-sm pt-3">
                <table class="table table-bordered" style="overflow: hidden ;table-layout:fixed;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Genre</th>
                            <th>Durasi</th>
                            <th>Cast</th>
                            <th>Poster</th>
                            <th>Sinopsis</th>
                            <th>Price</th>
                            <th>category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // menampilkan data dengan pengulangan while
                        $no = 1;
                        while ($q = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis"><?php echo $q["judul"] ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis"><?php echo $q["genre"] ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis"><?php echo $q["durasi"] ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis"><?php echo $q["pemain"] ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis"><?php echo $q["poster"] ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis">
                                    <?php echo $q["sinopsis"] ?>
                                </td>
                                <td><?php echo $q["harga"] ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis"><?php echo $q["kategory"] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="?page=update-film&id_film=<?php echo $q["id_film"] ?>"><i class="mdi mdi-grease-pencil " style="font-size: 20px;"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapusfilm.php?deletefilm=<?php echo $q["id_film"] ?>"><i class="mdi mdi-delete ms-4" style="font-size: 20px;"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>