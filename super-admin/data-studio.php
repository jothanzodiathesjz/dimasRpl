<?php

$studiopage = isset($_GET["studiopage"]) ? $_GET["studiopage"] : "studio";
if ($studiopage === "addstudio") {
    formAddStudio();
} else if ($studiopage === "addaction") {
    insertStudio();
} else if ($studiopage === "formupdate") {
    formUpdateStudio();
} else if ($studiopage === "updateaction") {
    updateAction();
} else if ($studiopage === "delete") {
    deleteStudio();
} else {
    getData();
}

function getData()
{
    $koneksi = getConnection();
    $query = mysqli_query($koneksi, "SELECT * FROM studio");
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Studio</h4>
                <p class="card-description">
                    Add class <code>.table-bordered</code>
                </p>
                <a href="?page=studio&studiopage=addstudio" class="btn btn-primary">+Add Studio</a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Studio</th>
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
                                    <td><?php echo $q["nm_studio"] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="?page=studio&studiopage=formupdate&id_studio=<?php echo $q["id_studio"] ?>"><i class="mdi mdi-grease-pencil " style="font-size: 20px;"></i></a>
                                            <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=studio&studiopage=delete&id_studio=<?php echo $q["id_studio"] ?>"><i class="mdi mdi-delete ms-4" style="font-size: 20px;"></i></a>
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
function formAddStudio()
{
?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Studio</h4>
                <form class="forms-sample" action="?page=studio&studiopage=addaction" method="POST">
                    <div class=" form-group">
                        <label>Studio</label>
                        <input type="text" name="studio" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
}


function insertStudio()
{
    $koneksi = getConnection();
    $studio = $_POST["studio"];
    if ($_POST) {
        $query = mysqli_query($koneksi, "INSERT INTO studio (nm_studio) VALUES ('$studio')");
        if ($query) {
            echo '<script>alert("successfull add Studio");window.location.href="./?page=studio"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    }
}

function formUpdateStudio()
{
    $koneksi = getConnection();
    $id_studio = $_GET["id_studio"];
    $query = mysqli_query($koneksi, "SELECT * FROM studio WHERE id_studio='$id_studio'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_object($query);
?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Studio</h4>
                <form class="forms-sample" action="?page=studio&studiopage=updateaction" method="POST">
                    <div class=" form-group">
                        <input type="hidden" name="id_studio" value="<?php echo $id_studio ?>">
                        <label>Studio</label>
                        <input type="text" name="studio" class="form-control" value="<?php echo $data->nm_studio ?>">
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
    $id_studio = $_POST["id_studio"];
    $studio = $_POST["studio"];
    if ($_POST) {
        $query = mysqli_query($koneksi, "UPDATE studio SET nm_studio='$studio' WHERE id_studio='$id_studio'");
        if ($query) {
            echo '<script>alert("successfull Update Studio");window.location.href="./?page=studio"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    }
}

function deleteStudio()
{
    $koneksi = getConnection();
    if ($_GET["id_studio"]) {
        $id_studio = $_GET["id_studio"];
        $query = mysqli_query($koneksi, "DELETE FROM studio WHERE id_studio='$id_studio'");
        if ($query) {
            echo '<script>alert("successfull Delete Studio");window.location.href="./?page=studio"</script>';
        } else {
            die(mysqli_error($koneksi));
        }
    } else {
        echo '<script>alert("Id Studio tidak tersedia");window.location.href="./?page=studio"</script>';
    }
}
