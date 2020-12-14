<?php

require_once("../database.php");

 

$valor = $_GET['valor'];
 


  $sql = "SELECT * FROM clientes WHERE nome LIKE '%".$valor."%'";
  $consulta = $conexao->query($sql);
  

 





if(empty($valor)){}else{


	echo '<table border="1"style="width:500px; align:left"><tr><th>Nome</th><th>CPF</th><th>Ação</th></tr>';
  while($lr = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo '<tr><td>'.$lr['nome'].'</td><td>'.$lr['CPF'].'</td><td>
	<a href="venda.php?act_cl='.$lr['id_clientes'].'">
	<input type="button" style="width:80px; height:20px; background-color: chartreuse" value="Selecionar"></a></td></tr>';}
	echo '</table>';
}
	





header("Content-Type: text/html; charset=ISO-8859-1",true);
?>