<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/pagamento.php";



$obj = new pagamento();



$dados=array(
	$_POST['id_pagamento'],
	$_POST['pagamentoU']

);

echo $obj->atualizarPagamento($dados);

 ?>