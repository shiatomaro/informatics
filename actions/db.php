<?php

define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "informatics_admission");

function getConn()
{
    $dbhost = DBHOST;
    $dbuser = DBUSER;
    $dbpass = DBPASS;
    $dbname = DBNAME;
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

function getPDO()
{
    $dbhost = DBHOST;
    $dbname = DBNAME;
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
