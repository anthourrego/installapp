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
<body>
  <div class="container">
    <img class="w-100 mt-5 mb-4" src="img/banner.png">
    <div class="input-group mb-5">
      <input type="text" id="referencia" class="form-control" placeholder="Escriba su referencia" aria-label="Escriba su referencia" aria-describedby="buscarApp" autofocus autocomplete="off" list="referencias">
      <datalist id="referencias"></datalist>
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="buscarApp"><i class="fas fa-search"></i></button>
      </div>
    </div>
    <div id="contenido-apps" class="mt-3"></div>
  </div>
</body>
</html>