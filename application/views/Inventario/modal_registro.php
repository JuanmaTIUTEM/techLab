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
        <form id="registroForm">
          <!-- Categoría -->
          <div class="mb-3">
            <label for="categoria" class="form-label">Categoría:</label>
            <select id="categoria" name="categoria" class="form-select" onchange="toggleFields()">
              <option value="">Selecciona una categoría</option>
              <option value="herramientas">Herramientas</option>
              <option value="materiales">Materiales</option>
              <option value="equipos">Equipos</option>
              <option value="consumibles">Consumibles</option>
              <option value="cables">Cables</option>
            </select>
          </div>

          <!-- Campos Generales -->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control" required>
          </div>

          <!-- Campos específicos según categoría -->
          <div id="categoriaFields">
            <!-- Número de Serie (Herramientas y Equipos) -->
            <div class="mb-3 d-none" id="numeroSerieField">
              <label for="numeroSerie" class="form-label">Número de Serie:</label>
              <input type="text" id="numeroSerie" name="numeroSerie" class="form-control">
            </div>

            <!-- Número de Inventario (Herramientas y Equipos) -->
            <div class="mb-3 d-none" id="numeroInventarioField">
              <label for="numeroInventario" class="form-label">Número de Inventario:</label>
              <input type="text" id="numeroInventario" name="numeroInventario" class="form-control">
            </div>

            <!-- Cantidad (Cables) -->
            <div class="mb-3 d-none" id="cantidadField">
              <label for="cantidad" class="form-label">Cantidad:</label>
              <input type="number" id="cantidad" name="cantidad" class="form-control" value="1" min="1">
            </div>

            <!-- Agrupación (Materiales pequeños) -->
            <div class="mb-3 d-none" id="agrupacionField">
              <label for="agrupacion" class="form-label">Agrupar por características similares:</label>
              <input type="checkbox" id="agrupacion" name="agrupacion"> Agrupar elementos con características similares
            </div>
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

          <button type="submit" class="btn btn-primary">Registrar</button>
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
  
  function toggleFields() {
    const categoria = document.getElementById('categoria').value;

    // Referencias a los campos
    const numeroSerieField = document.getElementById('numeroSerieField');
    const numeroInventarioField = document.getElementById('numeroInventarioField');
    const cantidadField = document.getElementById('cantidadField');
    const agrupacionField = document.getElementById('agrupacionField');

    // Resetear la visibilidad
    numeroSerieField.classList.add('d-none');
    numeroInventarioField.classList.add('d-none');
    cantidadField.classList.add('d-none');
    agrupacionField.classList.add('d-none');

    // Mostrar campos según la categoría
    if (categoria === 'herramientas' || categoria === 'equipos') {
      numeroSerieField.classList.remove('d-none');
      numeroInventarioField.classList.remove('d-none');
    } else if (categoria === 'cables') {
      cantidadField.classList.remove('d-none');
    } else if (categoria === 'materiales') {
      agrupacionField.classList.remove('d-none');
    }
  }


</script>