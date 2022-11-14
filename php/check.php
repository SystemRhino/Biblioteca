<?php
if (isset($_POST['login']) && isset($_POST['senha'])) {

	require 'conecta.php';
	require 'Usuario.class.php';

	$u = new Usuario();

$login = $_POST['login'];
$senha = $_POST['senha'];

if ($u->login($login,$senha) == true) {
		echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
}else{
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Usuario ou Senha está incorreto!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
}else{
 echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Usuario ou Senha está incorreto!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
?>