<?php

$unpaidpage = isset($_GET["unpaidpage"]) ? $_GET["unpaidpage"] : "unpaid";
if ($unpaidpage === "detail") {
    detailData();
} else {
    getData();
}

function getData()
{
    $koneksi = getConnection();
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN film on pemesanan.id_film = film.id_film JOIN jadwal on pemesanan.id_jadwal = jadwal.id_jadwal WHERE `status`='unpaid'");
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Unpaid List</h4>
                <p class="card-description">
                    Add class <code>.table-bordered</code>
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Film</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
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
                                    <td><?php echo $q["tanggal"] ?></td>
                                    <td><?php echo $q["judul"] ?></td>
                                    <td><?php echo $q["harga"] ?></td>
                                    <td><?php echo $q["status"] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="?page=unpaid&unpaidpage=detail&id_pesan=<?php echo $q["id_pemesanan"] ?>"><i class="mdi mdi-eye " style="font-size: 20px;"></i></a>

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
<?php
}

function detailData()
{
    $id_pesan = $_GET["id_pesan"];
    $koneksi = getConnection();
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN film on pemesanan.id_film = film.id_film JOIN jadwal on pemesanan.id_jadwal = jadwal.id_jadwal JOIN studio on pemesanan.id_studio=studio.id_studio JOIN jam on pemesanan.id_jam=jam.id_jam JOIN user on pemesanan.id_user=user.id_user WHERE id_pemesanan='$id_pesan'");
    $data = mysqli_fetch_object($query);
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Details</h4>
                <div class="table-responsive pt-3">
                    <table class="table ">
                        <tbody>
                            <tr>
                                <th style="width: 400px;">Film</th>
                                <td>: <?php echo $data->judul ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Durasi</th>
                                <td>: <?php echo $data->durasi ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Harga</th>
                                <td>: <?php echo $data->harga ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Tanggal</th>
                                <td>: <?php echo $data->tanggal ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Jam</th>
                                <td>: <?php echo $data->jam ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Studio</th>
                                <td>: <?php echo $data->nm_studio ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Status</th>
                                <td>: <?php echo $data->status ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Nama</th>
                                <td>: <?php echo $data->name ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
}
