<?php
$page = (isset($_GET['page']) ? $_GET['page'] : '');
if ($page === "upcoming") {
    include("upcoming.php");
} else if ($page === "details") {
    include("detail-film.php");
} else if ($page === "jadwalfilm") {
    include("jadwal.php");
} else if ($page === "pesan") {
    include("formpesan.php");
} else if ($page === "bayartiket") {
    include("bayartiket.php");
} else {
    include("nowplaying.php");
}
