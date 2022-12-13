<?php

$datepage = isset($_GET["datepage"]) ? $_GET["datepage"] : "tanggal";
if ($datepage === "addtanggal") {
    formAddTanggal();
} else if ($datepage === "addaction") {
    insertTanggal();
} else if ($datepage === "formupdate") {
    formUpdateTanggal();
} else if ($datepage === "updateaction") {
    updateAction();
} else if ($datepage === "delete") {
    deleteTanggal();
} else {
    getData();
}

function getData()
{
    $koneksi = getConnection();
    $query = mysqli_query($koneksi, "SELECT * FROM jadwal");
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Tanggal</h4>
                <p class="card-description">
                    Add class <code>.table-bordered</code>
                </p>
                <a href="?page=tanggal&datepage=addtanggal" class="btn btn-primary">+Add Tanggal</a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>tanggal</th>
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
                                    <td><?php echo $q["tanggal"] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="?page=tanggal&datepage=formupdate&id_jadwal=<?php echo $q["id_jadwal"] ?>"><i class="mdi mdi-grease-pencil " style="font-size: 20px;"></i></a>
                                            <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=tanggal&datepage=delete&id_jadwal=<?php echo $q["id_jadwal"] ?>"><i class="mdi mdi-delete ms-4" style="font-size: 20px;"></i></a>
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


function formAddTanggal()
{
?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Tanggal</h4>
                <form class="forms-sample" action="?page=tanggal&datepage=addaction" method="POST">
                    <div class=" form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function insertTanggal()
{
    $koneksi = getConnection();
    $tanggal = $_POST["tanggal"];
    if ($_POST) {
        $query = mysqli_query($koneksi, "INSERT INTO jadwal (tanggal) VALUES ('$tanggal')");
        if ($query) {
            echo '<script>alert("successfull add Tanggal");window.location.href="./?page=tanggal"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    }
}

function formUpdateTanggal()
{
    $id_tanggal = $_GET["id_jadwal"];
?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Tanggal</h4>
                <form class="forms-sample" action="?page=tanggal&datepage=updateaction" method="POST">
                    <input type="hidden" name="id_jadwal" value="<?php echo $id_tanggal ?>">
                    <div class=" form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function updateAction()
{
    $koneksi = getConnection();
    $id_jadwal = $_POST["id_jadwal"];
    $tanggal = $_POST["tanggal"];
    if ($_POST) {
        $query = mysqli_query($koneksi, "UPDATE jadwal SET tanggal='$tanggal' WHERE id_jadwal='$id_jadwal'");
        if ($query) {
            echo '<script>alert("successfull Update Tanggal");window.location.href="./?page=tanggal"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    }
}

function deleteTanggal()
{
    $koneksi = getConnection();
    if ($_GET["id_jadwal"]) {
        $id_jadwal = $_GET["id_jadwal"];
        $query = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'");
        if ($query) {
            echo '<script>alert("successfull Delete jam");window.location.href="./?page=tanggal"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    } else {
        echo '<script>alert("Id Jam tidak tersedia");window.location.href="./?page=tanggal"</script>';
    }
}
?>