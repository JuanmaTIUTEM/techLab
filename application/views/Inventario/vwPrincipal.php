<style>
	.w-90{
		background-color: lightgrey;
		margin: 5%;
		
		
	}
	.pl-10{
		padding-left: 10%;
	}
	.pr-10{
		padding-right: 10%;
	}
	.pl-5{
		padding-left: 5%;
	}
	.pr-5{
		padding-right: 5%;
	}
</style>
<body class="d-flex flex-column bg-success">
	<?php $this->load->view('Templates/navBar'); ?>
	<section class="d-flex flex-column justify-content-around w-90 rounded shadow">
		<div id="invTitle" class="text-center pl-10 pr-10">
			<h4>Inventario Laboratorios TIC's <hr></h4>
		</div>
		<div id="menu" class="d-flex flex-wrap justify-content-between pl-5 pr-5">
			<div class="w-25">
							
			</div>
			<div class="w-50">
				<div class="input-group mb-3">
				  <input type="text" class="form-control" placeholder="Dato a buscar" name="findData" id="findData">
				  <button class="btn btn-info" type="submit">Buscar</button>
				</div>
			</div>
			<div class="w-25 d-flex justify-content-center">
				<div><button type="button" class="btn btn-outline-success">Nuevo</button></div>
			</div>
		</div><hr>
		<div id="menu" class="d-flex flex-wrap justify-content-center pl-5 pr-5 border border-2 rounded shadow-lg p-4 mb-4 bg-white" style="height: 200px; margin: 2%;">
			<?php  $this->load->view('Inventario/vwPanelInventario');?>
		</div>
	</section>
</body>
