<?php
include_once("../entidad/puntaje.entidad.php");
include_once("../modelo/puntaje.modelo.php");

try {
    $PuntajeE = new \entidadPuntaje\Puntaje();
    $PuntajeE->setRespuesta($_POST['seleccionada']);
    $PuntajeE->setAprobo($_POST['aprobo']);
    $PuntajeE->setId($_POST['id']);
    $PuntajeM = new \modeloPuntaje\Puntaje($PuntajeE);
    $mensaje = $PuntajeM->actualizarPuntaje();

    // Respuesta de éxito si todo el proceso se completa sin errores
    if ($_POST['aprobo']==1) {
        echo json_encode(['status' => 'success', 'message' => 'Felicidades aprobaste']);
    }else{
        echo json_encode(['status' => 'error', 'message' => 'Lastimosamente no aprobaste']);
    }

} catch (Exception $e) {
    // Captura cualquier error en el proceso y envía un mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
}

?>
