<?php
require_once('../koneksi/db-konek.php');
$query = mysqli_query($koneksi, "SELECT id_user,name,username,role FROM user");
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Film</h4>
            <p class="card-description">
                Add class <code>.table-bordered</code>
            </p>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
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
                                <td><?php echo $q["name"] ?></td>
                                <td><?php echo $q["username"] ?></td>
                                <td><?php echo $q["role"] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="?page=update-user&id_user=<?php echo $q["id_user"] ?>"><i class="mdi mdi-grease-pencil " style="font-size: 20px;"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapususer.php?id_user=<?php echo $q["id_user"] ?>"><i class="mdi mdi-delete ms-4" style="font-size: 20px;"></i></a>
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