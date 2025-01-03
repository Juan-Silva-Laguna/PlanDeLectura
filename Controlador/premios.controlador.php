<?php
include_once("../entidad/plan.entidad.php");
include_once("../modelo/plan.modelo.php");

include_once("../entidad/premio.entidad.php");
include_once("../modelo/premio.modelo.php");

include_once("../entidad/puntaje.entidad.php");
include_once("../modelo/puntaje.modelo.php");
    
try {
    $PlanE = new \entidadPlan\Plan();
    $PlanM = new \modeloPlan\Plan($PlanE);
    
    session_start();
    $id_user = $_SESSION['id'];

    $planes = $PlanM->obtenerPlanesPorUser($id_user);

    foreach ($planes as $key => $plan) {
        $PremioE = new \entidadPremio\Premio();
        $PremioM = new \modeloPremio\Premio($PremioE);
        $planes[$key]['premios'] = $PremioM->obtenerPremiosPorPlan($plan['id'], $id_user);

        $PuntajeE = new \entidadPuntaje\Puntaje();
        $PuntajeM = new \modeloPuntaje\Puntaje($PuntajeE);
        $planes[$key]['puntos'] = $PuntajeM->obtenerPuntos($id_user, $plan['id']);
        $planes[$key]['puntos_aprobados'] = $PuntajeM->obtenerPuntosEstado($id_user, 1, $plan['id']);
        $planes[$key]['puntos_reprobados'] = $PuntajeM->obtenerPuntosEstado($id_user, 0, $plan['id']);

    }

    // Respuesta de éxito si todo el proceso se completa sin errores
    echo json_encode($planes);

} catch (Exception $e) {
    // Captura cualquier error en el proceso y envía un mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
}

?>
