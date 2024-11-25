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
				  <input type="text" class="form-control" placeholder="Elemento a buscar" name="findData" id="findData">
				  <button class="btn btn-info" type="submit">Buscar</button>
				</div>
			</div>
			<div class="w-25 d-flex justify-content-center">
			    
			</div>
		</div><hr>
		<div id="menu" class="d-flex flex-wrap justify-content-center pl-5 pr-5 border border-2 rounded shadow-lg p-4 mb-4 bg-white" style="height: 200px; margin: 2%;">
			<?php  $this->load->view('Inventario/vwPanelInventario');?>
		</div>
	</section>
</body>
<div class="modal fade" id="nwArticle">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Registro de Inventario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      	<h1>Registro de Inventario</h1>
      	<div id="reader" style="width: 300px; margin: auto;"></div>
      	<form id="registroForm">
      	  <label for="qrResult">Código/QR Escaneado:</label>
      	  <input type="text" id="qrResult" name="qrResult" readonly><br>
      	  <label for="categoria">Categoría:</label>
      	  <select id="categoria" name="categoria">
      	    <option>Equipo de cómputo</option>
      	    <option>Periféricos</option>
      	    <option>Materiales electrónicos</option>
      	  </select><br>
      	  <label for="ubicacion">Ubicación:</label>
      	  <select id="ubicacion" name="ubicacion">
      	    <option>Laboratorio 1</option>
      	    <option>Laboratorio 2</option>
      	    <option>Aula</option>
      	  </select><br>
      	  <label for="estado">Estado:</label>
      	  <select id="estado" name="estado">
      	    <option>Nuevo</option>
      	    <option>Usado</option>
      	    <option>Defectuoso</option>
      	  </select><br>
      	  <button type="submit">Registrar</button>
      	</form>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
	function nwArticle(){
		$('#nwArticle').modal('show');
	}
	const qrCodeSuccessCallback = (decodedText, decodedResult) => {
      document.getElementById('qrResult').value = decodedText;
    };
    const html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start({ facingMode: "environment" }, { fps: 10 }, qrCodeSuccessCallback);
  </script>
</script>

