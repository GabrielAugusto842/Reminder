<?php

    require_once("include/dao.php");

	if(isset($_POST["btnEntrar"])){
		
		$ref;
		
		$ref = usuarioDAO("autenticar",null,"frmLogin","tbl_usuario");
		
		if($ref == 1){
			header("location:index.php");
		}else{
			echo('<script> alert("Usuario ou senha incorreto"); </script>');
		}
	}

    if(isset($_POST["btnRegistrar"])){
        UsuarioDAO("inserir",null,"frmCadastro");   
    }


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="css/style_login.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="img/logo/favicon.png"/>
<script src="js/jquery.min.js"></script>
<script>
    
    <?php
    if(isset($_GET["erro"])){
        
    ?>
    
        $(document).ready(function(){
           $(document).ready(function(){
              $(".container_modal").fadeIn(1000);
               
               $.ajax({
            type: "POST",
            url: "cadastro_usuario.php",
            success: function(dados){
                $('.modal_cadastro').html(dados);
            }
        });
           });

    });
    
    <?php
    }
    ?>
    
    $(document).ready(function(){
       $(".link").click(function(){
          $(".container_modal").fadeIn(1000);
       });

    });

    function modal(){
        $.ajax({
            type: "POST",
            url: "cadastro_usuario.php",
            success: function(dados){
                $('.modal_cadastro').html(dados);
            }
        });

    }
</script>
</head>
<body>
    <div class="container_modal">
        <div class="modal_cadastro"></div>
    </div>

	<article id="content">
        <div class="container_login">
            <div class="container_logo" style="margin-top: 20px;">
                <img src="img/logo/logo_600x300.png" style="height: 100px; width=200px" alt="reminder logo">
            </div>
            <form action="login.php" method="post" name="frmLogin">
                <div class="row" style="margin-top: 20px; margin-left: 2.5px;">
                  <div class="col-100">
                    <input  required type="email" id="fname" name="txtEmail" placeholder="Digite seu email..">
                  </div>
                </div>
                <div class="row" style="margin-top: 3px; margin-left: 2.5px;">
                  <div class="col-100">
                    <input required type="password" id="fname" name="txtSenha" placeholder="Digite sua senha..">
                  </div>
                </div>
                <div class="row" style="margin-top: 15px; margin-left: 2.5px;">
                    <input type="submit" value="Entrar" name="btnEntrar" style=" width: 100%; float: left;">
                </div>
                <div>
                   <p class="texto1" style=" margin-top: 15px; text-align: center">Organize sua vida</p><a class="link" onclick="modal();" style="display: block; margin: 0px auto; text-align: center">Cadastre-se</a>
                </div>
            </form>
        </div>
	</article>
</body>
</html>
