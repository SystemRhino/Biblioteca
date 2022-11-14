<?php
try {
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_livro");
$listagem->execute();
} catch(PDOException $e) {
    include('erro.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $lista['nm_livro'];?></title>
</head>
<body>

</body>
</html>
<?php
