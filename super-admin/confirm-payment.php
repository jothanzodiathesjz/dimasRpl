<?php

$confirmpage = isset($_GET["confirmpage"]) ? $_GET["confirmpage"] : "konfirmasi";
if ($confirmpage === "detail") {
    detailData();
} else if ($confirmpage === "update") {
    updateAction();
} else {
    getData();
}

function getData()
{
    $koneksi = getConnection();
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN film on pemesanan.id_film = film.id_film JOIN jadwal on pemesanan.id_jadwal = jadwal.id_jadwal WHERE `status`='proccess'");
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Confirm List</h4>
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
                                            <a href="?page=konfirmasi&confirmpage=detail&id_pesan=<?php echo $q["id_pemesanan"] ?>"><i class="mdi mdi-eye " style="font-size: 20px;"></i></a>

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
    $query2 = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pemesanan ='$id_pesan'");
    $data = mysqli_fetch_object($query);
    $row = mysqli_fetch_object($query2);
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
                                <th style="width: 400px;">Harga</th>
                                <td>: <?php echo $data->harga ?></td>
                            </tr>
                            <tr>
                                <th style="width: 400px;">Resi</th>
                                <td>: <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Lihat Resi
                                    </button> </td>
                            </tr>
                            <tr>
                                <th style="width: 400px;"><label class="col-sm-3 col-form-label fw-bold fs-6">Status</label></th>
                                <td>
                                    <form class="form" action="./index.php?page=konfirmasi&confirmpage=update" method="POST">
                                        <input type="hidden" name="id_pesan" value="<?php echo $data->id_pemesanan ?>">
                                        <div class="d-flex">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="status" value="proccess">
                                                        Proccess
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="status" value="paid">
                                                        Paid
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-4">Confirm Pembayaran</button></form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="../resitransfer/<?php echo $row->bukti_tf ?>" alt="" style="width: 100%;height: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

<?php
}

function updateAction()
{
    if (!isset($_POST["status"])) {
        echo '<script>alert("Anda belum Melakukan Update Status");window.history.back();</script>';
    } else {
        $status = $_POST["status"];
        $id_pesan = $_POST["id_pesan"];
        $koneksi = getConnection();
        $query = mysqli_query($koneksi, "UPDATE pemesanan SET `status`='$status' WHERE id_pemesanan='$id_pesan'") or die(mysqli_error($koneksi));
        if ($query) {
            echo '<script>alert("Successfull Confirm Payment");window.location.href="./?page=konfirmasi";</script>';
        }
    }
}
