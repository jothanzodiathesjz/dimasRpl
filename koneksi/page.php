<?php
$page = (isset($_GET['page']) ? $_GET['page'] : '');
if ($page === "data-film") {
    include("data-film.php");
} else if ($page === "users") {
    include("data-user.php");
} else if ($page === "addfilm") {
    include('form-addfilm.php');
} else if ($page === "update-film") {
    include('form-update-film.php');
} else if ($page === "update-user") {
    include('form-update-user.php');
} else if ($page === "tanggal") {
    include('data-tanggal.php');
} else if ($page === "addtanggal") {
    include("form-addtanggal.php");
} else if ($page === "jam") {
    include("data-jam.php");
} else if ($page === "studio") {
    include("data-studio.php");
} else if ($page === "unpaid") {
    include("data-unpaid.php");
} else if ($page === "konfirmasi") {
    include("confirm-payment.php");
} else if ($page === "paid") {
    include("data-paid.php");
} else {
    echo '<H1>Hello</H1>';
}
