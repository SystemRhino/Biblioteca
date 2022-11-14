<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_nivel (nm_nivel) VALUES(:nm_nivel)');
  $stmt->execute(array(
    ':nm_nivel' => $_POST['nivel']
  ));
include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>