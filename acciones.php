<?php 
  header("Access-Control-Allow-Origin: *");
  require_once('clases/Conectar.php');
  require_once('clases/funciones_generales.php');

  function listaMarcas(){
    $db = new Bd();
    $db->conectar();

    $sql = $db->consulta("SELECT m_id, m_nombre, m_fecha_creacion FROM marcas WHERE m_activa = 1");

    $db->desconectar();

    return json_encode($sql);
  }

  
  function formCrearReferencia(){
    //Creamos la conexion con al base de datos
    $db = new Bd();
    $db->conectar();
    $resp = "";
    //Se valida que la referecia no se encuentre registrada
    $sql_validar = $db->consulta("SELECT * FROM referencias WHERE ref_nombre = :ref_nombre", array(":ref_nombre" => $_REQUEST['referencia']));
    if ($sql_validar['cantidad_registros'] == 0) {
      $sql_validar = $db->sentencia("INSERT INTO referencias(ref_nombre, ref_fecha_creacion, ref_activo, fk_marca) VALUES(:ref_nombre, :ref_fecha_creacion, :ref_activo, :fk_marca)", 
                                    array(":ref_nombre" => $_REQUEST['referencia'], 
                                          ":ref_fecha_creacion" => date("Y-m-d H:i:s"), 
                                          ":ref_activo" => 1,
                                          ":fk_marca" => $_REQUEST['marca']));
      $resp = 1;
    }else{
      $resp = 2;
    }

    $db->desconectar();
    
    return json_encode($resp);
  }

  function listaReferencias(){
    $db = new Bd();
    $db->conectar();

    $sql_lista = $db->consulta("SELECT * FROM referencias INNER JOIN marcas ON fk_marca = m_id WHERE ref_activo = 1 AND fk_marca = :fk_marca", array(":fk_marca" => $_REQUEST['idMarca']));

    $db->desconectar();

    return json_encode($sql_lista);
  }

  function inHabilitarReferencia(){
    $db = new Bd();
    $db->conectar();

    $db->sentencia("UPDATE referencias SET ref_activo = 0 WHERE ref_id = :ref_id", array(":ref_id" => $_REQUEST['idRef']));

    $db->desconectar();

    return trim(1);
  }

  function formEditarReferencia(){
    $db = new Bd();
    $db->conectar();
    $resp = 0;

    $validar = $db->consulta("SELECT * FROM referencias WHERE ref_nombre = :ref_nombre AND ref_id <> :ref_id", 
                              array(":ref_nombre" => $_REQUEST['editarreferencia'], 
                                    ":ref_id" => $_REQUEST['editIdReferencia'])
                                  );

    if ($validar['cantidad_registros'] == 0) {
      $db->sentencia("UPDATE referencias SET ref_nombre = :ref_nombre, fk_marca = :fk_marca WHERE ref_id = :ref_id", 
                      array(":ref_id" => $_REQUEST['editIdReferencia'], 
                            ":ref_nombre" => $_REQUEST['editarreferencia'], 
                            ":fk_marca" => $_REQUEST['editmarca'])
                          );
      $resp = 1;
    }else{
      $resp = 2;
    }
    $db->desconectar();

    return json_encode($resp);
  }

  function formCrearMarca(){
    $db = new Bd();
    $db->conectar();
    $resp = 0;

    $validar = $db->consulta("SELECT * FROM marcas WHERE m_nombre = :m_nombre", array(":m_nombre" => $_REQUEST['addMarca']));

    if ($validar['cantidad_registros'] == 0) {
      $db->sentencia("INSERT INTO marcas (m_nombre, m_fecha_creacion, m_activa) VALUES(:m_nombre, :m_fecha_creacion, :m_activa)", 
                    array(":m_nombre" => $_REQUEST['addMarca'],
                          ":m_fecha_creacion" => date("Y-m-d"),
                          ":m_activa" => 1));
      $resp = 1;
    }else{
      $resp = 2;
    }

    $db->desconectar();
    return json_encode($resp);
  }

  function formEditarMarca(){
    $db = new Bd();
    $db->conectar();
    $resp = 0;
    
    $validar = $db->consulta("SELECT * FROM marcas WHERE m_nombre = :m_nombre AND m_id <> :m_id", 
                            array(":m_nombre" => $_REQUEST['editMarca'],  
                                  ":m_id" => $_REQUEST['editIdMarca']
                                  ));

    if ($validar['cantidad_registros'] == 0) {
      $db->sentencia("UPDATE marcas SET m_nombre = :m_nombre WHERE m_id = :m_id", 
                    array(":m_nombre" => $_REQUEST['editMarca'],
                          ":m_id" => $_REQUEST['editIdMarca']));
      $resp = 1;
    }else{
      $resp = 2;
    }

    $db->desconectar();
    return json_encode($resp);
  }

  function inHabilitarMarca(){
    $db = new Bd();
    $db->conectar();

    $db->sentencia("UPDATE marcas SET m_activa = 0 WHERE m_id = :m_id", array(":m_id" => $_REQUEST['idMarca']));

    $db->desconectar();

    return 1;
  }

  function listaApps(){
    $db = new Bd();
    $db->conectar();

    $sql = $db->consulta("SELECT * FROM apps WHERE app_activo = 1 AND app_tipo = 1");

    $db->desconectar();

    return json_encode($sql);
  }


  function listaPaises(){
    $db = new Bd();
    $db->conectar();

    $sql = $db->consulta("SELECT * FROM paises");

    $db->desconectar();

    return json_encode($sql);
  }

  function inputReferencias(){
    $db = new Bd();
    $db->conectar();

    $sql = $db->consulta("SELECT * FROM referencias WHERE ref_activo = 1");

    $db->desconectar();

    return json_encode($sql);
  }

  function formAgregarAplicacion(){
    $db = new Bd();
    $db->conectar();
    $resp = 0;

    $validar_nombre = $db->consulta("SELECT * FROM apps WHERE app_nombre = :app_nombre", array(":app_nombre" => cadena_db_insertar($_REQUEST['nombreApp'])));

    if ($validar_nombre['cantidad_registros'] == 0) {
      //Obtenemos la extension de la imagen
      $infoImg = new SplFileInfo($_FILES['imgApp']['name']);
      $extensionImg = $infoImg->getExtension();
      $nombreSinEspacios = str_replace(" ", "_", quitarAcentos($_POST['nombreApp']));

      //Validamos que tipo de imagen enviaron
      if ($_FILES['imgApp']['type'] == "image/jpeg" || $_FILES['imgApp']['type'] == "image/jpg" || $_FILES['imgApp']['type'] == "image/png") {
        $directorio = "almacenamiento/apps/" . $nombreSinEspacios;

        //Validamos si la ruta destino existe si no la creamos
        if (!file_exists($directorio)) {
          // Para crear una estructura anidada se debe especificar
          // el parámetro $recursive en mkdir().
          if(!mkdir($directorio, 0777, true)) {
            die('Fallo al crear las carpetas origen...');
          }
        }

        //Abrimos el directorio de destino
        $dir=opendir($directorio);
        //Indicamos la ruta de destino, así como el nombre del archivo
        $target_pathImg = $directorio. '/' . $nombreSinEspacios . "." . $extensionImg;
        $target_pathApk = $directorio. '/' . $nombreSinEspacios . ".apk";

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if (move_uploaded_file($_FILES['imgApp']['tmp_name'], $target_pathImg)) {
          if (move_uploaded_file($_FILES['apkApp']['tmp_name'], $target_pathApk)) {
            $db->sentencia("INSERT INTO apps(app_nombre, app_tipo, app_descripcion, app_ruta, app_imagen, app_fecha_creacion, app_activo) VALUES (:app_nombre, :app_tipo, :app_descripcion, :app_ruta, :app_imagen, :app_fecha_creacion, :app_activo)",
                            array(":app_nombre" => cadena_db_insertar($_REQUEST['nombreApp']), 
                                  ":app_tipo" => 1, 
                                  ":app_descripcion" => cadena_db_insertar($_REQUEST['descripcionApp']), 
                                  ":app_ruta" => substr($target_pathApk, 15), 
                                  ":app_imagen" => substr($target_pathImg, 15), 
                                  ":app_fecha_creacion" => date("Y-m-d H:i:s"), 
                                  ":app_activo" => 1)
                          );
            //traemos el id el app con el nombre
            $id_app = $db->consulta("SELECT * FROM apps WHERE app_nombre = :app_nombre", array(":app_nombre" => cadena_db_insertar($_REQUEST['nombreApp'])));

            if ($id_app['cantidad_registros'] == 1) {
              if(@$_REQUEST['pais']){
                foreach ($_REQUEST['pais'] as $pais) {
                  $db->sentencia("INSERT INTO apps_paises(fk_p, fk_app, ap_fecha_creacion, ap_activo) VALUES(:fk_p, :fk_app, :ap_fecha_creacion, :ap_activo)", 
                                array(":fk_p" => $pais, 
                                      ":fk_app" => $id_app[0]['app_id'], 
                                      ":ap_fecha_creacion" => date("Y-m-d H:i:s"), 
                                      ":ap_activo" => 1
                                    ));
                }
              }

              if (@$_REQUEST['ref']) {
                foreach ($_REQUEST['ref'] as $ref) {
                  $db->sentencia("INSERT INTO apps_referencias(fk_ref, fk_app, ar_fecha_creacion, ar_activo) VALUES(:fk_ref, :fk_app, :ar_fecha_creacion, :ar_activo)",
                                  array(":fk_ref" => $ref, 
                                        ":fk_app" => $id_app[0]['app_id'], 
                                        ":ar_fecha_creacion" => date("Y-m-d H:i:s"), 
                                        ":ar_activo"=> 1)
                                );
                }
              }

              $resp = 1; //Todo salio perfecto
            }else{
              $resp = 6; //No se ha insertado
            }
          }else{
            $resp = 5; //No se ha subido el apk
          }
        }else{
          $resp = 4; //No se ha subido la imagen
        }
      }else{
        $resp = 3; //Tipo de imagen no permitida
      }
    }else{
      $resp = 2; //El nombre ya se encuentra registrado
    }

    $db->desconectar();
    return json_encode($resp);
  }

  function inHabilitarApp(){
    $db = new Bd();
    $db->conectar();

    $db->sentencia("UPDATE apps SET app_activo = 0 WHERE app_id = :app_id", array(":app_id" => $_REQUEST['idApp']));

    $db->desconectar();

    return 1;
  }

  function datosApp(){
    $db = new Bd();
    $db->conectar();

    $sql = $db->consulta("SELECT * FROM apps WHERE app_id = :app_id", array(":app_id" => $_REQUEST['idApp']));

    $db->desconectar();

    return json_encode($sql[0]);
  }

  function checkPaisesEditar(){
    $listaPaises = json_decode(listaPaises(), true);
    $resp = array();

    $db = new Bd();
    $db->conectar();

    $resp['cantidad_registros'] = $listaPaises['cantidad_registros']; 

    for ($i=0; $i < $listaPaises['cantidad_registros']; $i++) { 

      $sql = $db->consulta("SELECT * FROM apps_paises WHERE fk_p = :fk_p AND fk_app = :fk_app AND ap_activo = 1", array(":fk_p" => $listaPaises[$i]['p_id'], ":fk_app" => $_REQUEST['idApp']));

      if ($sql['cantidad_registros'] == 1) {
        $resp[$i] = ["p_id" => $listaPaises[$i]['p_id'], "p_nombre" => $listaPaises[$i]['p_nombre'], "check" => 1];
      }else{
        $resp[$i] = ["p_id" => $listaPaises[$i]['p_id'], "p_nombre" => $listaPaises[$i]['p_nombre'], "check" => 0];
      }
    }

    $db->desconectar();

    return json_encode($resp);
  }

  function checkReferenciasEditar(){
    $listaReferencias = json_decode(inputReferencias(), true);
    $resp = array();

    $db = new Bd();
    $db->conectar();

    $resp['cantidad_registros'] = $listaReferencias['cantidad_registros'];

    for ($i=0; $i < $listaReferencias['cantidad_registros']; $i++) { 
      $sql = $db->consulta("SELECT * FROM apps_referencias WHERE fk_ref = :fk_ref AND fk_app = :fk_app AND ar_activo = 1", array(":fk_ref" => $listaReferencias[$i]['ref_id'], ":fk_app" => $_REQUEST['idApp']));
      
      if ($sql['cantidad_registros'] == 1) {
        $resp[$i] = ["ref_id" => $listaReferencias[$i]['ref_id'], "ref_nombre" => $listaReferencias[$i]['ref_nombre'], "check" => 1];
      }else{
        $resp[$i] = ["ref_id" => $listaReferencias[$i]['ref_id'], "ref_nombre" => $listaReferencias[$i]['ref_nombre'], "check" => 0];
      }
    }

    $db->desconectar();

    return json_encode($resp);
  }

  function formModificarAplicacion(){
    $db = new Bd();
    $db->conectar();
    $resp = 1;

    //Sube imagen y apk
    if (@$_FILES['imgAppMod'] && @$_FILES['apkAppMod']) {
      if ($_FILES['imgAppMod']['type'] == "image/jpeg" || $_FILES['imgAppMod']['type'] == "image/jpg" || $_FILES['imgAppMod']['type'] == "image/png") {
        
        //Obtenemos la extension del archivo para agregarla al a final
        $info = new SplFileInfo($_FILES['imgAppMod']['name']);
        $extensionImg = $info->getExtension();

        $nombreSinEspacios = str_replace(" ", "_", quitarAcentos($_POST['nombreAppMod']));

        $directorio = "../_upload/apps/" . $_POST['nombreAppMod'];

        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
          // Para crear una estructura anidada se debe especificar
          unlink(".." . $_POST['imgAppModAnt']);
          unlink(".." . $_POST['apkAppModAnt']);
          rename("..". $_POST['rutaApp'], $directorio);
          /*if(!mkdir($directorio, 0777, true)) {
            die('Fallo al crear las carpetas...');
          }*/
        }

        //Abrimos el directorio de destino
        $dir=opendir($directorio);
        //Indicamos la ruta de destino, así como el nombre del archivo
        $target_pathImg = $directorio.'/' . $_POST['nombreAppMod'] . "." . $extensionImg;
        $target_pathApk = $directorio.'/' . $_POST['nombreAppMod'] . ".apk";


        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($_FILES['imgAppMod']['tmp_name'], $target_pathImg) && move_uploaded_file($_FILES['apkAppMod']['tmp_name'], $target_pathApk)) {
          $app->setId($_POST['idAppMod']);
          $app->setNombre($_POST['nombreAppMod']);
          $app->setDescripcion($_POST['descripcionAppMod']);
          $app->setRuta(substr($directorio, 2));
          $app->setApk(substr($target_pathApk, 2));
          $app->setImagen(substr($target_pathImg, 2));
          $app->setFechaCreacion(date('Y-m-d H:i:m'));
          if($app_manejo->modificarApp($app) == 1){
            if (isset($_POST['refMod'])) {
              $app_manejo->borrarAppUReferencia($_POST['idAppMod']);
              foreach ($_POST['refMod'] as $ref) {
                $app_manejo->crearAppUReferencia($_POST['idAppMod'], $ref);
              }
            }
            echo "OK";
          }else{
            echo "Error al Modificar 1";
          }
        } else {
          echo "Ha ocurrido un error al subir, por favor inténtelo de nuevo";
        }
        closedir($dir); //Cerramos el directorio de destino
      }else{
        echo "Error tipo de archivo";
      }


    //Si solo sube la imagenes
    }else if(@$_FILES['imgAppMod']){
      $resp = "Solo se adjunto la imagen";
    //Si solo sube apk
    }elseif (@$_FILES['apkAppMod']){
      $resp = "Solo se adjuntos el apk";
    //Si solo actualizar datos
    }else{
      //Traemos la extension de la imagen
      $extensionImg = explode(".", $_REQUEST['imgAppModAnt']);

      $directorio = "apps/" . $nombreSinEspacios;
      $directorioImg = $directorio . "/" . $nombreSinEspacios . "." . $extensionImg[1]; 
      $directorioApk = $directorio . "/" . $nombreSinEspacios . ".apk";
      //Validamos si el directorio existe, si no existe los remplazamos 
      if(!file_exists("almacenamiento" . $directorio)){
        //Se renombre las carpeta y los nombre de la app   
        rename("almacenamiento/". $_POST['rutaApp'], "almacenamiento/apps/" . $nombreSinEspaciosAnt . "/" . $nombreSinEspacios . ".apk");
        rename("almacenamiento/". $_POST['imgAppModAnt'], "almacenamiento/apps/" . $nombreSinEspaciosAnt . "/" . $nombreSinEspacios . "." . $extensionImg[1]);
        rename("almacenamiento/apps/". $nombreSinEspaciosAnt, "almacenamiento/" . $directorio);
      }

      $db->sentencia("UPDATE apps SET app_nombre = :app_nombre, app_descripcion = :app_descripcion, app_ruta = :app_ruta, app_imagen = :app_imagen WHERE app_id = :app_id", 
                      array(":app_nombre" => cadena_db_insertar($_REQUEST['nombreAppMod']),
                            ":app_descripcion" => cadena_db_insertar($_REQUEST['descripcionAppMod']),
                            ":app_ruta" => $directorioApk,
                            ":app_imagen" => $directorioImg,
                            ":app_id" => $_REQUEST['idAppMod']
                    ));
    }

    //Deshabilitamos todos los paises con el id de la app
    $db->sentencia("UPDATE apps_paises SET ap_activo = 0 WHERE fk_app = :fk_app", array(":fk_app" => $_REQUEST['idAppMod']));  

    //Validamos si etsa seleccionar algunos paises
    if (@$_REQUEST['paisEdit']) {
      foreach (@$_REQUEST['paisEdit'] as $pais) {
        $validar = $db->consulta("SELECT ap_id FROM apps_paises WHERE fk_p = :fk_p AND fk_app = :fk_app", array(":fk_p" => $pais, "fk_app" => $_REQUEST['idAppMod']));
        //Si hay coincidencia se cambia el estado si no se agrega el registro 
        if ($validar['cantidad_registros'] == 1) {
          $db->sentencia("UPDATE apps_paises SET ap_activo = 1 WHERE ap_id = :ap_id", array(":ap_id" => $validar[0]['ap_id']));
        }else{
          $db->sentencia("INSERT INTO apps_paises(fk_p, fk_app, ap_fecha_creacion, ap_activo) VALUES(:fk_p, :fk_app, :ap_fecha_creacion, 1)",
                        array(":fk_p" => $pais, 
                              ":fk_app" => $_REQUEST['idAppMod'], 
                              ":ap_fecha_creacion" => date("Y-m-d H:i:s")
                        ));
        } 
      }
    }

    //Cambiamos a 0 todas la refencias
    $db->sentencia("UPDATE apps_referencias SET ar_activo = 0 WHERE fk_app = :fk_app", array(":fk_app" => $_REQUEST['idAppMod']));

    //Validamos si selecionaron alguna referencia
    if (@$_REQUEST['refEdit']) {
      foreach ($_REQUEST['refEdit'] as $ref) {
        $validar = $db->consulta("SELECT ar_id FROM apps_referencias WHERE fk_ref = :fk_ref AND fk_app = :fk_app", array(":fk_ref" => $ref, ":fk_app" => $_REQUEST['idAppMod']));
        
        if ($validar['cantidad_registros'] == 1) {
          $db->sentencia("UPDATE apps_referencias SET ar_activo = 1 WHERE ar_id = :ar_id", array(":ar_id" => $validar[0]['ar_id']));
        }else{
          $db->sentencia("INSERT INTO apps_referencias(fk_ref, fk_app, ar_fecha_creacion, ar_activo) VALUES(:fk_ref, :fk_app, :ar_fecha_creacion, 1)", 
                        array(":fk_ref" => $ref, 
                              ":fk_app" => $_REQUEST['idAppMod'], 
                              ":ar_fecha_creacion" => date("Y-m-d H:i:s")
                        ));
        }

      }
    }

    $db->desconectar();

    return json_encode($resp);
  }

  if(@$_REQUEST['accion']){
    if(function_exists($_REQUEST['accion'])){
      echo($_REQUEST['accion']());
    }
  }
?>