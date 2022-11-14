<?php
	try {
  require('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_coletanea (nm_coletanea,id_tipo) VALUES(:nome, :tipo)');
  $stmt->execute(array(
    ':nome' => $_POST['nome_coletanea'],
    ':tipo' => $_POST['id_tipo']
  ));
  include("sucess.php");
  echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>