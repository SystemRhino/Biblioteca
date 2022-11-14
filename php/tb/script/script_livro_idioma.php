<?php
try {
  require('conecta.php');
  $stmt = $conn->prepare('INSERT INTO tb_livro_idioma (id_livro,id_idioma) VALUES(:id_livro, :id_idioma)');
  $stmt->execute(array(
    ':id_livro' => $_POST['id_livro'],
    ':id_idioma' => $_POST['id_idioma']
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>