<?php
require_once('../koneksi/db-konek.php');
$id_user = $_GET["id_user"];
$query = mysqli_query($koneksi, "SELECT name,username,role FROM user where id_user=$id_user");
$data = mysqli_fetch_array($query);

$msg = isset($_GET['msg']) ? $_GET['msg'] : "";
if ($msg === "true") {
    echo "<script>alert('Succesfull update data')</script>";
} else if ($msg === "false") {
    echo "<script>alert('Failed update data')</script>";
}
?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update User</h4>

            <form class="forms-sample" action="update-user-action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $data['name']; ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username']; ?>">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="<?php echo $data['role']; ?>"><?php echo $data['role']; ?></option>
                        <option value="superadmin">superadmin</option>
                        <option value="admin">admin</option>
                        <option value="customer">customer</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>