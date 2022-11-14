<?php
$id = $_GET['id'];
try {
include("./php/conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_livro WHERE id='$id'");
$listagem->execute();
$lista = $listagem->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    include('./php/erro.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title><?php echo $lista['nm_livro'];?></title>
</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col-3">
     <img src="<?php echo $lista['ds_imagem'];?>" class="img-fluid" alt="...">
    </div>
    <div class="col">
      <h2><?php echo $lista['nm_livro'];?></h2>
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>
</body>
</html>