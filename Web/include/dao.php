<?php

    session_start();

	require_once("include/function.php");

	$conexao = db_connect("localhost","root","bcd127","db_alcateck");

	function UsuarioDAO( $tipo, $id = null, $form = null, $tabela = null ) {
		
		global $conexao;

		if ( $tipo == "autenticar" ) {

			if ( $form = "frmLogin" ) {

				$ref;

				$txtEmail = $_POST[ "txtEmail" ];
				$txtSenha = md5($_POST[ "txtSenha" ]);

				$sql = "select *from $tabela where email = '".$txtEmail."' and senha = '".$txtSenha."' and ativo = 1";
                
				$resultado = mysqli_query($conexao,$sql);
                
                $rsUsuario = mysqli_fetch_array($resultado);

                if ($rsUsuario["idUsuario"] != null){

                    $_SESSION["idUsuarioS"] = $rsUsuario['idUsuario'];

                    $ref = 1;


                }else{

                    $ref = 0;

                }
            }

            return $ref;
		}

		if ( $tipo == "inserir" ) {
            
			if ( $form == "frmCadastro" ) {
                
                $txtNome = $_POST["txtNome"];
                $txtEmail = $_POST["txtEmail"];
                $txtSenha = $_POST["txtSenha"];
                
                $sql = "insert into tbl_usuario (nome,email,senha,ativo) values('".$txtNome."','".$txtEmail."','".md5($txtSenha)."',1)";
                
                mysqli_query($conexao,$sql);
                
                header("location:login.php");

			}
		}

		if ( $tipo == "atualizar" ) {
			if ( $form == "" ) {

			}
		}

		if ( $tipo == "deletar" ) {
			if ( $form == "" ) {

			}
		}
        
        if($tipo == "selecionarTodos"){
            
        }
        
        if($tipo == "selecionarUm"){
            
            $sql = "select *from $tabela where idUsuario = $id";
            
            $resultado = mysqli_query($conexao,$sql);
            
            return($resultado);
            
        }
	}

    function TarefaDAO( $tipo, $id = null, $form = null, $tabela = null ) {
		
		global $conexao;
        
        if($tipo == "inserir"){
            
            if($form == "frmCadastro"){
                
                $txtTitulo = $_POST["txtTitulo"];
                $txtDescricao = $_POST["txtDescricao"];
                
                $sql = "insert into tbl_tarefa (nome,descr,idUsuario) values('".$txtTitulo."','".$txtDescricao."',$id)";
                
                mysqli_query($conexao,$sql);
			
                 header("location:index.php");
            }
        }
		
		if($tipo == "atualizar"){
			
			if($form == "frmCadastro"){
				
				$txtTitulo = $_POST["txtTitulo"];
                $txtDescricao = $_POST["txtDescricao"];
				
				$sql = "update tbl_tarefa set nome = '".$txtTitulo."', descr = '".$txtDescricao."' where idTarefa = $id and idUsuario = '".$_SESSION['idUsuarioS']."'";
				
				mysqli_query($conexao,$sql);
			
                header("location:index.php");
				
			}
		}
        
        if($tipo == "selecionarTodos"){
            
            $sql = "select * from tbl_tarefa where idUsuario = $id";
            
            $resultado = mysqli_query($conexao,$sql);
            
            return ($resultado);            
        }
		
		if($tipo == "selecionarUm"){
            
            $sql = "select *from $tabela where idTarefa = $id and idUsuario = ".$_SESSION['idUsuarioS']."";
            
            $resultado = mysqli_query($conexao,$sql);
            
            return($resultado);
            
        }
		
		if($tipo == "deletar"){
			
			$sql = "delete from tbl_tarefa where idTarefa = $id";
			
			mysqli_query($conexao,$sql);	
			
			header("location:index.php");
		}
		
		
    }
?>
