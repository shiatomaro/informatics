<?php

require_once "controllers/credentials.php";

if (!isLoggedIn()) {
    require_once "views/signup.php";
} else {
    redirectToDashboard();
}
