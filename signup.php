<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./plugin/dashboard/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="./plugin/dashboard/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./plugin/dashboard/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="./plugin/dashboard/template/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="./plugin/dashboard/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./plugin/dashboard/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./plugin/dashboard/template/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0 bg-dark">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded">
                            <div class="brand-logo">
                                <h1>DMovie.</h1>
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="fw-light">Register to continue.</h6>
                            <form class="pt-3" method="POST" action="./koneksi/cek-regis.php">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn">
                                        Sign Up
                                    </button>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    Already have an account? <a href="login.php" class="text-primary">Sign In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./plugin/dashboard/template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./plugin/dashboard/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./plugin/dashboard/template/js/off-canvas.js"></script>
    <script src="./plugin/dashboard/template/js/hoverable-collapse.js"></script>
    <script src="./plugin/dashboard/template/js/template.js"></script>
    <script src="./plugin/dashboard/template/js/settings.js"></script>
    <script src="./plugin/dashboard/template/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>