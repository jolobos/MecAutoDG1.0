<?php

$nivel=1;
require_once('../verifica_session.php');
require_once('../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');


?>

<!DOCTYPE html>
<html>
<head>
<meta content="charset=utf-8" />
<title>Vendas</title>
<link href="../css/config.estilo.css" rel="stylesheet">
</head>

<body>

<h1 >Vendas</h1>

<br />
 


<div align="center"><button align="center">
<h2 align="center" style="color: cadetblue">Tem certeza que deseja comprar esses itens?</h2></button></div>
<form align="center"  action="pos_venda.php" method="post" >
</br>

<div align="center" >
<table style="background-color: rgba(0,0,5,0.8)" align="center" width="600" border="1" >
<tbody align="center" style="color:white">
<tr>
<td colspan="5"  ><h3> Produtos Selecionados</h3></td>
</tr>



  <tr>
    <th width="100"scope="col">cod. prod</th>
    <th scope="col">produto</th>
    <th scope="col">quantidades</th>
    <th scope="col">valor</th>
     <th width="100"scope="col">vlr somado</th>
      
  </tr>
  <?php
  $qtd_total=0;
  $total=0;
  if(count($_SESSION['list_pr'])==0){
	  echo '<tr><td align="center" class="alert-danger" colspan="6">Selecione algum produto por favor!!!</td></tr>';
	  }else{
	  foreach($_SESSION['list_pr'] as $id => $qtd){
		  
		  
		  
		$sql = "SELECT * FROM produtos WHERE id_produto= ?";
		$consulta = $conexao->prepare($sql);
        $consulta->execute(array($id));
        $ln =$consulta->fetch(PDO::FETCH_ASSOC);
		
		$cod_prod = $ln['cod_prod'];
		$produto = $ln['produto'] ;
		$valor = $ln['valor'];
		$v_somado = $ln['valor'] * $qtd;
		$total += $v_somado;
		$qtd_total +=$qtd;
		echo' <tr>
    <td>'.$cod_prod.'</td>
    <td>'.$produto.'</td>
    <td>'.$qtd.'</td>
    <td>'.number_format($valor,2,',','').'</td>
    <td>'.number_format($v_somado,2,',','').'</td>
  </tr>';
	  }
	  
	  }
	  
  
  
 
  echo'<tr><td align="center" colspan="2"><h3>quantidade de produtos: '.$qtd_total.'</h3></td>';
  echo'<td align="center" colspan="3"><h3>Total R$: '.number_format($total,2,',','').'</h3></td></tr>';



  ?>
  </tbody></table></div>
  
  </br>
  <input class="btn1" style="width:200px"type="submit" value="Concluir Venda"/>

</form>
</br>
</div><div>



</div>

		<div align="center">
		<footer>&copy; 2016 -Josias Santos de Azevedo </footer>
			</p>
		</div>


</body></html>