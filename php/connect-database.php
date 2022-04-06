<?php
require 'config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

function db_connect() {
    global $pdo;
    $connect = 'mysql:host=' . DBHOST . '; dbname=' . DBNAME;
    try {
        $pdo = new PDO($connect, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        include '../pages/database-error.html';
        die();
    }
    return $pdo;
}
