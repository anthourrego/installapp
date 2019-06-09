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

  class Libreria{
    private $cadena_libreria;
    private $ruta_libreria;
    private $ruta_iconos;

    public function __construct(){
      $this->cadena_libreria='';
      $this->ruta_libreria= RUTA_RAIZ .'librerias/';
      $this->ruta_iconos= RUTA_RAIZ  .'img/';
    }

    public function metaTagsRequired(){
      $this->cadena_libreria = '<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';  
      return $this->cadena_libreria;
    }

    public function iconoPag(){
      $this->cadena_libreria = '<link rel="shortcut icon" href="' . $this->ruta_iconos . 'icono.ico">';
      return($this->cadena_libreria);
    }

    public function bootstrap(){
      $this->cadena_libreria = '
  <link rel="stylesheet" type="text/css" href="' . $this->ruta_libreria .'bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="'. $this->ruta_libreria .'bootstrap/js/bootstrap.bundle.min.js"></script>';
      return($this->cadena_libreria);
    }

    public function jquery(){
      $this->cadena_libreria = '
  <script type="text/javascript" src="'. $this->ruta_libreria .'jquery/jquery-3.3.1.min.js"></script><script type="text/javascript"></script>';
      return($this->cadena_libreria);
    }

    public function jqueryValidate(){
      $this->cadena_libreria = '
  <script type="text/javascript" src="'. $this->ruta_libreria .'jquery-validate/jquery.validate.min.js"></script>
  <script type="text/javascript" src="'. $this->ruta_libreria .'jquery-validate/localization/messages_es.min.js"></script>';
      return($this->cadena_libreria); 
    }

    public function alertify(){
      $this->cadena_libreria = '
  <!-- Alertify - Tema de Bootstrap -->
  <link rel="stylesheet" href="'. $this->ruta_libreria .'alertifyjs/css/alertify.min.css"/>
  <link rel="stylesheet" href="'. $this->ruta_libreria .'alertifyjs/css/themes/bootstrap.min.css"/>
  <script type="text/javascript" src="'. $this->ruta_libreria .'alertifyjs/alertify.min.js"></script>';
      return($this->cadena_libreria);
    }

    public function fontAwesome(){
      $this->cadena_libreria = '
  <!-- Font Awesome -->
  <link rel="stylesheet" href="'. $this->ruta_libreria .'fontawesome-free-5.7.2-web/css/all.css"/>';
      return($this->cadena_libreria); 
    }

    public function fontAwesome4(){
      $this->cadena_libreria = '
    <!-- ================ Iconos de Font Awesome 4 ========================== -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" />';
      return($this->cadena_libreria);
    }


    public function bsCustomFileInput(){
      //Este nos ayuda con los input fila en boostrap se inicia como $(function(){bsCustomFileInput.init();});
      $this->cadena_libreria = '
      <!-- bs-custom-file-input -->
      <script type="text/javascript" src="' . $this->ruta_libreria . 'bs-custom-file-input/bs-custom-file-input.min.js"></script>
      <script type="text/javascript">
        $(function(){
          bsCustomFileInput.init();
        });
      </script>';
      return $this->cadena_libreria;
    }

    public function installapp(){
      $this->cadena_libreria = '
      <!-- installapp -->
      <link rel="stylesheet" href="' . $this->ruta_libreria . 'installapp/installapp.css"/>
      <script type="text/javascript" src="' . $this->ruta_libreria . 'installapp/installapp.js"></script>';
      return $this->cadena_libreria;
    }

    public function datatables(){
      $this->cadena_libreria = '
  <!-- Data Tables -->
  <link rel="stylesheet" href="'. $this->ruta_libreria .'dataTables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="'. $this->ruta_libreria .'dataTables/css/rowReorder.bootstrap4.min.css">
  <script src="'. $this->ruta_libreria .'dataTables/js/jquery.dataTables.js" charset="utf-8"></script>
  <script src="'. $this->ruta_libreria .'dataTables/js/dataTables.rowReorder.min.js" charset="utf-8"></script>
  <script src="'. $this->ruta_libreria .'dataTables/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>';
      return($this->cadena_libreria); 
    }

    public function jqueryform(){
      $this->cadena_libreria = '
  <!-- Jquery Form -->
  <script src="'. $this->ruta_libreria .'jqueryform/jquery.form.js" charset="utf-8"></script>';
      return($this->cadena_libreria); 
    }
  }

?>