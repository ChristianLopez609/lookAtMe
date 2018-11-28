<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'lockatme2';

    try {
        $connetion = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    } catch (PDOException $error){
        die('Connected Failed: ' .$error->getMessage());
    }
?>