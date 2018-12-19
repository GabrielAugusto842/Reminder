<?php
     function db_connect($local, $user, $password, $db_name){
         
         if($con = @mysqli_connect($local,$user,$password,$db_name)){
             return($con);
         }else{
            echo("Erro ao se conectar com o banco, contate o administrador");
        }
     
    }
?>
