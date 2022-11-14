<?php
try {
  require('conecta.php');
  $stmt = $conn->prepare('INSERT INTO tb_livro_autor (id_livro,id_autor) VALUES(:id_livro, :id_autor)');
  $stmt->execute(array(
    ':id_livro' => $_POST['id_livro'],
    ':id_autor' => $_POST['id_autor']
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>