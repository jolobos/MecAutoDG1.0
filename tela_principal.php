<?php
$nivel=1;
require_once('database.php');
require_once('verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
if(!empty($_SESSION['list_pr'])){
	unset($_SESSION['list_pr']);
	unset($_SESSION['list_cl']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tela de escolha</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<link href="css/config.estilo.css" rel="stylesheet">
		
</head>

<body>
<input type="checkbox" id="check">
<label for="check" id="icone">
<img src="img/menu_lat.png" style="width: 40px">
</label >
<div class="barra">
<nav>
<ul><li><a href=""><input type="button" class="link" value="tela principal"></a></li></ul>
<ul><li><a href="vendas/venda.php"><input type="button" class="link" value="Vender Produtos"></a></li></ul>
<ul><li><a href=""><input type="button" class="link" value="Orçamento de serviços"></a></li></ul>

<ul><li><input type="button" class="link" value="Produtos"><ul class="ul1">
<li><a href=""><input type="button" class="btn1" value="consultar produtos"></a></li>
<li><a href=""><input type="button" class="btn1" value="cadastrar produtos"></a></li>
<li><a href=""><input type="button" class="btn1" value="alterar produtos"></a></li>
<li><a href=""><input type="button" class="btn1" value="congelar produtos"></a></li>
<li><a href=""><input type="button" class="btn1" value="deletar produtos"></a></li>
</ul></li></ul>

<ul><li><input type="button" class="link" value="Clientes"><ul class="ul1">
<li><a href=""><input type="button" class="btn1" value="consultar clientes"></a></li>
<li><a href=""><input type="button" class="btn1" value="cadastrar clientes"></a></li>
<li><a href=""><input type="button" class="btn1" value="alterar clientes"></a></li>
<li><a href=""><input type="button" class="btn1" value="congelar clientes"></a></li>
<li><a href=""><input type="button" class="btn1" value="deletar clientes"></a></li>
</ul></li></ul>

<ul><li><input type="button" class="link" value="Funcionários"><ul class="ul1">
<li><a href=""><input type="button" class="btn1" value="consultar fucionários"></a></li>
<li><a href=""><input type="button" class="btn1" value="cadastrar funcionários"></a></li>
<li><a href=""><input type="button" class="btn1" value="alterar funcionários"></a></li>
<li><a href=""><input type="button" class="btn1" value="congelar funcionários"></a></li>
<li><a href=""><input type="button" class="btn1" value="deletar funcionários"></a></li>
</ul></li></ul>

<ul><li><a href=""><input type="button" class="link" value="Relatórios"></a></li></ul>
<ul><li><a href="sair.php"><input type="button" class="link" value="sair"></a></ul>


</nav>
</div>

</body>
</html>
