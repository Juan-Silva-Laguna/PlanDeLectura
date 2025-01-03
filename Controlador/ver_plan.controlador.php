<?php
include_once("../entidad/plan.entidad.php");
include_once("../modelo/plan.modelo.php");

include_once("../entidad/item.entidad.php");
include_once("../modelo/item.modelo.php");

include_once("../entidad/sub_item.entidad.php");
include_once("../modelo/sub_item.modelo.php");

try {
    $PlanE = new \entidadPlan\Plan();
    $PlanM = new \modeloPlan\Plan($PlanE);
    $plan = $PlanM->obtenerPlan($_POST['id_plan']);


    $ItemE = new \entidadItem\Item();
    $ItemM = new \modeloItem\Item($ItemE);
    $items = $ItemM->obtenerItemsPorPlan($_POST['id_plan']);

    foreach ($items as $key_item => $item) {
        $SubItemE = new \entidadSubItem\SubItem();
        $SubItemM = new \modeloSubItem\SubItem($SubItemE);
        $items[$key_item]['sub_items'] = $SubItemM->obtenerSubItemsPoritem($item['id']);
    }

    $plan['items'] = $items;

    // Respuesta de éxito si todo el proceso se completa sin errores
    echo json_encode($plan);

} catch (Exception $e) {
    // Captura cualquier error en el proceso y envía un mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
}


function guardarImagen($img) {
    $uploadDir = 'Imagenes/Premios/'; // Cambia esto según tu estructura de carpetas

    // Verificar si el directorio de destino existe, si no, crearlo
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Permisos 0755 y recursivo
    }

    // Generar un nombre aleatorio de 20 caracteres alfanuméricos
    $nombreAleatorio = bin2hex(random_bytes(10)); // 20 caracteres hexadecimales
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $nuevoNombreArchivo = $nombreAleatorio . '.' . $extension;

    $uploadFile = $uploadDir . $nuevoNombreArchivo;

    // Manejar la carga de la imagen
    if (isset($img) && $img['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($img['tmp_name'], $uploadFile)) {
            // Devolver el nombre del archivo o la ruta
            return $uploadFile;
        } else {
            // Error al mover el archivo
            return 'Error al mover la imagen.';
        }
    } else {
        // Error en la carga de la imagen
        return 'No se ha cargado ninguna imagen o ha ocurrido un error.';
    }
}

?>
