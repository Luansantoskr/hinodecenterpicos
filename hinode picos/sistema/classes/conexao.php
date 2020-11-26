<?php 

class conectar{
	private $servidor = "mysql741.umbler.com";
	private $usuario = "hinodepicos-com";
	private $senha = "9204spfc";
	private $bd = "sistemapicos";

	public function conexao(){
		$conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->bd);

		return $conexao;
	}
}

 ?>