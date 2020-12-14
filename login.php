<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once('database.php');

if(empty($_POST)){
	$msg = 'campos do formulario estao vazios!';
	} else{
		
		if($_POST['usuario']!='' and $_POST['senha']!='' and isset($_POST['usuario']) and isset($_POST['senha'])){
			$usuario = $_POST['usuario'];
			
			
			
			$sql = 'SELECT * FROM usuarios WHERE usuario=?';
			$consulta = $conexao->prepare($sql);
			$consulta->execute(array($usuario));
			$dado = $consulta->fetch(PDO::FETCH_ASSOC);
			$res = $consulta->rowCount();
			$senha = md5($_POST['senha']);
			
			if($res==1){
				if($senha==$dado['senha']){
				$msg= 'Bem vindo!';
				$_SESSION['usuario'] = $dado['usuario'];
				$_SESSION['id_usuario'] = $dado['id_user'];
				$_SESSION['vida'] = 1000; //segundos
				$_SESSION['decorrido'] = time();
				$_SESSION['nivel'] = $dado['nivel'];

				header('location:tela_principal.php?'.$msg);
				}else{
					$msg='Nome de usuario ou senha invalidos.';
				header('location:login.php?'.$msg);

					}
			}else{
				$msg= 'Nome de usuario ou senha invalidos.';
			header('location:login.php?'.$msg);
			
			}
		
		
		}
	}



/*
dados persistentes(autenticação)
cookies= sao criados no servidor e enviados para o navegador. são arquivos 
que contem dados sobre o usuario(criptografados ou nao).

sessoes(session)= sao criados e armazenados no servidor. sao arquivos que contem dados( criptografados ou nao) dos usuarios.


*/
?>	
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
              <title> MecAutoDG</title>
              <link rel="stylesheet" href="css/config.estilo.css">
              <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        
        </head>
    <body style="background-image: url(img/back.jpg)">
	
	
	
        
    <div class="login">
        <img src="img/imguser.png" class="usuario" width="100" height="100" alt="">
            <h1>Login</h1>
        <form action="login.php" method="post">
            <p>
                usuário
            </p> 
            <input type="text" placeholder="insira seu nome de usuário"name="usuario"></<input > <p>
                Senha
            </p> 
            <input type="password" placeholder="insira sua senha" name="senha"></<input >
        <input type="submit"  value="entrar">
        
      <input type="button" value="Recuperar Senha">
        
        </form>
        </br>
        
       <div>
      <footer >
        <p align="center">&copy; Josias S. de Azevedo 2020</p>
      </footer>
   </div>
    </div>

    

      <hr>
	  <div>
	  
     <?php
	
if(!empty($msg)){
echo '<h1 style="color: red;"align="center">'.$msg.'</h1>';
		
	} 
?></div>
    </body>
</html>
