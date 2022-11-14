<?php
try {
  require('conecta.php');
  $stmt = $conn->prepare('INSERT INTO tb_livro_usuario (nr_avaliacao_usuario,id_usuario,ds_comentario,st_nao_recomendo,id_status_livro,st_favorito, id_livro) VALUES(:nr_avaliacao_usuario, :id_usuario, :ds_comentario, :st_nao_recomendo, :id_status_livro, :st_favorito, :id_livro)');
  $stmt->execute(array(
    ':nr_avaliacao_usuario' => $_POST['nr_avalicao'],
    ':id_usuario' => $_POST['id_usuario'],
    ':ds_comentario' => $_POST['ds_comentario'],
    ':st_nao_recomendo' => $_POST['st_nao_recomendo'],
    ':id_status_livro' => $_POST['id_status_livro'],
    ':st_favorito' => $_POST['st_favorito'],
    ':id_livro' => $_POST['id_livro'],
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>