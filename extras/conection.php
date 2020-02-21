<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=fisiotech;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {header('location: extras/offline.php');}
?>