<?php
try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_livro (nm_livro,nr_pagina,id_editora,dt_lancamento,ds_descricao,nr_restricao,ds_sinopse,st_disponibilidade,ds_imagem,ds_video,ds_sumario,ds_audio,id_coletanea) VALUES(:nm_livro, :nr_pagina, :id_editora, :dt_lancamento, :ds_descricao, :nr_restricao, :ds_sinopse, :st_disponibilidade, :ds_imagem, :ds_video, :ds_sumario, :ds_audio, :id_coletanea)');
  $stmt->execute(array(
    ':nm_livro' => $_POST['nm_livro'],
    ':nr_pagina' => $_POST['nr_pagina'],
    ':id_editora' => $_POST['id_editora'],
    ':dt_lancamento' => $_POST['dt_lancamento'],
    ':ds_descricao' => $_POST['ds_descricao'],
    ':nr_restricao' => $_POST['nr_restricao'],
    ':ds_sinopse' => $_POST['ds_sinopse'],
    ':st_disponibilidade' => $_POST['st_disponibilidade'],
    ':ds_imagem' => $_POST['ds_imagem'],
    ':ds_video' => $_POST['ds_video'],
    ':ds_audio' => $_POST['ds_audio'],
    ':ds_sumario' => $_POST['ds_sumario'],
    ':id_coletanea' => $_POST['id_coletanea'],
  ));
include("sucess.php");
echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>