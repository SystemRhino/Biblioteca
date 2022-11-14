<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_autor (nm_autor) VALUES(:nome)');
  $stmt->execute(array(
    ':nome' => $_POST['nm_autor']
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
   ?>