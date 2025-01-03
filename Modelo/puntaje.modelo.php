<?php 
namespace modeloPuntaje;
use PDO;

include_once("../entidad/puntaje.entidad.php");
include_once("../entorno/conexion.php");

class Puntaje {
    private $id;
    private $id_plan_user;
    private $id_evaluacion_sub_item;
    private $id_evaluacion_item;
    private $fecha;
    private $respuesta;
    private $aprobo;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadPuntaje\Puntaje $PuntajeE)
    {
        $this->conexion = new \Conexion();
        $this->id = $PuntajeE->getId();
        $this->id_plan_user = $PuntajeE->getIdPlanUser();
        $this->id_evaluacion_sub_item = $PuntajeE->getIdEvaluacionSubItem();
        $this->id_evaluacion_item = $PuntajeE->getIdEvaluacionItem();
        $this->fecha = $PuntajeE->getFecha();
        $this->respuesta = $PuntajeE->getRespuesta();
        $this->aprobo = $PuntajeE->getAprobo();
    }

    /**
     * Método para crear un nuevo puntajes en la base de datos
     */
    public function crearPuntaje()
    {
        $this->consulta = "INSERT INTO puntajes (id_plan_user, id_evaluacion_sub_item, id_evaluacion_item, fecha, respuesta, aprobo) 
                           VALUES (:id_plan_user, :id_evaluacion_sub_item, :id_evaluacion_item, :fecha, :respuesta, :aprobo)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':id_plan_user', $this->id_plan_user);
        $this->resultado->bindParam(':id_evaluacion_sub_item', $this->id_evaluacion_sub_item);
        $this->resultado->bindParam(':id_evaluacion_item', $this->id_evaluacion_item);
        $this->resultado->bindParam(':fecha', $this->fecha);
        $this->resultado->bindParam(':respuesta', $this->respuesta);
        $this->resultado->bindParam(':aprobo', $this->aprobo);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? $this->conexion->con->lastInsertId() : null;

        return $this->retorno;
    }

    /**
     * Método para obtener todos los registros de Puntaje
     */
    public function obtenerPuntajes()
    {
        $this->consulta = "SELECT * FROM puntajes ORDER BY fecha ASC";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener un puntajes por su ID
     */
    public function obtenerPuntajePorId($id)
    {
        $this->consulta = "SELECT * FROM puntajes WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $id);
        $this->resultado->execute();

        return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Método para actualizar un registro de puntajes existente
     */
    public function actualizarPuntaje()
    {
        $this->consulta = "UPDATE puntajes SET respuesta = :respuesta, aprobo = :aprobo WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':respuesta', $this->respuesta);
        $this->resultado->bindParam(':aprobo', $this->aprobo);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para eliminar un Puntaje
     */
    public function eliminarPuntaje()
    {
        $this->consulta = "DELETE FROM puntajes WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    //PUNTOS POR PLAN DE USUARIO
    public function obtenerPuntos($id_user, $id_plan)
    {
        $this->consulta = "SELECT COUNT(*) AS puntos FROM puntajes p INNER JOIN planes_users p_u ON p.id_plan_user=p_u.id WHERE p_u.id_user = ".$id_user." AND p_u.id_plan = ".$id_plan;
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        $this->retorno = $this->resultado->fetch(PDO::FETCH_ASSOC);
         return $this->retorno['puntos'];
    }

    //PUNTOS APROBADOS POR PLAN DE USUARIO
    public function obtenerPuntosEstado($id_user, $estado, $id_plan)
    {
        //null = no presento
        // 1 = aprobo
        // 0 = no aprobo
        $this->consulta = "SELECT COUNT(*) AS puntos FROM puntajes p INNER JOIN planes_users p_u ON p.id_plan_user=p_u.id WHERE p.aprobo=".$estado." AND p_u.id_user = ".$id_user." AND p_u.id_plan = ".$id_plan;
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        $this->retorno = $this->resultado->fetch(PDO::FETCH_ASSOC);
        return $this->retorno['puntos'];
    }
}
?>
