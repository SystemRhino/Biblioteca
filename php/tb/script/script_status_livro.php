<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_status_livro (ds_status) VALUES(:ds_status)');
  $stmt->execute(array(
    ':ds_status' => $_POST['ds_status_livro']
  ));
   include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>