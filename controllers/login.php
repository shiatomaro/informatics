<?php

if (!isset($_SESSION['username'])) {
    require_once "views/login.php";
} else {
    header("Location: /system");
}
