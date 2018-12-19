<?php

    $bg = array("floresta","manoalpinista2","manopescador","montanha");

    require_once("include/dao.php");

    if(isset($_GET["sair"])){
        $_SESSION["idUsuarioS"] = null;
    }

	 if(isset($_GET["deletar"])){
		 
		 $id = $_GET["id"];
		 
		 TarefaDAO("deletar",$id);
	 }
    

     if($_SESSION["idUsuarioS"] == null){
        header("location:login.php");
    }
    
    if(isset($_POST["btnRegistrar"])){
        TarefaDAO("inserir",$_SESSION["idUsuarioS"],"frmCadastro");   
    }

	if(isset($_POST["btnAtualizar"])){
		TarefaDAO("atualizar",$_GET["id"],"frmCadastro");  
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<link href="css/style_home.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style_header.css">
	<link rel="stylesheet" type="text/css" href="css/style_footer.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="shortcut icon" href="img/logo/favicon.png" />
    <style>
        body{
            background-image: url(img/bg/<?=$bg[rand(0,3)]?>.jpg);
        }
    </style>
	<script src="js/jquery.min.js"></script>

	<script>
		
		$( document ).ready( function () {
			$( ".item_menu" ).click( function () {
				$( ".container_modal" ).fadeIn( 1000 );
			} );
			
			$( ".editar" ).click( function () {
				$( ".container_modal" ).fadeIn( 1000 );
			} );

		} );

		function modal() {
			$.ajax( {
				type: "POST",
				url: "cadastro_tarefas.php",
				success: function ( dados ) {
					$( '.modal_tarefas' ).html( dados );
				}
			} );

		}
		
		function modalEditar(id) {
			$.ajax( {
				type: "POST",
				url: "cadastro_tarefas.php",
				data : {'id' : id},
				success: function ( dados ) {
					$( '.modal_tarefas' ).html( dados );
				}
			} );
		}
        
	</script>
</head>

<body>
	<?php require_once("header.php"); ?>

	<div class="container_modal">
		<div class="modal_tarefas"></div>
	</div>

	<main>
		<div class="container_home">

			<?php
            
                $resultado = TarefaDAO("selecionarTodos",$_SESSION["idUsuarioS"],null,"tbl_tarefa");
            
                while($rsTarefa = mysqli_fetch_array($resultado)){ ?>

			<div class="container_tarefa bounceIn ">
				<div class="div_titulo">
					<div class="titulo_bloco">
						<h2 class="titulo2"><?= $rsTarefa["nome"]?></h2>
					</div>
                    <div class="container_icone_menu" title="Excluir tarefa">
						<a onClick="return confirm('Deseja realmente excluir ?')" onMouseOver="" href="index.php?deletar&id=<?=$rsTarefa["idTarefa"]?>">
							<img src="img/icons/excluir.png" class="icones">
						</a>
					</div>
					<div class="container_icone_menu" title="Editar tarefa">
						<a class="editar" onClick="modalEditar(<?=$rsTarefa["idTarefa"]?>)">
							<img src="img/icons/editar.png" class="icones">
						</a>
					</div>
				</div>
				<div class="div_descricao">
					<p class="texto1"><?= $rsTarefa["descr"]?></p>
				</div>
			</div>

			<?php } ?>
			
			<div class="menu_flotoante bounceIn">
                <div class="div_titulo">
                    <div class="titulo_bloco">
						<h2 class="titulo2">Menu</h2>
					</div>
                </div>
                <div class="div_menu">
                    <div onClick="modal();" class="item_menu"><span><img class="icone_menu" src="img/icons/adicionar.png" alt="adicionar"></span>Adicionar</div>
                </div>
			</div>

		</div>
	</main>
	<?php require_once("footer.php"); ?>
</body>

</html>