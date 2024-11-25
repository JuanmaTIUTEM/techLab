<style>
  /* Estilo individual para esta sección */
  .custom-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .custom-card {
    padding: 20px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
    border-radius: 10px;
    margin: 10px;
  }

  /* Responsividad para pantallas grandes */
  .custom-card {
    width: 25%;
  }

  /* Responsividad para pantallas medianas */
  @media (max-width: 1024px) {
    .custom-card {
      width: 45%;
    }
  }

  /* Responsividad para pantallas pequeñas */
  @media (max-width: 768px) {
    .custom-card {
      width: 90%;
      margin: 10px 0;
    }

    .custom-card h5 {
      font-size: 16px;
    }

    .custom-card p {
      font-size: 14px;
    }
  }
</style>

<div class="custom-container d-flex flex-wrap justify-content-center">
  <div class="custom-card p-2 shadow border rounded-4 m-2 pt-3">
    <h5 class="text-center">
      <span style="width:20px; height: 20px; padding: 3px; background-color: black; color: white;" class="rounded-5">1.</span>
      Generar la solicitud
    </h5>
    <p class="txt txt-justify" id="cambio-color">
      Deberás ingresar con tu número de control y password a tu cuenta de UTeMTechLab Control y generar la solicitud.
    </p>
  </div>
</div>


