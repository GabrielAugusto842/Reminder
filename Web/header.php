<?php
    require_once("include/dao.php");

    $resultado = UsuarioDAO("selecionarUm",$_SESSION["idUsuarioS"],null,"tbl_usuario");

    $rsUsuario = mysqli_fetch_array($resultado);
?>
<header>
    <div onClick="window.location.href = 'index.php';" class="logo"></div>
    <div class="dropdown">
      <button class="dropbtn titulo2" style="font-size: 13.5px;"><?= $rsUsuario["nome"]?></button>
      <div class="dropdown-content ">
        <a href="#">Meu Perfil</a>
        <a href="index.php?sair">Sair</a>
      </div>
    </div>
</header>
