<?php
try {
  include('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_usuario (nm_usuario,ds_login,ds_senha,ds_imagem,id_nivel,dt_nascimento,nr_RM) VALUES(:nm_usuario, :ds_login, :ds_senha, :ds_imagem, :id_nivel, :dt_nascimento, :nr_RM)');
  $stmt->execute(array(
    ':nm_usuario' => $_POST['nm_usuario'],
    ':ds_login' => $_POST['ds_login'],
    ':ds_senha' => $_POST['ds_senha'],
    ':ds_imagem' => $_POST['ds_imagem'],
    ':id_nivel' => $_POST['id_nivel'],
    ':dt_nascimento' => $_POST['dt_nascimento'],
    ':nr_RM' => $_POST['nr_rm']
  ));
include("sucess.php");
echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  include("erro.php");
}
?>