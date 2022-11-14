<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="\biblioteca2\css\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Menu | Biblioteca</title>
</head>
<body>
<?php
session_start();
  include('./php/nav.php');
?>
<div class="row">
<?php
include("./php/conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_livro");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
  <div class="col-sm-3.2">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $lista['ds_imagem'];?>" alt="Card image cap" height="300">
  <div class="card-body">
    <h5 class="card-title"><?php echo $lista['nm_livro'];?></h5>
    <p class="card-text">Numero de Páginas: <?php echo $lista['nr_pagina'];?></p>
    <p class="card-text">Data de lançamento: <?php echo $lista['dt_lancamento'];?></p>
    <a href="livro.php?id=<?php echo $lista['id'];?>" class="btn btn-success">Ver Livro</a>
  </div>
</div>
</div>

<?php 
}
 ?>
 </div>

 <footer class="rodape-prin">
        &copy; Etec 2022  
        </footer>
</body>
</html>