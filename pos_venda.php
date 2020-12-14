<?php
$nivel=0;
//require_once('../relatorios/vendor/autoload.php');
require_once('../verifica_session.php');
require_once('../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');


$data=date("Y/m/d H:i:s");

?>

<!DOCTYPE html>
<html>
<head>
<meta content="charset=utf-8" />
<title>Vendas</title>
<script type="text/javascript" src="funcs.js"></script>

<link href="../css/config.estilo.css" rel="stylesheet">
</head>

<body>
<div class="container"  >
<h1 class="text-info">Venda Concluida!!!</h1>
<br />
<?php
	if(empty($_SESSION['list_cl'])){
	echo '<div align="center"></br><button style="background-color: rgba(0,0,5,0.8) "><h2 style="color: red">Nenhum Cliente Selecionado!!!</h2></button></div>';
	
}else{

foreach($_SESSION['list_cl'] as $i){
		$sql1 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta = $conexao->prepare($sql1);
        $consulta->execute(array($i));
		$dados_cl= $consulta->fetch(PDO::FETCH_ASSOC);
		$cliente = $dados_cl['nome'];
		$CPF = $dados_cl['CPF'];
		$id_cl = $dados_cl['id_clientes'];
		}
}
	
	
	
		if(empty($_SESSION['list_pr'])){
	echo '<div align="center"></br><button style="background-color: rgba(0,0,5,0.8) "><h2 style="color: red">Nenhum Produto Selecionado!!!</h2></button></div>';
	
}else{
	
/* $id_us	= $_SESSION['id_usuario'];
	
		$sql ='INSERT INTO vendas(data,id_cliente,id_usuario) values(?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($data,$id_cl,$id_us));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exce��es
		$ok= False; 
		}
				
		$sql = "SELECT id_venda FROM vendas ORDER BY id_venda DESC LIMIT 1";
		$consulta = $conexao->prepare($sql);
        $consulta->execute(array());
		$lr = $consulta->fetch(PDO::FETCH_ASSOC);
		$id_venda = $lr['id_venda'];


	
foreach($_SESSION['list_pr'] as $id => $qtd){
		  
		$sql ='INSERT INTO itens_venda(id_venda,id_produto,quantidade,data_prod) values(?,?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($id_venda,$id,$qtd,$data));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exce��es
		$ok= False; 
			
		}
			
}
	*/		}

			?>
<br /><div align="center">
<form action="gera_pdf.php" method="post" target="_blank">

<input type="submit"  class="btn2" style="background-color: darkslategray" value="Gerar Comprovante" />
</br>
</br>
</form>
<a href="venda.php"><input type="button" style="background-color: forestgreen"class="btn2"style="" value="Nova Venda"></a>
</br>
</br><a  href="../tela_principal.php"><input type="button" style="background-color: gray" class="btn2"style="" value="Tela Principal"></a>
</br>
</br><a  href="../sair.php"><input type="button" class="btn2" style="background-color: crimson" value="Sair"></a>
</br>
</br></div>

		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			</p>
		</div></div>
</div>

</body>			
