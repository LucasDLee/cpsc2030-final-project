<?php
    include 'connect-database.php';
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    
    $valid = true;
    function validate($field) {
        global $valid;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_format = "/[A-Za-z]/"; //will fail if there is a non-Latin language name or numbers in the name

            if('name' == $field) {
                $check_name = preg_match($name_format, $_POST[$field]);
                if($_POST[$field] == '') {
                    echo '<label class="alert">Please input your name.</label>';
                    $valid = false;
                } else if(!$check_name) {
                    echo '<label class="alert">Your name must have letters.</label>';
                    $valid = false;
                }
            } else if('inquiry' == $field && $_POST[$field] == '') {
                echo '<label class="alert">Please input a question or add some advice.</label>';
                $valid = false;    
            }
        }
    }

    function submit() {
        global $valid;
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $valid) {
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
    }