<?php

require_once "controller/credentials.php";

if (!isLoggedIn()) {
    require_once "views/signup.php";
} else {
    redirectToDashboard();
}
