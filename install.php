<?php  
	$max_salida=10; // Previene algun posible ciclo infinito limitando a 10 los ../
  $ruta_raiz=$ruta="";
  while($max_salida>0){
    if(@is_file($ruta.".htaccess")){
      $ruta_raiz=$ruta; //Preserva la ruta superior encontrada
      break;
    }
    $ruta.="../";
    $max_salida--;
  }

	require_once($ruta_raiz . 'clases/funciones_generales.php');
  require_once($ruta_raiz . 'clases/librerias.php');

  $lib = new Libreria();
?>
<!DOCTYPE html>
<html>
<head>
	<?php  
    echo $lib->metaTagsRequired();
  ?>
	<title>Intallapp Admin</title>

	<?php  
    echo $lib->iconoPag();
    echo $lib->jquery();
    echo $lib->bootstrap();
    echo $lib->fontAwesome();
    echo $lib->jqueryValidate();
    echo $lib->alertify();
    echo $lib->datatables();
    echo $lib->bsCustomFileInput();
    echo $lib->jqueryform();
    echo $lib->installapp();
  ?>
</head>
<body>
  <div class="container">

    <!-- Botónes de control -->
    <div class="text-center mt-4">
      <button id="btn_app" type="button" class="btn-cat btn btn-outline-secondary active"><i class="fab fa-android"></i> Aplicaciones</button>
      <button id="btn_software" type="button" class="btn-cat btn btn-outline-secondary"><i class="fab fa-teamspeak"></i> Software</button>
      <button id="btn_ref" type="button" class="btn-cat btn btn-outline-secondary"><i class="fas fa-tv"></i> Referencias</button>
      <button id="btn_marcas" type="button" class="btn-cat btn btn-outline-secondary"><i class="fas fa-share-alt"></i> Marcas</button>
    </div>

    <hr>

    <!-- Contenedor de aplicacioens -->
    <div id="contenido-aplicaciones">
      <div class="text-right">
        <!-- Botón Modal Agregar Aplicación   -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearApps">
          <i class="fas fa-plus"></i> Agregar Aplicación
        </button>
      </div>
      <hr>
      <table class="table table-hover" id="tabla-aplicaciones">
        <thead>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </thead>
        <tbody id="tabla-contenido-aplicaciones">
        
        </tbody>
      </table>
    </div>

    <!-- Contendor de software -->
    <div id="contenido-software" style="display: none;">
      <div class="text-right">
        <!-- Botón Modal Agregar Aplicación   -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSoftware">
          <i class="fas fa-plus"></i> Agregar Software
        </button>
      </div>
      <hr>
    </div>

    <!-- Contenedor de Referencia -->
    <div id="contenido-referencias" style="display: none;">
      <div class="d-flex justify-content-between mb-3">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButtonMarcas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Seleccione una marca
          </button>
          <div class="dropdown-menu" id="dropdownMarcas" aria-labelledby="dropdownMenuButtonMarcas"></div>
        </div>

        <h3 id="titulo-marca">HYUNDAI</h3>

        <!-- Botón Modal Agregar Referencia -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarReferencia">
          <i class="fas fa-plus"></i> Agregar Referencia
        </button>
      </div>

      <table class="table table-sm table-hover" id="tabla-referencias">
        <thead>
          <tr>
            <th>Referencias</th>
            <th>Fecha Creación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="tabla-contenido-referencia"></tbody>
      </table>
    </div>

    <!-- Contenido de marcas -->
    <div id="contenido-marcas" style="display: none;">
      <div class="text-right mb-3">
        <!-- Botón Modal Agregar Marcas -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMarca">
          <i class="fas fa-plus"></i> Agregar Marca
        </button>
      </div>
      <table class="table table-sm table-hover" id="tabla-marcas">
        <thead>
          <tr>
            <th>Marca</th>
            <th>Fecha Creación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="tabla-contenido-marcas"></tbody>
      </table>
    </div>
  </div>

  <!-- Modal Agregar Marcas -->
  <div class="modal fade" id="modalAgregarMarca" tabindex="-1" role="dialog" aria-labelledby="AgregarReferenciaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Marca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formCrearMarca" autocomplete="off">
        <input type="hidden" name="accion" value="formCrearMarca">
          <div class="modal-body">
            <div class="form-group">
              <label>Marca:</label>
              <input id="addMarca" class="form-control" type="text" name="addMarca" placeholder="Escriba la marca" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button class="btn btn-success" type="submit"><i class="far fa-save"></i> Crear</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Editar Marcas -->
  <div class="modal fade" id="modalEditarMarca" tabindex="-1" role="dialog" aria-labelledby="AgregarReferenciaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Marca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formEditarMarca" autocomplete="off">
          <input type="hidden" name="accion" value="formEditarMarca">
          <input type="hidden" name="editIdMarca" id="editIdMarca" value="">
          <div class="modal-body">
            <div class="form-group">
              <label>Marca:</label>
              <input id="editMarca" class="form-control" type="text" name="editMarca" placeholder="Escriba la marca" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button class="btn btn-success" type="submit"><i class="far fa-save"></i> Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Agregar Referencias -->
  <div class="modal fade" id="modalAgregarReferencia" tabindex="-1" role="dialog" aria-labelledby="AgregarReferenciaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Referencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formCrearReferencia" autocomplete="off">
        <input type="hidden" name="accion" value="formCrearReferencia">
          <div class="modal-body">
            <div class="form-group">
              <label for="marca">Marcas:</label>
              <select name="marca" id="marca" class="custom-select" required autofocus></select>
            </div>
            <div class="form-group">
              <label for="referecia">Referencia:</label>
              <input id="referencia" class="form-control" type="text" name="referencia" placeholder="Escriba la referencia" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button class="btn btn-success" type="submit"><i class="far fa-save"></i> Crear</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Editar Referencias -->
  <div class="modal fade" id="modalEditarReferencia" tabindex="-1" role="dialog" aria-labelledby="EditarReferenciaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Referencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formEditarReferencia" autocomplete="off">
          <input type="hidden" name="accion" value="formEditarReferencia">
          <input type="hidden" id="editIdReferencia" name="editIdReferencia" value="">
          <div class="modal-body">
            <div class="form-group">
              <label >Marcas:</label>
              <select name="editmarca" id="editmarca" class="custom-select" required autofocus></select>
            </div>
            <div class="form-group">
              <label for="referecia">Referencia:</label>
              <input id="editarreferencia" class="form-control" type="text" name="editarreferencia" placeholder="Escriba la referencia" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button class="btn btn-success" type="submit"><i class="far fa-save"></i> Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Crear Apps -->
  <div class="modal fade bd-example-modal-lg" id="modalCrearApps" tabindex="-1" role="dialog" aria-labelledby="modalAgregarAplicacionTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Agregar Aplicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formAgregarAplicacion" method="post" autocomplete="off" enctype="multipart/form-data" action="acciones.php">
          <input type="hidden" name="accion" value="formAgregarAplicacion">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-12">
                <label for="nombreApp">Nombre <span class="text-danger">*</span></label>
                <input name="nombreApp" type="text" class="form-control" id="nombreApp" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-6">
                <label>Logo <span class="text-danger">*</span></label>
                <div class="custom-file">
                  <input required type="file" class="custom-file-input" id="imgApp" name="imgApp" accept=".jpg, .jpeg, .png" required>
                  <label class="custom-file-label" id="labelimgApp" for="archivo">Seleccionar Archivo</label>
                  <small class="form-text text-muted">
                    Solo se permiten archivos jpg, jpeg, png.
                  </small>
                </div>
              </div>
              <div class="col-6">
                <label>Apk <span class="text-danger">*</span></label>
                <div class="custom-file">
                  <input required type="file" class="custom-file-input" id="apkApp" name="apkApp" accept=".apk" required>
                  <label class="custom-file-label" id="labelimgApp" for="archivo">Seleccionar Archivo</label>
                  <small class="form-text text-muted">
                    Solo se permiten archivos apk.
                  </small>
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="descripcionApp">Descripción</label>
                <textarea name="descripcionApp" class="form-control" id="descripcionApp" rows="3" required></textarea>
            </div>
            <hr>
            <p class="text-left">Países</p>
            <div class="funkyradio form-row" id="inputRadioPais"></div>
            <hr>
            <p class="text-left">Referencias</p>
            <div class="row">
              <div class="col-12">
                <input autofocus type="search" name="input-search" class="form-control" id="input-search" placeholder="Buscar referencias">
                <br>
              </div>
            </div>
            <div class="funkyradio form-row searchable-container" id="inputRadioApp"></div>
          </div>
          <div class="progress mt-2" style="height: 25px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="percent">0%</div></div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Crear</button>
          </div>
        </form>
      </div>
    </div>
  </div>

   <!-- Modal Modificar Aplicación -->
  <div class="modal fade bd-example-modal-lg" id="modalModificarAplicacion" tabindex="-1" role="dialog" aria-labelledby="modalModificaracionTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalModificaracionTitle">Modificar Aplicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formModificarAplicacion" method="post" autocomplete="off" enctype="multipart/form-data" action="acciones">
          <input type="hidden" name="accion" value="formModificarAplicacion" required>
          <input type="hidden" name="idAppMod" id="idAppMod" required>
          <input type="hidden" name="imgAppModAnt" id="imgAppModAnt" required>
          <input type="hidden" name="rutaApp" id="rutaApp" required>
          <input type="hidden" name="nombreAppAnt" id="nombreAppAnt" required>
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-12">
                <label for="nombreApp">Nombre</label>
                <input name="nombreAppMod" type="text" class="form-control" id="nombreAppMod" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-6">
                <label for="">Logo</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="imgAppMod" name="imgAppMod" accept=".jpg, .jpeg, .png">
                  <label class="custom-file-label" id="labelimgAppMod" for="imgAppMod">Seleccionar Archivo</label>
                  <small class="form-text text-muted">
                    Solo se permiten archivos jpg, jpeg, png.
                  </small>
                </div>
              </div>
              <div class="col-6">
                <label for="">Apk</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="apkAppMod" name="apkAppMod" accept=".apk">
                  <label class="custom-file-label" id="labelapkAppMod" for="apkAppMod">Seleccionar Archivo</label>
                  <small class="form-text text-muted">
                    Solo se permiten archivos apk.
                  </small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcionApp">Descripcion</label>
              <textarea name="descripcionAppMod" class="form-control" id="descripcionAppMod" rows="3" required></textarea>
            </div>
            <hr>
            <p class="text-left">Países</p>
            <div class="funkyradio form-row" id="inputRadioPaisEdit"></div>
            <hr>
            <p class="text-center">Referencias</p>
            <div class="row">
              <div class="col-12">
                <input autofocus type="search" class="form-control" name="input-search2" id="input-search2" placeholder="Buscar referencias">
                <br>
              </div>
            </div>
            <div class="funkyradio form-row searchable-container2" id="inputRadioAppMod"></div>
          </div>
          <div class="progress mt-2" style="height: 25px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="percent">0%</div></div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
<script>
  $(function(){
    bsCustomFileInput.init();
    listaMarcas();
    listaReferencias();
    listaApps();
    radioPaises();
    inputReferencias();

    $(".btn-cat").on("click", function(){
      $(".btn-cat").removeClass("active");
      $(this).addClass("active");
    });

    $("#btn_app").on("click", function(){
      $("#contenido-referencias").hide(500);
      $("#contenido-software").hide(500);
      $("#contenido-marcas").hide(500);
      $("#contenido-aplicaciones").show(500);
        //CargarApps();
      });

      $("#btn_ref").on("click", function(){
        $("#contenido-aplicaciones").hide(500);
        $("#contenido-software").hide(500);
        $("#contenido-marcas").hide(500);
        $("#contenido-referencias").show(500);
        //cargarReferencias();
    });

    $("#btn_software").on("click", function(){
      $("#contenido-aplicaciones").hide(500);
      $("#contenido-referencias").hide(500);
      $("#contenido-marcas").hide(500);
      $("#contenido-software").show(500);
      //cargarReferencias();
    });

    $("#btn_marcas").on("click", function(){
      tablaListaMarcas();
      $("#contenido-aplicaciones").hide(500);
      $("#contenido-referencias").hide(500);
      $("#contenido-software").hide(500);
      $("#contenido-marcas").show(500);
      //cargarReferencias();
    });

    //Formulario para crear marca
    $("#formCrearMarca").validate({
      debug: true,
      rules: {
        addMarca: "required",
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        $(element).removeClass('is-valid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
      }
    });

    $("#formCrearMarca").submit(function(event){
      event.preventDefault();
      if ($("#formCrearMarca").valid()) {
        $.ajax({
          url: "acciones",
          type: "POST",
          dataType: "json",
          cache: false,
          contentType: false,
          processData: false,
          data: new FormData(this),
          success: function(data){
            switch (data) {
              case 1:
                tablaListaMarcas();
                $("#formCrearMarca")[0].reset();
                $("#modalAgregarMarca").modal("hide");
                alertify.success("La marca " + $("#addMarca").val() + " se ha creado correctamente.");
                break;
              case 2:
                alertify.error("La marca ya existe");
                break;
              default:
                alertify.error("Error al guardar...");
                break;
            }
          },
          error: function(){
            alertify.error("Erorr en el formulario.");
          }
        });
      }
    });

    //Formulario editar marca
    $("#formEditarMarca").validate({
      debug: true,
      rules: {
        editMarca: "required",
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        $(element).removeClass('is-valid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
      }
    });

    $("#formEditarMarca").submit(function(){
      event.preventDefault();
      if ($("#formEditarMarca").valid()) {
        $.ajax({
          url: "acciones",
          type: "POST",
          dataType: "json",
          cache: false,
          contentType: false,
          processData: false,
          data: new FormData(this),
          success: function(data){
            switch (data) {
              case 1:
                tablaListaMarcas();
                $("#modalEditarMarca").modal("hide");
                alertify.success("La marca se ha editado correctamente.");
                break;
              case 2:
                alertify.error("La marca ya existe...");
                break;
              default:
                alertify.error("Ha ocurrido un error...");
                break;
            }
          },
          error: function(){
            alertify.error("Error en el formulario");
          }
        });
      }
    }); 
    
    //Formulario para crear referencia
    $("#formCrearReferencia").validate({
      debug: true,
      rules: {
        marca: "required",
        referencia: "required"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        $(element).removeClass('is-valid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
      }
    });

    $("#formCrearReferencia").submit(function(event){
      event.preventDefault();
      if ($("#formCrearReferencia").valid()) {
        $.ajax({
          url: "acciones",
          dataType: "json",
          type: "POST",
          cache: false,
          contentType: false,
          processData: false,
          data: new FormData(this),
          success: function(data){
            switch (data) {
              case 1:
                listaReferencias($("#marca").val(), $("#marca option:selected").text());
                $("#formCrearReferencia")[0].reset();
                $("#modalAgregarReferencia").modal("hide");
                alertify.success("Se ha creado la referencia correctamente.");
                break;
              case 2:
                $("#referencia").focus();
                alertify.error("La referencia ya existe.");
                break;
              default:
                alertify.error("Error al guardar...");
                break;
            }
          },  
          error: function(){
            alertify.error("No ha podido enviar el formulario.");
          }
        });
      }
    });

    //Formulario editar referencia
    $("#formEditarReferencia").validate({
      debug: true,
      rules: {
        editmarca: "required",
        editarreferencia: "required"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        $(element).removeClass('is-valid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
      }
    });

    $("#formEditarReferencia").submit(function(event){
      event.preventDefault();
      if ($("#formEditarReferencia").valid()) {
        $.ajax({
          url: "acciones",
          type: "POST",
          dataType: "json",
          cache: false,
          contentType: false,
          processData: false,
          data: new FormData(this),
          success: function(data){
            switch (data) {
              case 1:
                alertify.success("Se ha actualizado la referencia");
                listaReferencias($("#editmarca").val());
                $("#modalEditarReferencia").modal("hide");
                break;
              case 2:
                $("#editarreferencia").focus();
                alertify.error("La referencia " + $("#editarreferencia").val() + " ya existe... ");   
                break;
              default:
                alertify.error("Error...");
                break;
            }
          },
          error: function(){
            alertify.error("Error en formulario editar referencia...");
          }
        });
      }
    });

    //Formulario de crear apps
    $("#formAgregarAplicacion").validate({
      debug: true,
      rules: {
        nombreApp: "required",
        imgApp: "required",
        apkApp: "required",
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        $(element).removeClass('is-valid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
      }
    });

    // Variables de barra de progreso cuando de va subir un archivo
    var bar = $('.progress-bar');
    var percent = $('.percent');
    var status = $('#status');

    $("#formAgregarAplicacion").submit(function(event){
      event.preventDefault();
      if ($("#formAgregarAplicacion").valid()) {
        $("#formAgregarAplicacion").ajaxSubmit({
          dataType: "json",
          clearForm: true,
          resetForm: true,
          beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
          },
          uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
          },
          success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
          },
          complete: function(xhr) {
            switch (xhr.responseJSON) {
              case 1:  
                listaApps();
                $("#modalCrearApps").modal("hide");
                alertify.success("Se han agregado correctamente");
                bar.width('0%');
                percent.html('0%');
                break;
              case 2:
                alertify.error("EL nombre de la aplicación ya esta en uso");
                bar.width('0%');
                percent.html('0%');
                break;
              
              case 3:
                alertify.error("El tipo de imagen no el permitido");
                bar.width('0%');
                percent.html('0%');
                break;

              case 4:
                alertify.error("Error al subir la imagen");
                bar.width('0%');
                percent.html('0%');
                break;

              case 5:
                alertify.error("Error al subir el apk");
                bar.width('0%');
                percent.html('0%');
                break;

              case 6:
                alertify.error("Error al crear la apliación");
                bar.width('0%');
                percent.html('0%');
                break;
              default:
                alertify.error(xhr.responseText);
                bar.width('0%');
                percent.html('0%');
                break;
            }
          }
        });  
      }
    });

    //Formulario de editar apps
    $("#formModificarAplicacion").validate({
      debug: true,
      rules: {
        idAppMod: "required",
        imgAppModAnt: "required",
        rutaApp: "required",
        nombreAppMod: "required",
        descripcionAppMod: "required"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        $(element).removeClass('is-valid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
      }
    });

    $("#formModificarAplicacion").submit(function(event){
      event.preventDefault();
      if ($("#formModificarAplicacion").valid()) {
        $("#formModificarAplicacion").ajaxSubmit({
          //dataType: "json",
          beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
          },
          uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
          },
          success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
          },
          complete: function(xhr) {
            console.log(xhr);
            if (xhr.responseText == 1) {
              listaApps();
              $("#modalModificarAplicacion").modal("hide");
              $("#formModificarAplicacion")[0].reset();
              alertify.success("Se han modificado correctamente");
              bar.width('0%');
              percent.html('0%');
            }else{
              //Remplazamos la comillas devueltas por el json
              alertify.error(xhr.responseText.replace(/"/g, ''));
              bar.width('0%');
              percent.html('0%');
            }
          }
        });  
      }
    });
  });

  function listaMarcas(){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "json",
      cache: false,
      data: {accion: "listaMarcas"},
      success: function(data){
        $("#marca").empty();
        $("#editmarca").empty();
        $("#marca").append('<option value="" disabled selected>Seleccione una marca</option>');
        $("#editmarca").append('<option value="" disabled selected>Seleccione una marca</option>');        
        for (let i = 0; i < data.cantidad_registros; i++) {          
          $("#marca").append('<option value="' + data[i].m_id + '">' + data[i].m_nombre + '</option>');
          $("#editmarca").append('<option value="' + data[i].m_id + '">' + data[i].m_nombre + '</option>');
        }
        
        $("#dropdownMarcas").empty();
        for (let i = 0; i < data.cantidad_registros; i++) {
          $("#dropdownMarcas").append(`<button class="dropdown-item" onClick="listaReferencias(${data[i].m_id}, '${data[i].m_nombre}')">${data[i].m_nombre}</button>`);
        }
      },
      error: function(){
        alertify.error("No ha podido cargar la lista");
      }
    });
  }

  function listaReferencias(id = 1, marca = "HYUNDAI"){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "json",
      cache: false,
      data: {accion: "listaReferencias", idMarca: id},
      success: function(data){
        $('[data-toggle="tooltip"]').tooltip('hide');
        //Destruimos la tabla y la limpiamos
        $("#tabla-referencias").dataTable().fnDestroy();
        $("#tabla-contenido-referencia").empty();
        $("#titulo-marca").html(marca)
        //Recorremos el json devuelto
        for (let i = 0; i < data.cantidad_registros; i++) {
          $("#tabla-contenido-referencia").append(`
            <tr>
              <td>${data[i].ref_nombre}</td>
              <td>${data[i].ref_fecha_creacion}</td>
              <td class="text-center">
                <button onClick="editarReferencia(${data[i].ref_id}, '${data[i].ref_nombre}', ${data[i].m_id})" class="btn btn-info" data-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></button>
                <button onClick="inHabilitarReferencia(${data[i].ref_id}, '${data[i].ref_nombre}', ${data[i].m_id}, '${data[i].m_nombre}')" class="btn btn-danger" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          `);
        }
        definirdataTable("#tabla-referencias");
        $('[data-toggle="tooltip"]').tooltip();
      },
      error: function(){
        alertify.error("No se ha cargado la tabla de refencias");
      }
    });
  }

  function inHabilitarReferencia(id, ref, idMarca, marca){
    $.ajax({
      url: "acciones",
      type: "POST",
      dateType: "html",
      cache: false,
      data: {accion: "inHabilitarReferencia", idRef: id},
      success: function(data){
        if (data = 1) {
          alertify.success("Se ha inhabilitado la referencia: " + ref);
          listaReferencias(idMarca, marca);
        }else{
          alertify.error(data);
        }
      },
      error: function(){
        alertify.error("Error...");
      }
    });
  }

  function editarReferencia(id, ref, marca){
    $('#editIdReferencia').val(id);
    $('#editmarca').val(marca);
    $('#editarreferencia').val(ref);
    $("#modalEditarReferencia").modal("show");
  }

  function tablaListaMarcas(){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "json",
      cache: false,
      data: {accion: "listaMarcas"},
      success: function(data){
        $('[data-toggle="tooltip"]').tooltip('hide');
        $("#tabla-marcas").dataTable().fnDestroy();
        $("#tabla-contenido-marcas").empty();
        for (let i = 0; i < data.cantidad_registros; i++) {
          $("#tabla-contenido-marcas").append(`
            <tr>
              <td>${data[i].m_nombre}</td>
              <td>${data[i].m_fecha_creacion}</td>
              <td class="text-center">
                <button onClick="editarMarca(${data[i].m_id}, '${data[i].m_nombre}')" class="btn btn-info" data-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></button>
                <button onClick="inHabilitarMarca(${data[i].m_id}, '${data[i].m_nombre}')" class="btn btn-danger" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          `);
        }
        definirdataTable("#tabla-marcas");
        $('[data-toggle="tooltip"]').tooltip();
      },
      error: function(){
        alertify.error("Error al cargar la lista");
      }
    });
  }

  function inHabilitarMarca(id, nombre){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "html",
      cache: false,
      data: {accion: "inHabilitarMarca", idMarca: id},
      success: function(data){
        if (data == 1) {
          alertify.success("Se ha eliminado  la marca " + nombre + " exitosamente.");
          tablaListaMarcas();
          listaMarcas();
        }else{
          alertify.error("No se ha podido eliminar la marca " + nombre);
        }
      },
      error: function(){
        alertify.error("Error al ajecutar la accion");
      }
    });
  }

  function editarMarca(id, nombre){
    $("#editIdMarca").val(id);
    $("#editMarca").val(nombre);
    $("#modalEditarMarca").modal("show");
  }

  function listaApps(){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "json",
      cache: false,
      data: {accion: "listaApps"},
      success: function(data){
        console.log(data);
        $('[data-toggle="tooltip"]').tooltip('hide');
        //Destruimos la tabla y la limpiamos
        $("#tabla-aplicaciones").dataTable().fnDestroy();
        $("#tabla-contenido-aplicaciones").empty();
        for (let i = 0; i < data.cantidad_registros; i++) {
          $("#tabla-contenido-aplicaciones").append(`
            <tr>
              <td class="align-middle"><img src="almacenamiento/${data[i].app_imagen}" width="200px"/></td>
              <td>${data[i].app_nombre}</td>
              <td>${data[i].app_descripcion}</td>
              <td class="text-center align-middle">
                <button class="btn btn-info" onClick="editarApp(${data[i].app_id})" data-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" onClick="inHabilitarApp(${data[i].app_id}, '${data[i].app_nombre}')" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
                <a class="btn btn-primary text-white" data-toggle="tooltip" title="Descargar" download="${data[i].app_nombre}.apk" href="almacenamiento/${data[i].app_ruta}"><i class="fas fa-download"></i></a>
              </td>
            </tr>
          `);
        }
        $('[data-toggle="tooltip"]').tooltip();
        definirdataTable("#tabla-aplicaciones");
      },
      error: function(){
        alertify.error("No ha podido cargar la lista de apps");
      }
    });
  }

  function radioPaises(){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "json",
      cache: false,
      data: {accion: "listaPaises"},
      success: function(data){
        $("#inputRadioPais").empty();
        for (let i = 0; i < data.cantidad_registros; i++) {
          $("#inputRadioPais").append(`
            <div class='funkyradio-primary col-12 col-sm-6 col-md-6 col-lg-4'>
              <input class='plataforma' type='checkbox' name='pais[]' id="${data[i].p_nombre}" value='${data[i].p_id}'/>
              <label for='${data[i].p_nombre}'>${data[i].p_nombre}</label>
            </div>
          `);
        }
      },
      error: function(){
        alertify.error("No se ha podido cargar los paises");
      }
    });
  }

  function inputReferencias(){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "json",
      cache: false,
      data: {accion: "inputReferencias"},
      success: function(data){
        $("#inputRadioApp").empty();
        for (let i = 0; i < data.cantidad_registros; i++) {
          $("#inputRadioApp").append(`
            <div class='items funkyradio-primary col-12 col-sm-6 col-md-6 col-lg-4'>
              <input class='plataforma' type='checkbox' name='ref[]' id="${data[i].ref_nombre}" value='${data[i].ref_id}'/>
              <label for='${data[i].ref_nombre}'>${data[i].ref_nombre}</label>
            </div>
          `);
        }
      },
      error: function(){
        alertify.error("No se ha cargado los inputs con las referencias");
      }
    });
  }

  function inHabilitarApp(idApp, AppNombre){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType: "json",
      cache: false,
      data: {accion: "inHabilitarApp", idApp: idApp},
      success: function(data){
        if (data === 1) {
          listaApps();
          alertify.success("La app " + AppNombre + " se ha eliminado.");
        }else{
          alertify.error(data);
        }
      },
      error: function(){
       alertify.error("Error al inhabilitar");
      }
    });
  }

  function editarApp(app_id){
    $.ajax({
      url: "acciones",
      type: "POST",
      dataType:"json", 
      cache: false,
      data: {accion: "datosApp", idApp: app_id},
      success: function(data){
        $('#idAppMod').val(data.app_id);
        $('#imgAppModAnt').val(data.app_imagen);
        $('#rutaApp').val(data.app_ruta);
        $('#nombreAppMod').val(acutes(data.app_nombre));
        $('#descripcionAppMod').val(acutes(data.app_descripcion));
        $('#nombreAppAnt').val(data.app_nombre);
        $("#modalModificarAplicacion").modal("show");

        //Traemos los inputs de los paises
        $.ajax({
          url: "acciones",
          type: "POST",
          dataType: "json",
          cache: false,
          data: {accion: "checkPaisesEditar", idApp: app_id},
          success: function(data){
            $("#inputRadioPaisEdit").empty();
            for (let i = 0; i < data.cantidad_registros; i++) {
              if (data[i].check == 1) {
                $("#inputRadioPaisEdit").append(`
                  <div class='funkyradio-primary col-12 col-sm-6 col-md-6 col-lg-4'>
                    <input class='plataforma' type='checkbox' checked name='paisEdit[]' id="Edit${data[i].p_nombre}" value='${data[i].p_id}'/>
                    <label for='Edit${data[i].p_nombre}'>${data[i].p_nombre}</label>
                  </div>
                `);
              }else{
                $("#inputRadioPaisEdit").append(`
                  <div class='funkyradio-primary col-12 col-sm-6 col-md-6 col-lg-4'>
                    <input class='plataforma' type='checkbox' name='paisEdit[]' id="Edit${data[i].p_nombre}" value='${data[i].p_id}'/>
                    <label for='Edit${data[i].p_nombre}'>${data[i].p_nombre}</label>
                  </div>
                `);
              }
            }
          },
          error: function(){
            alertify.error("No se han traido los check.");
          }
        });

        $.ajax({
          url: "acciones",
          type: "POST",
          dataType: "json",
          cache: false,
          data: {accion: "checkReferenciasEditar", idApp: app_id},
          success: function(data){
            $("#inputRadioAppMod").empty();
            for (let i = 0; i < data.cantidad_registros; i++) {
              if(data[i].check == 1){
                $("#inputRadioAppMod").append(`
                  <div class='items2 funkyradio-primary col-12 col-sm-6 col-md-6 col-lg-4'>
                    <input class='plataforma' type='checkbox' checked name='refEdit[]' id="Edit${data[i].ref_nombre}" value='${data[i].ref_id}'/>
                    <label for='Edit${data[i].ref_nombre}'>${data[i].ref_nombre}</label>
                  </div>
                `);
              }else{
                $("#inputRadioAppMod").append(`
                  <div class='items2 funkyradio-primary col-12 col-sm-6 col-md-6 col-lg-4'>
                    <input class='plataforma' type='checkbox' name='refEdit[]' id="Edit${data[i].ref_nombre}" value='${data[i].ref_id}'/>
                    <label for='Edit${data[i].ref_nombre}'>${data[i].ref_nombre}</label>
                  </div>
                `);
              }
              
            }

            $('#input-search2').on('keyup', function () {
              var rex = new RegExp($(this).val(), 'i');
              $('.searchable-container2 .items2').hide();
              $('.searchable-container2 .items2').filter(function () {
                return rex.test($(this).text());
              }).show();
            });
          },
          error: function(data){
            console.log(data);
            alertify.error("No se ha traido los check de referencias.");
          }
        });

      },
      error: function(){
        alertify.error("Error al traer los datos");
      }
    });
  }

</script>
</html>