<?php

if (!isset($_SESSION['username'])) {
    require_once "views/signup.php";
} else {
    header("Location: /system");
}
