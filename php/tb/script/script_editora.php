<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_editora (nm_editora) VALUES(:nm_editora)');
  $stmt->execute(array(
    ':nm_editora' => $_POST['nome_editora']
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
    include("erro.php");
}
?>