<?php
include_once("../entidad/usuario.entidad.php");
include_once("../modelo/usuario.modelo.php");

include_once("../entidad/premio.entidad.php");
include_once("../modelo/premio.modelo.php");

include_once("../entidad/plan_user.entidad.php");
include_once("../modelo/plan_user.modelo.php");

include_once("../entidad/puntaje.entidad.php");
include_once("../modelo/puntaje.modelo.php");

include_once("../entidad/item.entidad.php");
include_once("../modelo/item.modelo.php");

include_once("../entidad/sub_item.entidad.php");
include_once("../modelo/sub_item.modelo.php");


try {
    // Crear entidad y modelo para User
    $UserE = new \entidadUser\User();
    $UserE->setNombre($_POST['nombre']);            
    $UserE->setPassword($_POST['codigo']);  

    $UserM = new \modeloUser\User($UserE);
    $id_user = $UserM->crearUsuario();
    if (isset($_POST['premios'])) {
        foreach ($_POST['premios'] as $key => $val) {
            // Crear Item
            $PremioE = new \entidadPremio\Premio();
            $PremioE->setNombre($val['nombre']);
            $PremioE->setDescripcion($val['descripcion']);
            
            if (isset($_FILES['premios']['tmp_name'][$key]['imagen']) && $_FILES['premios']['error'][$key]['imagen'] === UPLOAD_ERR_OK) {
                $imagen = guardarImagen([
                    'name' => $_FILES['premios']['name'][$key]['imagen'],
                    'type' => $_FILES['premios']['type'][$key]['imagen'],
                    'tmp_name' => $_FILES['premios']['tmp_name'][$key]['imagen'],
                    'error' => $_FILES['premios']['error'][$key]['imagen'],
                    'size' => $_FILES['premios']['size'][$key]['imagen']
                ]);
                
                if (strpos($imagen, 'Error') === false) {
                    $PremioE->setImagen($imagen);
                } else {
                    echo $imagen;
                    exit;
                }
            } else {
                echo "Error en la carga de la imagen del premio {$key}.";
                exit;
            }
            
    
            $PremioE->setIdPlan($_POST['id_plan']);
            $PremioE->setIdUser($id_user);
    
            $PremioM = new \modeloPremio\Premio($PremioE);
            $id_premio = $PremioM->crearPremio();
        }
    }
    

    $PlanUserE = new \entidadPlanUser\PlanUser();
    $PlanUserE->setIdPlan($_POST['id_plan']);            
    $PlanUserE->setIdUser($id_user);  
    $PlanUserE->setFechaInicio($_POST['fecha_ini']);   
    $PlanUserE->setFechaFin($_POST['fecha_fin']);   
    $PlanUserM = new \modeloPlanUser\PlanUser($PlanUserE);
    $id_plan_user = $PlanUserM->crearPlanUser();

    $fechaInicio = new DateTime($_POST['fecha_ini']); 

    $ItemE = new \entidadItem\Item();
    $ItemM = new \modeloItem\Item($ItemE);
    $items = $ItemM->obtenerItemsPorPlan($_POST['id_plan']);

    foreach ($items as $key_item => $item) {
        $SubItemE = new \entidadSubItem\SubItem();
        $SubItemM = new \modeloSubItem\SubItem($SubItemE);
        $sub_items = $SubItemM->obtenerSubItemsPorItem($item['id']);
        foreach ($sub_items as $key_sub_item => $sub_item) {
            $id_ev_sub_item = $SubItemM->obtenerIdEvaluacionSubItem($sub_item['id']);
            $PuntajeE = new \entidadPuntaje\Puntaje();
            $PuntajeE->setIdPlanUser($id_plan_user);            
            $PuntajeE->setFecha($fechaInicio->format('Y-m-d'));   
            $PuntajeE->setIdEvaluacionSubItem($id_ev_sub_item['id_evaluacion']);   
            $PuntajeM = new \modeloPuntaje\Puntaje($PuntajeE);
            $ok = $PuntajeM->crearPuntaje();


            $fechaInicio->modify('+1 day');
        }
        $ids_ev_items = $ItemM->obtenerIdsEvaluacionesItems($item['id']);
        foreach ($ids_ev_items as $key => $val) {
            $PuntajeE = new \entidadPuntaje\Puntaje();
            $PuntajeE->setIdPlanUser($id_plan_user);            
            $PuntajeE->setFecha($fechaInicio->format('Y-m-d'));   
            $PuntajeE->setIdEvaluacionItem($val['id_evaluacion']);   
            $PuntajeM = new \modeloPuntaje\Puntaje($PuntajeE);
            $ok = $PuntajeM->crearPuntaje();
        }
    }

    // Respuesta de éxito si todo el proceso se completa sin errores
    echo json_encode(['status' => 'success', 'message' => 'El plan de lectura fue creado satisfactoriamente', 'data'=>$id_plan_user]);

} catch (Exception $e) {
    // Captura cualquier error en el proceso y envía un mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
}

function guardarImagen($img) {
    $uploadDir = 'Imagenes/Premios/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $nombreAleatorio = bin2hex(random_bytes(10));
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $nuevoNombreArchivo = $nombreAleatorio . '.' . $extension;

    $uploadFile = $uploadDir . $nuevoNombreArchivo;

    if ($img['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($img['tmp_name'], $uploadFile)) {
            return $uploadFile;
        } else {
            return 'Error al mover la imagen.';
        }
    } else {
        return 'No se ha cargado ninguna imagen o ha ocurrido un error.';
    }
}

?>
