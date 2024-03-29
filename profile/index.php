<?php
session_start();
function getConnection()
{
    require_once('../koneksi/db-konek.php');
    return $koneksi;
};
if (!isset($_SESSION["role"])) {
    header('location:../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Super Admin | Administrator </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../plugin/dashboard/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="../plugin/dashboard/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../plugin/dashboard/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../plugin/dashboard/template/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../plugin/dashboard/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../plugin/dashboard/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../plugin/dashboard/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../plugin/dashboard/template/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../plugin/dashboard/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="../plugin/dashboard/template/images/favicon.png" /> -->
</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <h3>DMovie.</h3>
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text"><span class="text-black fw-bold">WELLCOME</span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['nama'] ?></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                            <a href="../log-out.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <!-- partial -->
            <?php
            $activeNav = isset($_GET["page"]) ? $_GET["page"] : "";
            ?>
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item <?php echo $activeNav === "" ? "active" : ""; ?>">
                        <a class="nav-link" href="./">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title"><?php echo $_SESSION["nama"] ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php
                                        echo $activeNav === "userpayment" ? "active" : "";

                                        ?> ">
                        <a class="nav-link" href="?page=userpayment">
                            <i class="menu-icon mdi mdi-movie"></i>
                            <span class="menu-title">Confirm Payment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=userorders">
                            <i class="menu-icon mdi mdi-playlist-check"></i>
                            <span class="menu-title">Orders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../">
                            <i class="menu-icon mdi mdi-exit-to-app"></i>
                            <span class="menu-title">Back Home</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- require partials here -->
                        <?php
                        $page = isset($_GET["page"]) ? $_GET["page"] : "";
                        if ($page === "userpayment") {
                            include("payment.php");
                        } else if ($page === "userorders") {
                            include("orders.php");
                        } else if ($page === "empty") {
                            include("empty.php");
                        } else {
                            include("profile.php");
                        }
                        ?>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../plugin/dashboard/template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../plugin/dashboard/template/vendors/chart.js/Chart.min.js"></script>
    <script src="../plugin/dashboard/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../plugin/dashboard/template/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../plugin/dashboard/template/js/off-canvas.js"></script>
    <script src="../plugin/dashboard/template/js/hoverable-collapse.js"></script>
    <script src="../plugin/dashboard/template/js/template.js"></script>
    <script src="../plugin/dashboard/template/js/settings.js"></script>
    <script src="../plugin/dashboard/template/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../plugin/dashboard/template/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../plugin/dashboard/template/js/dashboard.js"></script>
    <script src="../plugin/dashboard/template/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>