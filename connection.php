<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=products19032024;charset=utf8", 'root', '');
    // echo "Database connection is succesfull";
} catch (PDOException $e) {
    print $e ->getMessage();
}

?>