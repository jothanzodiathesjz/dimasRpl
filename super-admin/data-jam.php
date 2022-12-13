<?php
$jampage = isset($_GET["jampage"]) ? $_GET["jampage"] : "jam";
if ($jampage === "addjam") {
    formAddjam();
} else if ($jampage === "createjam") {
    insertDataJam();
} else if ($jampage === "updatejam") {
    formUpdateJam();
} else if ($jampage === "updateaction") {
    updateJam();
} else if ($jampage === "delete") {
    deleteJam();
} else {
    getData();
}
function getData()
{
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Jam</h4>
                <p class="card-description">
                    Add class <code>.table-bordered</code>
                </p>
                <a href="?page=jam&jampage=addjam" class="btn btn-primary">+Add Jam</a>
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
                            $koneksi = getConnection();
                            $query = mysqli_query($koneksi, "SELECT * FROM jam");
                            // menampilkan data dengan pengulangan while
                            $no = 1;
                            while ($q = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $q["jam"] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="?page=jam&jampage=updatejam&id_jam=<?php echo $q["id_jam"] ?>"><i class="mdi mdi-grease-pencil " style="font-size: 20px;"></i></a>
                                            <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=jam&jampage=delete&id_jam=<?php echo $q["id_jam"] ?>"><i class="mdi mdi-delete ms-4" style="font-size: 20px;"></i></a>
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
<?php } ?>

<!-- function add jam -->

<?php
function formAddjam()
{
?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Jam</h4>
                <form class="forms-sample" action="?page=jam&jampage=createjam" method="POST">
                    <div class=" form-group">
                        <label>Jam</label>
                        <input type="time" name="jam" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php }


function insertDataJam()
{
    if ($_POST) {
        $koneksi = getConnection();
        $jam = $_POST["jam"];
        $query = mysqli_query($koneksi, "INSERT INTO jam (jam) VALUES ('$jam')");
        if ($query) {
            echo '<script>alert("successfull add jam");window.location.href="./?page=jam"</script>';
        } else {
            mysqli_error($koneksi);
        }
    }
}

function formUpdateJam()
{
    $id_jam = $_GET["id_jam"];
?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Jam</h4>
                <form class="forms-sample" action="?page=jam&jampage=updateaction" method="POST">
                    <input type="hidden" name="id_jam" value="<?php echo $id_jam ?>">
                    <div class=" form-group">
                        <label>Jam</label>
                        <input type="time" name="jam" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php }

function updateJam()
{
    $koneksi = getConnection();
    $id_jam = $_POST["id_jam"];
    $jam = $_POST["jam"];
    if ($_POST) {
        $query = mysqli_query($koneksi, "UPDATE jam SET jam='$jam' WHERE id_jam='$id_jam'");
        if ($query) {
            echo '<script>alert("successfull Update jam");window.location.href="./?page=jam"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    }
}

function deleteJam()
{
    $koneksi = getConnection();
    if ($_GET["id_jam"]) {
        $id_jam = $_GET["id_jam"];
        $query = mysqli_query($koneksi, "DELETE FROM jam WHERE id_jam='$id_jam'");
        if ($query) {
            echo '<script>alert("successfull Delete jam");window.location.href="./?page=jam"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    } else {
        echo '<script>alert("Id Jam tidak tersedia");window.location.href="./?page=jam"</script>';
    }
}


?>