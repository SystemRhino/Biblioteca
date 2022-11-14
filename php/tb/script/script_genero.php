<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_genero (nm_genero) VALUES(:nm_genero)');
  $stmt->execute(array(
    ':nm_genero' => $_POST['nm_genero']
  ));
 include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
    include("erro.php");
}
?>