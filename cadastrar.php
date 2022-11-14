<?php
session_start();
if (isset($_SESSION['ds_login']) or isset($_SESSION['sessao'])) {
  header('location:/biblioteca2/');
}else{
?> 

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Cadastrar</title>
  <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" href="style.css">

</head>
<body>

<script src="/biblioteca2/js/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
  $("button").click(function(){
    var v1 = $("#nm_usuario").val();
    var v2 = $("#ds_login").val();
    var v3 = $("#ds_senha").val();
    var v4 = $("#dt_nascimento").val();
    var v5 = $("#ds_imagem").val();
    var v6 = $("#nr_rm").val();
    $.ajax({
    url: "/biblioteca2/php/tb/script/script_cadastro.php",
    type: "POST",
    data: "nm_usuario="+v1+"&ds_login="+v2+"&ds_senha="+v3+"&dt_nascimento="+v4+"&ds_imagem="+v5+"&nr_rm="+v6,  
    dataType: "html"

    }).done(function(resposta) {
        $("p").html(resposta);

    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);

    }).always(function() {
        console.log("completou");
    });
  });
});
        </script>

<!-- partial:index.partial.html -->

<div class="wrapper">
    <div class="form-signin">
      <p></p>
      <h2 class="form-signin-heading">Cadastro</h2>
        <input type="text" class="form-control" id="nm_usuario" placeholder="Nome Completo">
        <input type="text" class="form-control" id="ds_login" placeholder="Login">
        <input type="password" class="form-control" id="ds_senha" placeholder="Senha">
        <input type="number" class="form-control" id="nr_rm" placeholder="RM">
        <input type="text" class="form-control" id="ds_imagem" placeholder="Imagem">
        <input type="date" class="form-control" id="dt_nascimento">   
      <button class="btn btn-lg btn-success btn-block">Cadastrar</button><br>
      <a style="font-weight: 700; color: green;" href="login.php">Já tem uma conta? Faça login</a>
    </div>
  </div>
<!-- partial -->
  
</body>
</html>
<?php
}
?>

