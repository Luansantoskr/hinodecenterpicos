<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title> Pagamento </title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Formas de pagamento</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmPagamento">
						<label>Forma de pagamento</label>
						<input type="text" class="form-control input-sm" name="pagamento" id="pagamento">
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarPagamento">Adicionar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tabelaPagamentoLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="atualizaPagamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Atualizar forma de pagamento</h4>
					</div>
					<div class="modal-body">
						<form id="frmPagamentoU">
							<input type="text" hidden="" id="id_pagamento" name="id_pagamento">
							<label>Pagamento</label>
							<input type="text" id="pagamentoU" name="pagamentoU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnAtualizaPagamento" class="btn btn-warning" data-dismiss="modal">Salvar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaPagamentoLoad').load("pagamento/tabelaFormaPagamento.php");

			$('#btnAdicionarPagamento').click(function(){

				vazios=validarFormVazio('frmPagamento');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmPagamento').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/pagamento/adicionarPagamento.php",
					success:function(r){
						
						if(r==1){
					//limpar formulário
					$('#frmPagamento')[0].reset();

					$('#tabelaPagamentoLoad').load("pagamento/tabelaFormaPagamento.php");
					alertify.success("Forma de pagamento adicionada com sucesso!");
				}else{
					alertify.error("Não foi possível adicionar a forma de pagamento");
				}
			}
		});
			});
		});
	</script>



	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAtualizaPagamento').click(function(){

				dados=$('#frmPagamentoU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/pagamento/atualizarPagamento.php",
					success:function(r){
						if(r==1){
							$('#tabelaPagamentoLoad').load("pagamento/tabelaFormaPagamento.php");
							alertify.success("Atualizado com Sucesso :)");
						}else{
							alertify.error("Não foi possível atualizar :(");
						}
					}
				});
			});
		});
	</script>



	<script type="text/javascript">

		function adicionarDado(id_pagamento,pagamento){
			$('#id_pagamento').val(id_pagamento);
			$('#pagamentoU').val(pagamento);
		}


		function eliminaPagamento(id_pagamento){
			alertify.confirm('Deseja excluir esta forma de pagamento?', function(){ 
				$.ajax({
					type:"POST",
					data:"id_pagamento=" + id_pagamento,
					url:"../procedimentos/pagamento/eliminarPagamento.php",
					success:function(r){
						if(r==1){
							$('#tabelaPagamentoLoad').load("pagamento/tabelaFormaPagamento.php");
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Não Excluido");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado !')
			});
		}

	</script>




<?php 
}else{
	header("location:../index.php");
}
?>