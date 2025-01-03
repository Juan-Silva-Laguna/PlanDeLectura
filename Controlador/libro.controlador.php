<?php
include_once("../entidad/libro.entidad.php");
include_once("../modelo/libro.modelo.php");

include_once("../entidad/plan.entidad.php");
include_once("../modelo/plan.modelo.php");

include_once("../entidad/puntaje.entidad.php");
include_once("../modelo/puntaje.modelo.php");

$operacion= $_POST['operacion'];
$LibroE = new \entidadLibro\Libro();

if ($operacion == 'Creo') {
    $nombreLibro = $_POST['nombre'];
    $LibroE->setNombre($nombreLibro);

    $descripcion = $_POST['descripcion'];
    $LibroE->setDescripcion($descripcion);

    $autor = $_POST['autor'];
    $LibroE->setAutor($autor);

    // Guardar la imagen y obtener el nombre de archivo
    $imagen = guardarImagen($_FILES['imagen']);
    if (strpos($imagen, 'Error') === false) {
        $LibroE->setImagen($imagen);
    } else {
        // Manejar el error de imagen (si es necesario)
        echo $imagen; // O maneja el error de otra manera según tu lógica
        exit;
    }

    $LibroM = new \modeloLibro\Libro($LibroE);
    $mensaje = $LibroM->crearLibro();

}
else if ($operacion == 'Consultar'){
    $LibroM = new \modeloLibro\Libro($LibroE);
    $mensaje = $LibroM->mostrarLibros();
}
else if ($operacion == 'ConsultarLibro'){
    $idLibro= $_POST['id'];

    $LibroE->setId($idLibro);
    $LibroM = new \modeloLibro\Libro($LibroE);
    $libro = $LibroM->obtenerLibro();

    $PlanE = new \entidadPlan\Plan();
    $PlanM = new \modeloPlan\Plan($PlanE);
    $planes = $PlanM->obtenerPlanesPorLibro($idLibro);

    $mensaje=['libro'=>$libro, 'planes'=>$planes];
}
else if ($operacion == 'ConsultarPlanes'){
    $PlanE = new \entidadPlan\Plan();
    $PlanM = new \modeloPlan\Plan($PlanE);
    $planes = $PlanM->obtenerPlanes();

    $mensaje=['planes'=>$planes];
}
else if ($operacion == 'ConsultarPlanesUsuario'){
    session_start();
        $id_user = $_SESSION['id'];
        
    $PlanE = new \entidadPlan\Plan();
    $PlanM = new \modeloPlan\Plan($PlanE);
    $planes = $PlanM->obtenerPlanesUser($id_user);

    foreach ($planes as $key => $plan) {
        $PuntajeE = new \entidadPuntaje\Puntaje();
        $PuntajeM = new \modeloPuntaje\Puntaje($PuntajeE);
        $planes[$key]['puntos'] = $PuntajeM->obtenerPuntos($id_user, $plan['id']);
        $planes[$key]['puntos_aprobados'] = $PuntajeM->obtenerPuntosEstado($id_user, 1, $plan['id']);
        $planes[$key]['puntos_reprobados'] = $PuntajeM->obtenerPuntosEstado($id_user, 0, $plan['id']);
    }

    $mensaje=['planes'=>$planes];
}
else if ($operacion == 'Edito'){
    $idLibro= $_POST['id'];
    $nombreLibro= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];
    $LibroE->setNombre($nombreLibro);
    $LibroE->setDescripcion($descripcion);
    $LibroE->setId($idLibro);

    if ($_FILES['imagen']['name'] != null) {
        $imagen = guardarImagen($_FILES['imagen']);
        $LibroE->setImagen($imagen);
    }

    $LibroM = new \modeloLibro\Libro($LibroE);
    $mensaje = $LibroM->editarLibro();
}else if ($operacion == 'ConsultarAleatorios'){
    $LibroM = new \modeloLibro\Libro($LibroE);
    $mensaje = $LibroM->mostrarLibrosAleatorios();
}

unset($LibroE);
unset($LibroM);

function guardarImagen($img) {
    $uploadDir = 'Imagenes/Libros/'; // Cambia esto según tu estructura de carpetas

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

function eliminarImagen($ruta) {
    $uploadDir = 'Imagenes/Libros/'; // Cambia esto según tu estructura de carpetas

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


echo json_encode($mensaje);
?>