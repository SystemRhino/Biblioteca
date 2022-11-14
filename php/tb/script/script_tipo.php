<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_tipo (nm_tipo) VALUES(:nm_tipo)');
  $stmt->execute(array(
    ':nm_tipo' => $_POST['nome_tipo']
  ));
    include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>