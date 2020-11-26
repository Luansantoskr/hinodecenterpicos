<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/pagamento.php";

$id = $_POST['id_pagamento'];

$obj = new pagamento();
echo $obj->excluirPagamento($id);

?>