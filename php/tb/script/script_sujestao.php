<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_sugestao (ds_livro,id_usuario,nr_curtida,nr_descurtida, nm_livro, isbn) VALUES(:ds_livro, :id_usuario, :nr_curtida, :nr_descurtida, :nm_livro, :isbn)');
  $stmt->execute(array(
    ':ds_livro' => $_POST['ds_livro'],
    ':id_usuario' => $_POST['id_usuario'],
    ':nr_curtida' => $_POST['nr_curtida'],
    ':nr_descurtida' => $_POST['nr_descurtida'],
    ':nm_livro' => $_POST['nm_livro'],
    ':isbn' => $_POST['isbn']
  ));
     include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>