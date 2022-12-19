<?php
require("header.php");

?>

  <div class="card mx-5 pb-0">
    <div class="row m-auto">
      <div class="col d-flex col-sm-6 col-12 bg-primary align-items-center ">
        <section class="mx-auto my-5">
          <section class="info_title">
              <span class="fa fa-user-circle"></span>
              <h2 class="my-3">INFORMACIÓN<br>DE CONTACTO</h2>
          </section>
          <section class="info_items">
              <p><span class="fa fa-envelope"></span> <a id="link_roman" href="mailto:nromanc@unmsm.edu.pe"> nromanc@unmsm.edu.pe</a></p>
              <p><span class="bi bi-whatsapp"></span> <a id="link_roman" href="https://wa.me/51938345776">+51 938-345-776</a></p>
          </section>
        </section>
      </div>
      <div class="col col-sm-6 col-12 p-3 pb-0 ">
        <form action="" class="form_contact">
            <h2>¿Está interesado? Llene sus datos </h2>
            <div class="user_info mx-3 mt-3">
                <label for="names">Nombres</label>
                <input type="text" id="names">

                <label for="phone">Telefono / Celular</label>
                <input type="text" id="phone">

                <label for="email">Correo electrónico</label>
                <input type="text" id="email">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
           
                  <input class ="btn btn-primary" type="button" value="Enviar" id="btnSend">

            </div>
        </form>
      </div>
    </div>
</div>
<?php
require("footer.php");
?>