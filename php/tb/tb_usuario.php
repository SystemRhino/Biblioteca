<?php
session_start();
if (isset($_SESSION['ds_login'])) {

  if ($_SESSION['nivel'] == 1) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="\biblioteca2\css\style.css">
    <title>Usuario</title>
</head>
<body>
<?php
  include('nav.php');
?>
        <script src="/biblioteca2/js/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
  $("#salvar").click(function(){
    var v1 = $("#nm_usuario").val();
    var v2 = $("#ds_login").val();
    var v3 = $("#ds_senha").val();
    var v4 = $("#id_nivel").val();
    var v5 = $("#dt_nascimento").val();
    var v6 = $("#ds_imagem").val();
    var v7 = $("#nr_rm").val();
    $.ajax({
    url: "./script/script_usuario.php",
    type: "POST",
    data: "nm_usuario="+v1+"&ds_login="+v2+"&ds_senha="+v3+"&id_nivel="+v4+"&dt_nascimento="+v5+"&ds_imagem="+v6+"&nr_rm="+v7,
    dataType: "html"

    }).done(function(resposta) {
        $("p").html(resposta);

    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);

    }).always(function() {
        console.log("completou");
    });
  });
    $("#limpar").click(function(){
    $("#nm_usuario").val("");
    $("#ds_login").val("");
    $("#ds_senha").val("");
    $("#dt_nascimento").val("");
    $("#ds_imagem").val("");
    $("#nr_rm").val("");
    });
  $("#cancelar").click(function(){
    $("#nm_usuario").val("");
    $("#ds_login").val("");
    $("#ds_senha").val("");
    $("#dt_nascimento").val("");
    $("#ds_imagem").val("");
    $("#nr_rm").val("");
    });
});
        </script>

<h2>Usuario</h2>
<table>
    <tr>
    <th>ID Usuario</th>
    <th>Nome Usuario</th>
    <th>Login</th>
    <th>Senha</th>
    <th>RM</th>
    <th>Imagem</th>
    <th>Nivel</th>
    <th>Data</th>
  </tr>
<?php
try {
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_usuario");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td><?php echo $lista['id'];?></td>
    <td><?php echo $lista['nm_usuario'];?></td>
    <td><?php echo $lista['ds_login'];?></td>
    <td><?php echo $lista['ds_senha'];?></td>
    <td><?php echo $lista['nr_RM'];?></td>
    <td><img src="<?php echo $lista['ds_imagem'];?>" widht="100" height="100"> </td>
    <td><?php echo $lista['id_nivel'];?></td>
    <td><?php echo $lista['dt_nascimento'];?></td>
    <td><a id="deletar" type="button" class="btn btn-danger btn-sm" href="deletar.php?tb=tb_usuario&&id=<?php echo $lista['id'];?>">Deletar</a></td>
  </tr>
<?php
  }
  } catch(PDOException $e) {
    include('erro.php');
}
?>
</table>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Adicionar Registros
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <p></p>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="nm_usuario" placeholder="Nome Usuario">
        <input type="text" class="form-control" id="ds_login" placeholder="Login">
        <input type="password" class="form-control" id="ds_senha" placeholder="Senha">
        <input type="number" class="form-control" id="nr_rm" placeholder="RM">
        <input type="text" class="form-control" id="ds_imagem" placeholder="Imagem">
<select id="id_nivel" class="form-select" aria-label="Default select example">
  <option>Selecione o nivel</option>
<?php
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_nivel");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
<option value="<?php echo $lista['id']?>"><?php echo $lista['nm_nivel']?></option>
<?php
  }
?>
</select>
        <input type="date" class="form-control" id="dt_nascimento">
      </div>
      <div class="modal-footer">
        <button id="cancelar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="limpar" type="button" class="btn btn-danger">Limpar</button>
        <button id="salvar" type="button" class="btn btn-success">Salvar Alterações</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php
  }else{
    header('location:/biblioteca2/');
    }
}else{
  header('location:/biblioteca2/');
}
?>