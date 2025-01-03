<?php 
namespace modeloPlan;
use PDO;

include_once("../entidad/plan.entidad.php");
include_once("../entorno/conexion.php");

class Plan {
    private $id;
    private $nombre;
    private $descripcion;
    private $cantidad_dias;
    private $id_libro;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadPlan\Plan $planE)
    {
        $this->conexion = new \Conexion();
        $this->id = $planE->getId();
        $this->nombre = $planE->getNombre();
        $this->descripcion = $planE->getDescripcion();
        $this->cantidad_dias = $planE->getCantidadDias();
        $this->id_libro = $planE->getIdLibro();
    }

    /**
     * Método para crear un nuevo plan en la base de datos
     */
    public function crearPlan()
    {
        $this->consulta = "INSERT INTO planes (nombre, descripcion, cantidad_dias, id_libro) VALUES (:nombre, :descripcion, :cantidad_dias, :id_libro)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':nombre', $this->nombre);
        $this->resultado->bindParam(':descripcion', $this->descripcion);
        $this->resultado->bindParam(':cantidad_dias', $this->cantidad_dias);
        $this->resultado->bindParam(':id_libro', $this->id_libro);

        $this->resultado->execute();

        // Verifica si la inserción fue exitosa y obtiene el último ID insertado
        if ($this->resultado->rowCount() >= 1) {
            $this->retorno = $this->conexion->con->lastInsertId(); // Devuelve el ID del último registro insertado
        } else {
            $this->retorno = null; // Retorna 0 en caso de error o si no hubo inserción
        }

        return $this->retorno;
    }


    /**
     * Método para obtener todos los planes
     */
    public function obtenerPlanes()
    {
        $this->consulta = "SELECT l.nombre AS libro, l.autor, p.* FROM planes p INNER JOIN libros l ON p.id_libro = l.id ORDER BY RAND()";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPlanesUser($id_user)
    {
        
        $this->consulta = "SELECT l.nombre AS libro, l.autor, p.*, p_u.id AS id_plan_user FROM planes p INNER JOIN libros l ON p.id_libro = l.id INNER JOIN planes_users p_u ON p.id=p_u.id_plan WHERE p_u.id_user=".$id_user;
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener todos los planes
     */
    public function obtenerPlanesPorUser($id_user)
    {
        $this->consulta = "SELECT p.id, p.nombre FROM planes_users p_u INNER JOIN planes p ON p.id=p_u.id_plan WHERE p_u.id_user=".$id_user;
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener planes por libro
     */
    public function obtenerPlanesPorLibro($id_libro)
    {
        $this->consulta = "SELECT * FROM planes WHERE id_libro = :id_libro";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_libro', $id_libro);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }


    public function obtenerPlan($id)
    {
        $this->consulta = "SELECT p.*, l.imagen AS img_libro, l.nombre AS nom_libro, l.autor AS autor FROM planes p INNER JOIN libros l ON l.id=p.id_libro WHERE p.id=".$id;
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Método para actualizar un plan existente
     */
    public function actualizarPlan()
    {
        $this->consulta = "UPDATE planes SET nombre = :nombre, descripcion = :descripcion, cantidad_dias = :cantidad_dias, id_libro = :id_libro WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':nombre', $this->nombre);
        $this->resultado->bindParam(':descripcion', $this->descripcion);
        $this->resultado->bindParam(':cantidad_dias', $this->cantidad_dias);
        $this->resultado->bindParam(':id_libro', $this->id_libro);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para eliminar un plan
     */
    public function eliminarPlan()
    {
        $this->consulta = "DELETE FROM planes WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }
}
?>
