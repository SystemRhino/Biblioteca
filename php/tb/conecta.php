<?php
global $conn;
try {
  $conn = new PDO('mysql:host=127.0.0.1:3307;dbname=bd_biblioteca', 'root', 'usbw');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    include('erro.php');
}
?> 