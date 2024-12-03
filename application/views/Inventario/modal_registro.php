
<script src="https://unpkg.com/html5-qrcode/minified/
html5-qrcode.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Modal HTML -->
<div class="modal fade" id="nwArticle" tabindex="-1" aria-labelledby="nwArticleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="nwArticleLabel">Registro de Inventario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="registroForm" action="<?= site_url('newArticle') ?>" method='POST'>
          <!-- Categoría -->
          <div class="mb-3">
            <label for="categoria" class="form-label">Categoría:</label>
            <select id="categoria" name="categoria" class="form-select" >
                <option value="">Selecciona una categoría</option>
                <?php foreach ($categorias as $categoria) { ?>
                    <option value="<?= $categoria['id_categoria'] ?>" title="<?= $categoria['descripcionCategoria'] ?>">
                        <?= $categoria['nombre_categoria'] ?>
                    </option>
                <?php } ?>
            </select>
          </div>

          <!-- Campos Generales -->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control" >
          </div>

          <!-- Campos específicos según categoría -->
          <div id="categoriaFields">
            <!-- Número de Serie (Herramientas y Equipos) -->
            <div class="mb-3 " id="numeroSerieField">
              <label for="numeroSerie" class="form-label">Número de Serie:</label>
              <input type="text" id="numeroSerie" name="numeroSerie" class="form-control">
            </div>

            <!-- Número de Inventario (Herramientas y Equipos) -->
            <div class="mb-3 " id="numeroInventarioField">
              <label for="numeroInventario" class="form-label">Número de Inventario:</label>
              <input type="text" id="numeroInventario" name="numeroInventario" class="form-control">
            </div>

            <!-- Cantidad (Cables) -->
            <div class="mb-3 " id="cantidadField">
              <label for="cantidad" class="form-label">Cantidad:</label>
              <input type="number" id="cantidad" name="cantidad" class="form-control" value="1" min="1">
            </div>

          <!-- Ubicación -->
          <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación:</label>
            <select id="ubicacion" name="ubicacion" class="form-select">
              <option value="laboratorio1">Laboratorio 1</option>
              <option value="laboratorio2">Laboratorio 2</option>
              <option value="aula">Aula</option>
            </select>
          </div>

          <!-- Estado -->
          <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <select id="estado" name="estado" class="form-select">
              <option value="nuevo">Nuevo</option>
              <option value="usado">Usado</option>
              <option value="defectuoso">Defectuoso</option>
            </select>
          </div>

      <!-- Lector de código 
          <div class="mb-3">
            <label for="codigoEscaneado" class="form-label">Código Escaneado:</label>
            <div id="reader" style="width: 100%; max-width: 400px; margin: 10px auto;"></div>
            <input type="text" id="codigoEscaneado" name="codigoEscaneado" class="form-control" readonly>
            <button type="button" class="btn btn-secondary mt-2" onclick="iniciarEscaner()">Escanear Código</button>
            <button type="button" class="btn btn-danger mt-2" onclick="detenerEscaner()">Detener Escáner</button>
          </div>


       Fin Lector de código -->

          <button type="submit" class="btn btn-primary" >Registrar</button>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>


<script>
  
  /*function toggleFields() {
    const categoria = document.getElementById('categoria').value;

    // Referencias a los campos
    const numeroSerieField = document.getElementById('numeroSerieField');
    const numeroInventarioField = document.getElementById('numeroInventarioField');
    const cantidadField = document.getElementById('cantidadField');
    const agrupacionField = document.getElementById('agrupacionField');

    // Resetear la visibilidad
    numeroSerieField.classList.add('');
    numeroInventarioField.classList.add('');
    cantidadField.classList.add('');
    agrupacionField.classList.add('');

    // Mostrar campos según la categoría
    if (categoria === 'herramientas' || categoria === 'equipos') {
      numeroSerieField.classList.remove('');
      numeroInventarioField.classList.remove('');
    } else if (categoria === 'cables') {
      cantidadField.classList.remove('');
    } else if (categoria === 'materiales') {
      agrupacionField.classList.remove('');
    }
  }


  
codigo scaner
  let scanner = null;

  function iniciarEscaner() {
    if (!scanner) {
      scanner = new Html5Qrcode("reader");
    }

    scanner.start(
      { facingMode: "environment" }, // Usa la cámara trasera
      {
        fps: 10, // Velocidad de fotogramas por segundo
        qrbox: 250, // Área de escaneo
      },
      (decodedText, decodedResult) => {
        // Procesar el texto escaneado
        document.getElementById('codigoEscaneado').value = decodedText;
        detenerEscaner(); // Detener escáner tras leer un código
      },
      (errorMessage) => {
        // Manejo de errores durante el escaneo
        console.log("Error de escaneo: ", errorMessage);
      }
    ).catch((err) => {
      console.error("Error al iniciar el escáner: ", err);
    });
  }

  function detenerEscaner() {
    if (scanner) {
      scanner.stop().then(() => {
        console.log("Escáner detenido.");
      }).catch((err) => {
        console.error("Error al detener el escáner: ", err);
      });
    }
  }

*/


</script>