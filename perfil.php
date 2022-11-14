<?php 
session_start();
if (isset($_SESSION['ds_login'])) {
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Perfil</title>
</head>
<body>

</body>
</html>
  <?php
}else{
  header('location:login.php');
}
?>