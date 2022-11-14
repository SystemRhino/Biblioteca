<?php 
include('conecta.php');
$tb = $_GET['tb'];
$id = $_GET['id'];

try {
$deletar = $conn->prepare("DELETE FROM $tb WHERE id='$id'");
$deletar ->execute();
header("location:$tb.php");
} catch(PDOException $e) {
    include('erro.php');
}
?>