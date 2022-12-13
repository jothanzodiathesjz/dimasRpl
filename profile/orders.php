<?php
$orders = isset($_GET["orders"]) ? $_GET["orders"] : "userorders";
if ($orders === "details") {
    detailData();
} else {
    getData();
}
function getData()
{
    $koneksi = getConnection();
    $id_user = $_SESSION["id_user"];
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN film on pemesanan.id_film = film.id_film JOIN jadwal on pemesanan.id_jadwal = jadwal.id_jadwal WHERE id_user='$id_user'");
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Confirm Payment</h4>
                <p class="card-description">
                    Add class <code>.table</code>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Film</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_object($query)) {
                                if ($data->status !== "unpaid") {

                            ?>
                                    <tr>
                                        <td><?php echo $data->judul ?></td>
                                        <td><?php echo $data->tanggal ?></td>
                                        <td><?php echo $data->harga ?></td>
                                        <td class="text-center"><label class="badge badge-danger"><?php echo $data->status ?></label></td>
                                        <td class="text-center"><a href="?page=userorders&orders=details&id_pesan=<?php echo $data->id_pemesanan ?>"><i class="mdi mdi-eye " style="font-size: 20px;"></i></a></td>
                                    </tr>
                            <?php
                                }
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
                <div class="table-responsive pt-3 mb-4">
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
                <?php if ($data->status === "paid") {
                ?>
                    <a href="./cetak.php?id_pesan=<?php echo $data->id_pemesanan ?>" class="btn btn-primary"> Cetak Tiket Bioskop</a>
                <?php  } else {
                ?>
                    <button disabled class="btn btn-primary">Cetak Tiket Bioskop</button>
                <?php  } ?>
            </div>
        </div>
    </div>


<?php
}

function  formBayar()
{
    $id_pesan = $_GET["id_pesan"];
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bukti Pembayaran</h4>
                <form class="forms-sample" action="?page=userpayment&pay=confirmaction" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Resi</label>
                        <div class="input-group col-xs-12">
                            <input type="file" name="image" class="form-control " placeholder="Upload Image" style="height: 2.6rem;">
                        </div>
                    </div>
                    <input type="hidden" name="id_pesan" value="<?php echo $id_pesan ?>">
                    <button class="btn btn-primary" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
<?php
}
