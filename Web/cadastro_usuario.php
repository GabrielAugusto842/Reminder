<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
         $(".fechar").click(function(){
                $(".container_modal").fadeOut(1000);
         });

    });
</script>
</head>
<body>
    <div style="overflow: auto;">
        <p class="titulo1" style="margin: 25px 0px 25px 0px;">Cadastro de Usuário</p>
    </div>
    <div class="container_form" style="margin:  0px auto; width: 400px;">
        <form action="login.php" method="post" name="frmCadastro">
            <div class="row">
                <div class="col-25">
                    <label for="lnome">Nome:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-100" style="margin-top:0px;">
                    <input type="text" id="lnome" name="txtNome" required placeholder="Digite seu nome...">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lemail">E-mail:</label>
                </div>
                <div class="col-100" style="margin-top:0px;">
                    <input type="email" id="lemail" name="txtEmail" required placeholder="Digite seu e-mail...">
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="lsenha">Senha:</label>
                </div>
                <div class="col-50">
                    <label for="lrepetirsenha">Repetir senha:</label>
                </div>
                <div class="col-45" style="margin-top:0px;">
                    <input type="password" id="lsenha" name="txtSenha" required placeholder="Digite sua senha...">
                </div>
                <div class="col-50" style="margin-top:0px; margin-left: 5%;">
                    <input type="password" id="lrepetirsenha" name="txtSenha" required placeholder="Repita sua senha...">
                </div>
            </div>
            <div class="row">
                <input type="submit" name="btnRegistrar" style="margin-top: 145px;" value="Registrar">
                <input type="button" style="margin-right: 5px; margin-top: 145px; background-color: darkgray" class="fechar" value="Cancelar">
            </div>
        </form>
    </div>
    
</body>
</html>
