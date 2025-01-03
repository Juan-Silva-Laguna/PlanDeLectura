<?php
include_once("../entidad/plan.entidad.php");
include_once("../modelo/plan.modelo.php");

include_once("../entidad/item.entidad.php");
include_once("../modelo/item.modelo.php");

include_once("../entidad/sub_item.entidad.php");
include_once("../modelo/sub_item.modelo.php");

include_once("../entidad/plan_user.entidad.php");
include_once("../modelo/plan_user.modelo.php");

try {
    $PlanUserE = new \entidadPlanUser\PlanUser();
    $PlanUserM = new \modeloPlanUser\PlanUser($PlanUserE);
    $plan_user = $PlanUserM->obtenerPlanUser($_POST['id_plan_user']);

    $PlanE = new \entidadPlan\Plan();
    $PlanM = new \modeloPlan\Plan($PlanE);
    $plan = $PlanM->obtenerPlan($plan_user['id_plan']);

    $ItemE = new \entidadItem\Item();
    $ItemM = new \modeloItem\Item($ItemE);
    $items = $ItemM->obtenerItemsPorPlan($plan_user['id_plan']);

    foreach ($items as $key_item => $item) {
        $SubItemE = new \entidadSubItem\SubItem();
        $SubItemM = new \modeloSubItem\SubItem($SubItemE);
        $items[$key_item]['sub_items'] = $SubItemM->obtenerSubItemsPorItemConInfoUser($item['id'], $_POST['id_plan_user']);
        
        $items[$key_item]['evaluacion_item'] = $ItemM->obtenerEvaluacionItemConInfoUser($item['id'], $_POST['id_plan_user']);
    }

    $plan['items'] = $items;

    // Respuesta de éxito si todo el proceso se completa sin errores
    echo json_encode($plan);

} catch (Exception $e) {
    // Captura cualquier error en el proceso y envía un mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
}

?>
