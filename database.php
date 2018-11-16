<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'lockatme';

    try {
        $connetion = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    } catch (PDOException $error){
        die('Connected Failed: ' .$error->getMessage());
    }
?>