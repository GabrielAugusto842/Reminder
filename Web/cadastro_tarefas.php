<?php

	 require_once("include/dao.php");

	$txtTitulo = "";
	$txtDesc = "";

	if(isset($_POST["id"])){
		
	
		$resultado = TarefaDAO("selecionarUm",$_POST["id"],null,"tbl_tarefa");
		
		$rsTarefa = mysqli_fetch_array($resultado);
		
		$txtTitulo = $rsTarefa["nome"];
		$txtDesc = $rsTarefa["descr"];

	}
?>
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
        <p class="titulo1" style="margin: 25px 0px 25px 0px;"><?= isset($_POST["id"]) ? "Editar" : "Cadastrar" ?> de Tarefas</p>
    </div>
    <div class="container_form" style="margin:  0px auto; width: 400px;">
        <form action="index.php<?= isset($_POST["id"]) ? "?editar&id=".$_POST["id"]."" : "" ?>" method="post" name="frmCadastro">
            <div class="row">
                <div class="col-25">
                    <label for="ltitulo">Titulo:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-100" style="margin-top:0px;">
                    <input type="text" id="ltitulo" name="txtTitulo" required value="<?=$txtTitulo?>" placeholder="Digite o titulo...">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="ldescricao">Descrição:</label>
                </div>
                <div class="col-100" style="margin-top:0px;">
                    <textarea id="ldescricao" name="txtDescricao"  required placeholder="Digite a descrição.." style="height:200px; resize: none;"><?=$txtDesc?></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="<?= isset($_POST["id"]) ? "btnAtualizar" : "btnRegistrar" ?>" style="margin-top: 50px;" value="<?= isset($_POST["id"]) ? "Atualizar" : "Registrar" ?>">
                <input type="button" style="margin-right: 5px; margin-top: 50px; background-color: darkgray" class="fechar" value="Cancelar">
            </div>
        </form>
    </div>
    
</body>
</html>
