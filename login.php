<?php
session_start();
if (isset($_SESSION['ds_login'])) {
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
  <title>Login</title>
  <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="style.css">

</head>
<body>

<script src="/biblioteca2/js/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
  $("button").click(function(){
    var v1 = $("#login").val();
    var v2 = $("#senha").val();
    $.ajax({
    url: "./php/check.php",
    type: "POST",
    data: "login="+v1+"&senha="+v2,
    dataType: "html"

    }).done(function(resposta) {
        $("#resp").html(resposta);

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

      <h2 class="form-signin-heading">Login</h2>
      <p id="resp"></p>  
      <input type="text" class="form-control" id="login" placeholder="User" required="" autofocus="" />
      <input type="password" class="form-control" id="senha" placeholder="Password" required=""/>      
      <button class="btn btn-lg btn-success btn-block">Login</button><br>   
    <a style="font-weight: 700; color: green;" href="cadastrar.php" onclick="<?php session_destroy();?>">Não tem uma conta? Faça seu cadastro</a>
    </div>
  </div>
<!-- partial -->
  
</body>
</html>
<?php
}
?>