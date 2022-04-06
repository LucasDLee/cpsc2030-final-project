<?php
require 'config.php';

$connect = 'mysql:host=' . DBHOST . '; dbname=' . DBNAME;
$pdo;
try {
    global $pdo;
    $pdo = new PDO($connect, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    include '../pages/database-error.html';
    die();
}