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
    <title>Sugestão</title>
</head>
<body>
<?php
  include('nav.php');
?>
        <script src="/biblioteca2/js/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
  $("#salvar").click(function(){
    var v1 = $("#ds_livro").val();
    var v2 = $("#isbn").val();
    var v3 = $("#id_usuario").val();
    var v4 = $("#nr_curtida").val();
    var v5 = $("#nr_descurtida").val();
    var v6 = $("#nm_livro").val();
    var v7 = $("#isbn").val();
    $.ajax({
    url: "./script/script_sujestao.php",
    type: "POST",
    data: "ds_livro="+v1+"&isbn="+v2+"&id_usuario="+v3+"&nr_curtida="+v4+"&nr_descurtida="+v5+"&nm_livro="+v6+"&isbn="+v7,
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
    $("#ds_livro").val("");
    $("#isbn").val("");
    $("#nr_curtida").val("");
    $("#nr_descurtida").val("");
    $("#nm_livro").val("");
    $("#isbn").val("");
    });
  $("#cancelar").click(function(){
    $("#ds_livro").val("");
    $("#isbn").val("");
    $("#nr_curtida").val("");
    $("#nr_descurtida").val("");
    $("#nm_livro").val("");
    $("#isbn").val("");
    });
});
        </script>

<h2>Sugestão</h2>
<table>
    <tr>
    <th>ID Sugestão</th>
    <th>nome do Livro</th>
    <th>Descrição</th>
    <th>ID Usuario</th>
    <th>Numero de Curtida</th>
    <th>Numero de Descurtidas</th>
    <th>ISBN</th>
  </tr>
<?php
try {
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_sugestao");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td><?php echo $lista['id'];?></td>
    <td><?php echo $lista['nm_livro'];?></td>
    <td><?php echo $lista['ds_livro'];?></td>
    <td><?php echo $lista['id_usuario'];?></td>
    <td><?php echo $lista['nr_curtida'];?></td>
    <td><?php echo $lista['nr_descurtida'];?></td>
    <td><?php echo $lista['isbn'];?></td>
    <td><a id="deletar" type="button" class="btn btn-danger btn-sm" href="deletar.php?tb=tb_sugestao&&id=<?php echo $lista['id'];?>">Deletar</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Sugestão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="nm_livro" placeholder="Nome do livro">
        <input type="text" class="form-control" id="ds_livro" placeholder="Descrição do livro">
        <input type="number" class="form-control" id="isbn" placeholder="ISBN">
        <select id="id_usuario" class="form-select" aria-label="Default select example">
  <option>Selecione o usuario</option>
<?php
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_usuario");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
<option value="<?php echo $lista['id']?>"><?php echo $lista['nm_usuario']?></option>
<?php
  }
?>
</select>
        <input type="number" class="form-control" id="nr_curtida" placeholder="Numero de curtidas">
        <input type="number" class="form-control" id="nr_descurtida" placeholder="Numero de descurtidas">
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