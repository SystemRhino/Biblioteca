<?php
$tamanho = strlen($_POST['nr_rm']);
if ($tamanho !== 5) {
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Digite seu RM corretamente!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}else{
try {
  include('conecta.php');

  $stmt = $conn->prepare('INSERT INTO tb_usuario (nm_usuario,ds_login,ds_senha,ds_imagem,dt_nascimento,nr_RM) VALUES(:nm_usuario, :ds_login, :ds_senha, :ds_imagem, :dt_nascimento, :nr_RM)');
  $stmt->execute(array(
    ':nm_usuario' => $_POST['nm_usuario'],
    ':ds_login' => $_POST['ds_login'],
    ':ds_senha' => $_POST['ds_senha'],
    ':ds_imagem' => $_POST['ds_imagem'],
    ':dt_nascimento' => $_POST['dt_nascimento'],
    ':nr_RM' => $_POST['nr_rm']
  ));
session_start();
$_SESSION['sessao'] = "1";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
} catch(PDOException $e) {
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Algo deu errado!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
}
?>