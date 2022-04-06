<?php
    include 'connect-database.php';
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    function submit() {
        try {
            
            global $pdo;
            $insert = 'INSERT INTO inquiries (date, name, topic, inquiryText) VALUES (:date, :personName, :topic, :inquiryText)';

            $prepare = $pdo->prepare($insert);
            $prepare->bindValue(':date', date('Y-m-d'));
            $prepare->bindValue(':personName', $_POST['name']);
            $prepare->bindValue(':topic', $_POST['topic']);
            $prepare->bindValue(':inquiryText', $_POST['inquiry']);

            $prepare->execute();
        } catch(PDOException $e) {
            echo '<p class="alert">Connection failed. ' . $e->getMessage() . '</p>';
        }      
    }