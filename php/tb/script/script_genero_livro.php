<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_genero_livro (id_genero,id_livro) VALUES(:id_genero, :id_livro)');
  $stmt->execute(array(
    ':id_genero' => $_POST['id_genero'],
    ':id_livro' => $_POST['id_livro']
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}

?>