<?php
include_once("../entidad/plan.entidad.php");
include_once("../modelo/plan.modelo.php");

include_once("../entidad/item.entidad.php");
include_once("../modelo/item.modelo.php");

include_once("../entidad/evaluacion_item.entidad.php");
include_once("../modelo/evaluacion_item.modelo.php");

include_once("../entidad/sub_item.entidad.php");
include_once("../modelo/sub_item.modelo.php");

include_once("../entidad/evaluacion_sub_item.entidad.php");
include_once("../modelo/evaluacion_sub_item.modelo.php");

try {
    // Crear entidad y modelo para Plan
    $PlanE = new \entidadPlan\Plan();
    $PlanE->setNombre($_POST['nombre_plan']);            
    $PlanE->setDescripcion($_POST['descripcion_plan']);  
    $PlanE->setCantidadDias($_POST['cantidad_dias']);
    $PlanE->setIdLibro($_POST['id_libro']); 

    $PlanM = new \modeloPlan\Plan($PlanE);
    $id_plan = $PlanM->crearPlan();

    foreach ($_POST['items'] as $key_item => $item) {

        // Crear Item
        $ItemE = new \entidadItem\Item();
        $ItemE->setItem($item['item']);
        $ItemE->setIdPlan($id_plan);

        $ItemM = new \modeloItem\Item($ItemE);
        $id_Item = $ItemM->crearItem();

        // Crear EvaluacionItem asociadas al Item
        if (isset($item['evaluacion'])) {
            foreach ($item['evaluacion'] as $evaluacion) {
                $EvaluacionItemE = new \entidadEvaluacionItem\EvaluacionItem();
                $EvaluacionItemE->setPregunta($evaluacion['pregunta']);
                $EvaluacionItemE->setRespuesta1($evaluacion['respuesta1']);
                $EvaluacionItemE->setRespuesta2($evaluacion['respuesta2']);
                $EvaluacionItemE->setRespuesta3($evaluacion['respuesta3']);
                $EvaluacionItemE->setRespuesta4($evaluacion['respuesta4']);
                $EvaluacionItemE->setRespuestaCorrecta($evaluacion['respuesta_correcta']);
                $EvaluacionItemE->setIdItem($id_Item);

                $EvaluacionItemM = new \modeloEvaluacionItem\EvaluacionItem($EvaluacionItemE);
                $EvaluacionItemM->crearEvaluacionItem();
            }
        }

        // Crear SubItems asociados al Item
        if (isset($item['sub_items'])) {
            foreach ($item['sub_items'] as $subitem) {
                $SubItemE = new \entidadSubItem\SubItem();
                $SubItemE->setSubItem($subitem['sub_item']);
                $SubItemE->setIdItem($id_Item);

                $SubItemM = new \modeloSubItem\SubItem($SubItemE);
                $id_SubItem = $SubItemM->crearSubItem();

                // Crear EvaluacionSubItem asociadas al SubItem
                if (isset($subitem['evaluacion'])) {
                    $EvaluacionSubItemE = new \entidadEvaluacionSubItem\EvaluacionSubItem();
                    $EvaluacionSubItemE->setPregunta($subitem['evaluacion']['pregunta']);
                    $EvaluacionSubItemE->setRespuesta1($subitem['evaluacion']['respuesta1']);
                    $EvaluacionSubItemE->setRespuesta2($subitem['evaluacion']['respuesta2']);
                    $EvaluacionSubItemE->setRespuesta3($subitem['evaluacion']['respuesta3']);
                    $EvaluacionSubItemE->setRespuesta4($subitem['evaluacion']['respuesta4']);
                    $EvaluacionSubItemE->setRespuestaCorrecta($subitem['evaluacion']['respuesta_correcta']);
                    $EvaluacionSubItemE->setIdSubItem($id_SubItem);

                    $EvaluacionSubItemM = new \modeloEvaluacionSubItem\EvaluacionSubItem($EvaluacionSubItemE);
                    $EvaluacionSubItemM->crearEvaluacionSubItem();
                }
            }
        }
    }

    // Respuesta de éxito si todo el proceso se completa sin errores
    echo json_encode(['status' => 'success', 'message' => 'El plan de lectura fue creado satisfactoriamente', 'data'=>$id_plan]);

} catch (Exception $e) {
    // Captura cualquier error en el proceso y envía un mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
}
?>
