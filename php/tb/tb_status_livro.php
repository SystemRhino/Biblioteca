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
    <title>Status Livro</title>
</head>
<body>
<?php
  include('nav.php');
?>
        <script src="/biblioteca2/js/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
  $("#salvar").click(function(){
    var v1 = $("#ds_status_livro").val();
    $.ajax({
    url: "./script/script_status_livro.php",
    type: "POST",
    data: "ds_status_livro="+v1,
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

<h2>Status Livro</h2>
<table>
    <tr>
    <th>ID Status Livro</th>
    <th>Status</th>
  </tr>
<?php
try {
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_status_livro");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td><?php echo $lista['id'];?></td>
    <td><?php echo $lista['ds_status'];?></td>
    <td><a id="deletar" type="button" class="btn btn-danger btn-sm" href="deletar.php?tb=tb_status_livro&&id=<?php echo $lista['id'];?>">Deletar</a></td>

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
        <h5 class="modal-title" id="exampleModalLabel">Status Livro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <select class="form-control" id="ds_status_livro">
            <option>Disponivel</option>
            <option>Indisponivel</option>
            </select><br>
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