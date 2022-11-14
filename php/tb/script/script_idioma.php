<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_idioma (nm_idioma) VALUES(:nm_idioma)');
  $stmt->execute(array(
    ':nm_idioma' => $_POST['nome_idioma']
  ));
   include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>