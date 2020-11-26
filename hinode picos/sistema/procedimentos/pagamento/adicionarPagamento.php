<?php 

session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/pagamento.php";



$data = date("Y-m-d");
$idusuario = $_SESSION['iduser'];
$pagamento = $_POST['pagamento'];


$obj = new pagamento();


$dados=array(
	$idusuario,
	$pagamento,
	$data

);

echo $obj->adicionarPagamento($dados);

 ?>