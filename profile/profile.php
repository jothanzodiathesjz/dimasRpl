<?php
$koneksi = getConnection();
$id_user = $_SESSION["id_user"];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'") or die(mysqli_error($koneksi));
$data = mysqli_fetch_object($query);
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <div class="table-responsive pt-3">
                <table class="table ">
                    <tbody>
                        <tr>
                            <th style="width: 400px;">Nama</th>
                            <td>: <?php echo $data->name ?></td>
                        </tr>
                        <tr>
                            <th style="width: 400px;">Username</th>
                            <td>: <?php echo $data->username ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>