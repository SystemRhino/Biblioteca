<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_genero_usuario (id_usuario,id_genero) VALUES(:id_usuario, :id_genero)');
  $stmt->execute(array(
    ':id_usuario' => $_POST['id_usuario'],
    ':id_genero' => $_POST['id_genero']
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>"; 
} catch(PDOException $e) {
  include("erro.php");
}
?>