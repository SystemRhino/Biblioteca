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
    <title>Livro</title>
</head>
<body>
<?php
  include('nav.php');
?>
        <script src="/biblioteca2/js/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
    var r;
    $("#r1").change(function(){
        r = $(this).val();
    });
    $("#r2").change(function(){
        r = $(this).val();
    });
  $("#salvar").click(function(){
    var v1 = $("#nm_livro").val();
    var v2 = $("#id_editora").val();
    var v3 = $("#dt_lancamento").val();
    var v4 = $("#ds_descricao").val();
    var v5 = $("#nr_restricao").val();
    var v6 = $("#ds_sinopse").val();
    var v7 = $("#ds_imagem").val();
    var v8 = $("#ds_video").val();
    var v9 = $("#ds_audio").val();
    var v10 = $("#ds_sumario").val();
    var v11 = $("#id_coletanea").val();
    var v12 = $("#nr_pagina").val();
    $.ajax({
    url: "./script/script_livro.php",
    type: "POST",
    data: "nm_livro="+v1+"&id_editora="+v2+"&dt_lancamento="+v3+"&ds_descricao="+v4+"&nr_restricao="+v5+"&ds_sinopse="+v6+"&st_disponibilidade="+r+"&ds_imagem="+v7+"&ds_video="+v8+"&ds_audio="+v9+"&ds_sumario="+v10+"&id_coletanea="+v11+"&nr_pagina="+v12,
    dataType: "html"

    }).done(function(resposta) {
        $("p").html(resposta + "<br>");

    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);

    }).always(function() {
        console.log("completou");
    });
  });
    $("#limpar").click(function(){
    $("#nm_livro").val("");
    $("#id_editora").val("");
    $("#dt_lancamento").val("");
    $("#ds_descricao").val("");
    $("#nr_restricao").val("");
    $("#ds_sinopse").val("");
    $("#ds_imagem").val("");
    $("#ds_video").val("");
    $("#ds_audio").val("");
    $("#ds_sumario").val("");
    $("#id_coletanea").val("");
    $("#nr_pagina").val("");
    });
  $("#cancelar").click(function(){
    $("#nm_livro").val("");
    $("#id_editora").val("");
    $("#dt_lancamento").val("");
    $("#ds_descricao").val("");
    $("#nr_restricao").val("");
    $("#ds_sinopse").val("");
    $("#ds_imagem").val("");
    $("#ds_video").val("");
    $("#ds_audio").val("");
    $("#ds_sumario").val("");
    $("#id_coletanea").val("");
    $("#nr_pagina").val("");
    });
});
        </script>

<h2>Livro</h2>
<table>
    <tr>
    <th>ID Livro</th>
    <th>Nome</th>
    <th>Páginas</th>
    <th>Data</th>
    <th>Descrição</th>
    <th>Restrição</th>
    <th>Sinopse</th>
    <th>Disponibilidade</th>
    <th>Imagem</th>
    <th>Audio</th>
    <th>Video</th>
    <th>Sumario</th>
    <th>ID coletânea</th>
    <th>ID editora</th>
  </tr>
<?php
try {
include("conecta.php");
$listagem = $conn->prepare("SELECT * FROM tb_livro");
$listagem->execute();
while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td><?php echo $lista['id'];?></td>
    <td><?php echo $lista['nm_livro'];?></td>
    <td><?php echo $lista['nr_pagina'];?></td>
    <td><?php echo $lista['dt_lancamento'];?></td>
    <td><?php echo $lista['ds_descricao'];?></td>
    <td><?php echo $lista['nr_restricao'];?></td>
    <td><?php echo $lista['ds_sinopse'];?></td>
    <td><?php echo $lista['st_disponibilidade'];?></td>
    <td><img src="<?php echo $lista['ds_imagem'];?>" width="100" height="100"></td>
    <td><?php echo $lista['ds_audio'];?></td>
    <td><?php echo $lista['ds_video'];?></td>
    <td><?php echo $lista['ds_sumario'];?></td>
    <td><?php echo $lista['id_coletanea'];?></td>
    <td><?php echo $lista['id_editora'];?></td>
    <td><a id="deletar" type="button" class="btn btn-danger btn-sm" href="deletar.php?tb=tb_livro&&id=<?php echo $lista['id'];?>">Deletar</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Livro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" class="form-control" id="nm_livro" placeholder="Nome do livro">
    <input type="number" class="form-control" id="nr_pagina" placeholder="Numero de Pagina">
    <input type="number" class="form-control" id="id_editora" placeholder="ID da editora">
    <input type="date" class="form-control" id="dt_lancamento">
    <input type="text" class="form-control" id="ds_descricao" placeholder="Descrição">
    <input type="number" class="form-control" id="nr_restricao" placeholder="Restrição">
    <input type="text" class="form-control" id="ds_sinopse" placeholder="Sinopse">
    
    <h3>Disponivel</h3>
    <input type="radio" class="form-control" id="r1" value="Sim" name="st_disponibilidade">Sim
    <input type="radio" class="form-control" id="r2" value="Não" name="st_disponibilidade">Não

    <input type="text" class="form-control" id="ds_imagem" placeholder="Imagem">
    <input type="text" class="form-control" id="ds_video" placeholder="video">
    <input type="text" class="form-control" id="ds_audio" placeholder="Audio">
    <input type="text" class="form-control" id="ds_sumario" placeholder="Sumario">
    <input type="number" class="form-control" id="id_coletanea" placeholder="ID da coletaneaa">
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