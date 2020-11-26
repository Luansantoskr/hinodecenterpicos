<?php 

class categorias{
	public function adicionarPagamento($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "INSERT into pagamento (id_pagamento, formaPagamento, dataCaptura) VALUES ('$dados[0]', '$dados[1]', 
		   '$dados[2]')";

		return mysqli_query($conexao, $sql);
	}


	public function atualizarPagamento($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "UPDATE pagamento SET formaPagamento = '$dados[1]' where id_pagamento = '$dados[0]'";

		echo mysqli_query($conexao, $sql);
	}


	public function excluirPagamento($id_pagamento){
		$c = new conectar();
		$conexao=$c->conexao();
		

		$sql = "DELETE from pagamento where id_pagamento = '$id_pagamento' ";

		return mysqli_query($conexao, $sql);
	}

}

?>