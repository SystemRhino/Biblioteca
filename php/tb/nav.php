<?php

if (isset($_SESSION['ds_login'])) {
  if ($_SESSION['nivel'] == 1) {
    ?>
    <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Menu | Biblioteca</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/biblioteca2/">
    <img src="https://cdn-icons-png.flaticon.com/512/195/195786.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Biblioteca
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/biblioteca2/">Menu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/biblioteca2/perfil.php">Perfil</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tabelas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_autor.php">Autor</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_coletanea.php">Coletanea</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_editora.php">Editora</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_genero.php">Genêro</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_genero_livro.php">Genêro Livro</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_genero_usuario.php">Genêro Usuario</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_idioma.php">Idioma</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_livro.php">Livro</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_livro_autor.php">Livro Autor</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_livro_idioma.php">Livro Idioma</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_livro_usuario.php">Livro Usuario</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_nivel.php">Nivel</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_status_livro.php">Status Livro</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_sugestao.php">Sugestão</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_tipo.php">Tipo</a>
          <a class="dropdown-item" href="/biblioteca2/php/tb/tb_usuario.php">Usuario</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar Livro" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>

</body>
</html>
<?php
  }else{
?>
    <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Menu | Biblioteca</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/biblioteca2/">
    <img src="https://cdn-icons-png.flaticon.com/512/195/195786.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Biblioteca
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/biblioteca2/">Menu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/biblioteca2/perfil.php">Perfil</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar Livro" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>

</body>
</html>
<?php
  }
}else{
  header('location:/biblioteca2/');
}
?>
