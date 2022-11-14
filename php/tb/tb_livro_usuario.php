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
    <title>Livro Usuario</title>
</head>
<body>
<?php
  include('nav.php');
?>
        <script src="/biblioteca2/js/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
    var r;
    $("#st_nao_recomendo").change(function(){
        v5 = $(this).val();
    });
  $("#salvar").click(function(){
    var v1 = $("#nr_avalicao").val();
    var v2 = $("#id_usuario").val();
    var v3 = $("#id_livro").val();
    var v4 = $("#ds_comentario").val();
    var v6 = $("#id_status_livro").val();
    var v7 = $("#st_favorito").val();
    var v8 = $("#id_livro").val();
    $.ajax({
    url: "./script/script_livro_usuario.php",
    type: "POST",
    data: "nr_avalicao="+v1+"&id_usuario="+v2+"&id_livro="+v3+"&ds_comentario="+v4+"&st_nao_recomendo="+v5+"&id_status_livro="+v6+"&st_favorito="+v7+"&id_livro="+v8,
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
    $("#nm_autor").val("");
    });
  $("#cancelar").click(function(){
    $("#nm_autor").val("");
    });
});
        </script>

<h2>Livro Usuario</h2>
<table>
    <tr>
    <th>ID Avaliação Livro Usuario</th>
    <th>Numero de Avaliação</th>
    <th>ID Usuario</th>
    <th>ID Livro</th>
    <th>Comentário</th>
    <th>Não Recomendo</th>
    <th>ID Status Livro</th>
    <th>Favorito</th>
    <th>ID Livro</th>
  </tr>
<?php
try {
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_livro_usuario");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td><?php echo $lista['id'];?></td>
    <td><?php echo $lista['nr_avaliacao_usuario'];?></td>
    <td><?php echo $lista['id_usuario'];?></td>
    <td><?php echo $lista['id_livro'];?></td>
    <td><?php echo $lista['ds_comentario'];?></td>
    <td><?php echo $lista['st_nao_recomendo'];?></td>
    <td><?php echo $lista['id_status_livro'];?></td>
    <td><?php echo $lista['st_favorito'];?></td>
    <td><?php echo $lista['id_livro'];?></td>
    <td><a id="deletar" type="button" class="btn btn-danger btn-sm" href="deletar.php?tb=tb_livro_usuario&&id=<?php echo $lista['id'];?>">Deletar</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Livro Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="number" class="form-control" id="nr_avalicao" placeholder="Numero de avaliação">
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
<select id="id_livro" class="form-select" aria-label="Default select example">
  <option>Selecione o livro</option>
<?php
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_livro");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
<option value="<?php echo $lista['id']?>"><?php echo $lista['nm_livro']?></option>
<?php
  }
?>
</select> 
        <input type="text" class="form-control" id="ds_comentario" placeholder="Comentario">    
        <input type="radio"  id="st_nao_recomendo" value="Nao Recomendo"> Não Recomendar <br>
<select id="id_status_livro" class="form-select" aria-label="Default select example">
  <option>Selecione o status</option>
<?php
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_status_livro");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
<option value="<?php echo $lista['id']?>"><?php echo $lista['ds_status']?></option>
<?php
  }
?>
</select> <br>
        <input type="checkbox" id="st_favorito"> Favoritar   
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