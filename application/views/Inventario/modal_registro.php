<!-- Modal -->
  <div class="modal fade" id="nwArticle">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Registro de Inventario</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <h1>Registro de Inventario</h1>
          <div id="reader" class="d-none" style="width: 300px; margin: auto;"></div>
          <video id="cameraView" class="d-none"></video>
          <canvas id="cameraCanvas" class="d-none"></canvas>
          <form id="registroForm">
            <label for="qrResult">Código/QR Escaneado:</label>
            <input type="text" id="qrResult" name="qrResult" readonly class="form-control mb-3">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" class="form-select mb-3" onchange="toggleCableFields()">
              <option value="computo">Equipo de cómputo</option>
              <option value="perifericos">Periféricos</option>
              <option value="materiales">Materiales electrónicos</option>
              <option value="cables">Cables</option>
            </select>
            <div id="cableFields" class="d-none">
              <label for="tipoCable">Tipo de cable:</label>
              <input type="text" id="tipoCable" name="tipoCable" class="form-control mb-3">
            </div>
            <label for="ubicacion">Ubicación:</label>
            <select id="ubicacion" name="ubicacion" class="form-select mb-3">
              <option>Laboratorio 1</option>
              <option>Laboratorio 2</option>
              <option>Aula</option>
            </select>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" class="form-select mb-3">
              <option>Nuevo</option>
              <option>Usado</option>
              <option>Defectuoso</option>
            </select>
            <button type="button" class="btn btn-primary w-100 mb-3" onclick="startCamera()">Iniciar Cámara</button>
            <button type="button" class="btn btn-secondary w-100 mb-3" onclick="selectFromGallery()">Seleccionar de la Galería</button>
            <input type="file" id="fotoElemento" class="d-none" onchange="displaySelectedImage(event)">
            <img id="previewImage" class="d-none">
            <button type="submit" class="btn btn-success w-100">Registrar</button>
          </form>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  	let videoStream;

  	function startQrScanner() {
  	  document.getElementById("reader").classList.remove("d-none");
  	  document.getElementById("qrResult").classList.add("d-none");
  	  const qrCodeSuccessCallback = (decodedText) => {
  	    document.getElementById("qrResult").value = decodedText;
  	    document.getElementById("reader").classList.add("d-none");
  	  };
  	  const html5QrCode = new Html5Qrcode("reader");
  	  html5QrCode.start({ facingMode: "environment" }, { fps: 10 }, qrCodeSuccessCallback);
  	}

  	function toggleCableFields() {
  	  const categoria = document.getElementById("categoria").value;
  	  const cableFields = document.getElementById("cableFields");
  	  cableFields.classList.toggle("d-none", categoria !== "cables");
  	}

  	function startCamera() {
  	  const video = document.getElementById("cameraView");
  	  const canvas = document.getElementById("cameraCanvas");
  	  video.classList.remove("d-none");
  	  canvas.classList.add("d-none");
  	  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
  	    navigator.mediaDevices.getUserMedia({ video: true }).then((stream) => {
  	      videoStream = stream;
  	      video.srcObject = stream;
  	    });
  	  }
  	}

  	function capturePhoto() {
  	  const video = document.getElementById("cameraView");
  	  const canvas = document.getElementById("cameraCanvas");
  	  const context = canvas.getContext("2d");
  	  canvas.width = video.videoWidth;
  	  canvas.height = video.videoHeight;
  	  context.drawImage(video, 0, 0, canvas.width, canvas.height);
  	  videoStream.getTracks().forEach((track) => track.stop());
  	  video.classList.add("d-none");
  	  canvas.classList.remove("d-none");
  	}

  	function selectFromGallery() {
  	  document.getElementById("fotoElemento").click();
  	}

  	function displaySelectedImage(event) {
  	  const file = event.target.files[0];
  	  const preview = document.getElementById("previewImage");
  	  const reader = new FileReader();
  	  reader.onload = () => {
  	    preview.src = reader.result;
  	    preview.classList.remove("d-none");
  	  };
  	  reader.readAsDataURL(file);
  	}

  </script>