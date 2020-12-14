<?php

require_once("../database.php");

 

$valor = $_GET['valor'];
 


  $sql = "SELECT * FROM produtos WHERE produto LIKE '%".$valor."%'";
  $consulta = $conexao->query($sql);
  

 





if(empty($valor)){}else{


	echo '<table border="1"style="width:500px; align:left"><tr><th>Cod. Produto</th><th>Produtos</th><th>Ação</th></tr>';
  while($lr = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo '<tr><td>'.$lr['cod_prod'].'</td><td>'.$lr['produto'].'</td><td>
	<a href="venda.php?act_pr=add&id_pr='.$lr['id_produto'].'">
	<input type="button" style="width:80px; height:20px; background-color: chartreuse" value="Selecionar"></a></td></tr>';}
	echo '</table>';
}

header("Content-Type: text/html; charset=utf-8;ISO-8859-1",true);
?>