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
	<title>Intallapp</title>

	<?php  
    echo $lib->iconoPag();
    echo $lib->jquery();
    echo $lib->bootstrap();
    echo $lib->fontAwesome();
    echo $lib->jqueryValidate();
    echo $lib->alertify();
    echo $lib->installapp();
  ?>
  <style media="screen">
      html, body{
        background: url(img/fondo.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        width: 100vw;
        height: 100vh;
      }
    </style>
</head>
<body style="overflow-x: hidden;">
  <div class="container">
    <img class="w-100 mt-5 mb-4" src="img/banner.png">
    <div class="input-group">
      <input type="text" id="referencia" class="form-control" placeholder="Escriba su referencia" aria-label="Escriba su referencia" aria-describedby="buscarApp" autofocus autocomplete="off" list="referencias">
      <datalist id="referencias"></datalist>
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="buscarApp"><i class="fas fa-search"></i></button>
      </div>
    </div>
    <div id="Error" class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="display: none;"></div>
    <div id="Advertencia" class="alert alert-warning alert-dismissible fade show mt-1" role="alert" style="display: none;">Debe digitar una referencia.</div>
    <div id="contenido-apps" class="mt-3 mb-4"></div>
  </div>
  <script type="text/javascript">
    $(function(){
      $.ajax({
        url: "http://ip-api.com/json/",
        type: "POST",
        cache: false,
        dataType: "json",
        success: function(data){
          $.ajax({
            url: "acciones",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {accion: "listaReferenciasInicio", code: data.countryCode},
            success: function(data){
              $("#referencias").empty();
              for (let i = 0; i < data.cantidad_registros; i++) {
                $("#referencias").append(`
                  <option value='${data[i].ref_nombre}'></option>
                `);
              }
            },
            error: function(){
              alertify.error("No se ha podido cargar la lista");
            }
          });
          
          $("#referencia").keyup(function(e){
            var text = $(this).val().substring(0, $(this).val().length-1);
            if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105)) {
              if (e.key == "i" || e.key == "I") {
                $(this).val(text + e.key.toLowerCase());
              }else{
                $(this).val(text + e.key.toUpperCase());
              }
            }
          });

          $("#referencia").on('keypress, input', function(e) {
            if ($(this).val().length> 4) {
              $("#buscarApp").click();
            }else{
              $('#contenido-apps').empty();
              $("#Error").hide(500);
            }
          });

          $("#buscarApp").on("click", function(){
            if (textoBlanco($("#referencia")) > 0) {
              $("#Advertencia").hide(500);
              $.ajax({
                type: 'POST',
                url: 'acciones',
                data: {accion: "validarReferencia", ref: $("#referencia").val()},
                success: function(result){
                  if (result != 0) {
                    $.ajax({
                      type: 'POST',
                      url: 'acciones',
                      dataType: "json",
                      cache: false,
                      data: {accion: "listaAppsReferencia", idRef: result, code: data.countryCode},
                      success: function(data){
                        console.log(data);
                        $("#Error").hide(500)
                        $("#contenido-apps").empty();
                        if (data.cantidad_registros != 0) {
                          for (let i = 0; i < data.cantidad_registros; i++) {
                            if (data[i].app_tipo == 1) {
                              $("#contenido-apps").append(`
                                <div class="card">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-2">
                                      <h5 class="card-title font-weight-bold text-center">${data[i].app_nombre}</h5>
                                        <img class="w-100" src="almacenamiento/${data[i].app_imagen}" alt="">
                                      </div>
                                      <div class="col-8">
                                        <p>${data[i].app_descripcion}</p>
                                      </div>
                                      <div class="col-2 text-center align-self-center">
                                        <a class="btn btn-primary" href="almacenamiento/${data[i].app_ruta}" download="${data[i].app_nombre}.apk"><i class="fas fa-4x fa-download"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              `); 
                            }else{
                              $("#contenido-apps").append(`
                                <div class="card">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-2">
                                      <h5 class="card-title font-weight-bold text-center">${data[i].app_nombre}</h5>
                                        <img class="w-100" src="almacenamiento/${data[i].app_imagen}" alt="">
                                      </div>
                                      <div class="col-8">
                                        <p>${data[i].app_descripcion}</p>
                                      </div>
                                      <div class="col-2 text-center align-self-center">
                                        <a class="btn btn-primary" target="_blank" href="${data[i].app_ruta}"><i class="fas fa-4x fa-external-link-square-alt"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              `); 
                            }
                          }
                        }else{
                          $("#contenido-apps").append(`<div class='alert alert-warning text-center' role='alert'>
                                                        No existen aplicaciónes relacionadas
                                                      </div>`);
                        }
                        
                        //$("#contenido-apps").html(result1);
                      },
                      error: function(result1){
                        alertify.error("Error al cargar apps");
                      }
                    });
                  }else{
                    $("#contenido-apps").empty();
                    $("#Error").html("La referencia <strong>"+ $("#referencia").val() +"</strong> es invalida");
                    $("#Error").show(500);
                    $("#referencia").focus();
                  }
                },
                error: function(result){
                  alertify.error("No ha podido validar la referencia");
                }
              });
            }else{
              $("#Error").hide(500);
              $("#Advertencia").show(500);
              $("#referencia").focus();
            }
          });
        },
        error: function(){
          alertify.error("Error con la conexión");
        }
      });
    });
  </script>
</body>
</html>