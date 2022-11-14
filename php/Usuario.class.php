<?php
if (!isset($_SESSION)) {
	session_start();
}
class Usuario{
	
	public function login($login, $senha){
		global $conn;

		$sql = "SELECT * FROM tb_usuario WHERE ds_login = :login AND ds_senha = :senha";
		$sql = $conn->prepare($sql);
		$sql->bindValue("login", $login);
		$sql->bindValue("senha", $senha);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['ds_login'] = $dado['ds_login'];
			$_SESSION['nivel'] = $dado['id_nivel'];
			return true;
		}else{
			return false;
		}
	}
}
?>