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
  include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_livro");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
  echo "Idioma: ".$lista['nm_livro']."<br>";
  echo "Idioma: ".$lista['nr_pagina']."<br>";
  echo "Idioma: ".$lista['id_editora']."<br>";
  echo "Idioma: ".$lista['dt_lancamento']."<br>";
  echo "Idioma: ".$lista['ds_descricao']."<br>";
  echo "Idioma: ".$lista['nr_restricao']."<br>";
  echo "Idioma: ".$lista['ds_sinopse']."<br>";
  echo "Idioma: ".$lista['st_disponibilidade']."<br>";
  echo "Idioma: ".$lista['ds_imagem']."<br>";
  echo "Idioma: ".$lista['ds_audio']."<br>";
  echo "Idioma: ".$lista['ds_sumario']."<br>";
  echo "Idioma: ".$lista['id_coletanea']."<br>";
}
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>