<?php
$page = (isset($_GET['page']) ? $_GET['page'] : '');
if ($page === "data-film") {
    include("data-film.php");
} else if ($page === "users") {
    include("data-user.php");
} else if ($page === "addfilm") {
    include('form-addfilm.php');
} else {
    echo '<H1>Hello</H1>';
}
