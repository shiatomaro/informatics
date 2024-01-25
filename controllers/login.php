<?php

require_once "controllers/credentials.php";

if (!isLoggedIn()) {
    require_once "views/login.php";
} else {
    redirectToDashboard();
}
