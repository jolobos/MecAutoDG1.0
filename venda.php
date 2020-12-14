<?php

$nivel=1;
require_once('../database.php');
require_once('../verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
if(!empty($_GET['cancelar'])){
	unset($_SESSION['list_pr']);
	unset($_SESSION['list_cl']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tela de Vendas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<link href="../css/config.estilo.css" rel="stylesheet">
	<script type="text/javascript" src="func_cl.js"></script>
	<script type="text/javascript" src="func_pr.js"></script>

		
</head>

<body>
<input type="checkbox" id="check">
<label for="check" id="icone">
<img src="../img/menu_lat.png" style="width: 40px">
</label >
<div class="barra">
<nav>
<ul><li><a href=""><input type="button" class="link" value="tela principal"></a></li></ul>
<ul><li><a href=""><input type="button" class="link" value="Vender Produtos"></a></li></ul>
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
<ul><li><a href="../sair.php"><input type="button" class="link" value="sair"></a></ul>


</nav>
</div>
	</br>
	</br>
	</br>
	</br>
	</br>

	
<div  >
<form method="post"  action="?act_pr=up">
       <div align="center" >  <table border="3" style="color: white;background-color: rgba(0,0,5,0.80)">   <thead ><tr><th colspan="6" align="left">   <label>Selecione um cliente: </label>
            <input type="text" placeholder="Digite o nome do cliente" id="busca"  onKeyUp="buscarprodutos(this.value)">
            <a href="../clientes/cadastrar_clientes.php">
				<input type="button" class="btn2"style="background-color:cadetblue " value="cadastrar cliente" style="width: 150px" ></a>
            </br>
			<div  id="resultado">
	
			</div>
            </br>
            <label>Selecione um produto:</label>  
            <input type="text" name="1" placeholder="Digite o nome do produto" onKeyUp="buscarprodutos1(this.value)">
			<div id="resultado1">
			</div>
            </br>
             <label>Lista da Venda:</label> 
           
                
		   </th></tr>  <tr><th colspan="2">cliente:     
					 <?php
					 
					 if(!empty($_GET['act_cl'])){
	$id1=$_GET['act_cl'];

if(!isset($_SESSION['list_cl'][$id1])){
	$_SESSION['list_cl']=array();
if(!isset($_SESSION['list_cl'][$id1])){
	
    $_SESSION['list_cl'][$id1]=$id1;
		  }
	
	}

	foreach($_SESSION['list_cl'] as $i){
		$sql1 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta = $conexao->prepare($sql1);
        $consulta->execute(array($i));
		$dados_cl= $consulta->fetch(PDO::FETCH_ASSOC);
		
		$_SESSION['nome_cl'] = $dados_cl['nome'];
		$_SESSION['CPF_cl'] = $dados_cl['CPF'];}
		$nome= $_SESSION['nome_cl'];
		$CPF= $_SESSION['CPF_cl'];
		
echo '<input type="text" value="'.$nome.'" style="background: transparent;color: white;text-align: center;" size="40" >';
 
echo '</th>
                         <th colspan="4">CPF/CNPJ:
<input type="text" value="'.$CPF.'" style="background: transparent;color: white;text-align: center;" size="20" >';

		
}else{
	if(!empty($_SESSION['list_cl'])){
	echo '<input type="text" value="'.$_SESSION['nome_cl'].'" style="background: transparent;color: white;text-align: center;" size="40" >';
 
echo '</th>
                         <th colspan="4">CPF/CNPJ:
<input type="text" value="'.$_SESSION['CPF_cl'].'" style="background: transparent;color: white;text-align: center;" size="20" >';
	
	}else{
	echo '<input type="text" value="Cliente não selecionado" style="background: transparent;color: white;text-align: center;" size="40" >';
 
echo '</th>
                         <th colspan="4">CPF/CNPJ:
<input type="text" value="???????????" style="background: transparent;color: white;text-align: center;" size="20" >';

}}
		
     ?>                    </th></tr>
                     <tr><th colspan="6">Lista dos produtos</th></tr></thead>
             <tbody align="center"><tr><td style="width: 200px">código do produto</td>
			 <td style="width:400px">produtos</td>
             <td style="width: 100px">quantidade</td>
			 <td style="width: 100px">valor unidade</td>
             <td style="width: 100px">valor somado</td>
             <td>Ação</td></tr>
             <?php
			
	if(!isset($_SESSION['list_pr'])){
	$_SESSION['list_pr']=array();}			 
				 
if(isset($_GET['act_pr'])){
					 if($_GET['act_pr']=='add'){
						 $id3= intval($_GET['id_pr']);
						 if(!isset($_SESSION['list_pr'][$id3])){
							 $_SESSION['list_pr'][$id3]=1;
						 }else{
							 $_SESSION['list_pr'][$id3]+=1;
						 }
					 }
	if($_GET['act_pr']=='del'){
						 $id3= intval($_GET['id_pr']);
						 if(isset($_SESSION['list_pr'][$id3])){
							 unset($_SESSION['list_pr'][$id3]);
						 }
	
				 }

	if($_GET['act_pr'] == 'up'){
				if(is_array($_POST['prod'])){
					foreach($_POST['prod'] as $id3 => $qtd){
						$id = intval($id3);
						$qtd = intval($qtd);
						if(!empty($qtd) || $qtd <> 0 ){
						$_SESSION['list_pr'][$id3] = $qtd;
							}else{
						unset($_SESSION['list_pr'][$id3]);	
								}
							}}}


}
	$qtd_total =0;
	 $total=0;
  if(count($_SESSION['list_pr'])==0){
	  echo '<tr><td align="center" colspan="6">nenhum produto selecionado</td></tr>';
	  }else{

	foreach($_SESSION['list_pr'] as $p=>$qtd){
		$sql2 = "SELECT * FROM produtos WHERE id_produto = ?";
		$consulta2 = $conexao->prepare($sql2);
        $consulta2->execute(array($p));
		$dados_pr= $consulta2->fetch(PDO::FETCH_ASSOC);
		
	$cod_prod	= $dados_pr['cod_prod'];
	$produto	 = $dados_pr['produto'];
	$valor	= $dados_pr['valor'];
	$qtd_total +=$qtd;	
	 $valor_somado= $valor*$qtd;
		$total+= $valor_somado;
		echo '<tr style="height:25px"><td>'.$cod_prod.'</td><td>'.$produto.'</td>
             <td><input type="number" name="prod['.$p.']" value="'.$qtd.'" style="width:50px"> </td>
			 <td>'.number_format($valor,2, ',','').'</td>
			 <td>'.number_format($valor_somado,2, ',','').'</td>
			 <td><input type="submit"  style="background-color:gray; height:20px;width:70px"  value="atualizar">
			 <a href="?act_pr=del&id_pr='.$p.'"><input type="button"  style="background-color:cadetblue; height:20px;width:70px" value="remover"></a></td></tr>';
			 
	}}
						 
            
			 
             echo '<tr><td colspan="3">Quantidade de produtos:
             <input type="text" value="'.$qtd_total.'" style="background: transparent;color: white;text-align: center;" size="3" >
                </td><td colspan="3">
             Valor Total da venda:<input type="text" value="'.number_format($total,2, ',', '').'" style="background: transparent;color: white;text-align: center;" size="10" >
             </td>
             </tr>'
              ?>
            
            
           
        
            </form> 
				
	  <tr><td colspan="6">
  </br></br></br>
			
			
 <form align="right"action="concluir_venda.php" method="post"><a href="?cancelar=1">
				<input type="button"  class="btn2" style="background-color: crimson;" value="cancelar a compra" ></a>
	 <input type="submit"  class="btn2" value="Concluir a compra" ></form> </br></td></tr></tbody>
			   </table></br></div></div>

<footer align="center">&copy; Josias S. de Azevedo 2020</footer>  
</body>
</html>
