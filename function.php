<?php

function connectToDb(){
    try {
        $pdo = new PDO(
            'mysql:host=127.0.0.1;port=3306;dbname=user_info',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die(); // Stop script execution in case of a database connection error
    }
}

?>