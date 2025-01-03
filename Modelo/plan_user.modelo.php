<?php 
namespace modeloPlanUser;
use PDO;

include_once("../entidad/plan_user.entidad.php");
include_once("../entorno/conexion.php");

class PlanUser {
    private $id;
    private $id_user;
    private $id_plan;
    private $fecha_inicio;
    private $fecha_fin;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadPlanUser\PlanUser $planUserE)
    {
        $this->conexion = new \Conexion();
        $this->id = $planUserE->getId();
        $this->id_user = $planUserE->getIdUser();
        $this->id_plan = $planUserE->getIdPlan();
        $this->fecha_inicio = $planUserE->getFechaInicio();
        $this->fecha_fin = $planUserE->getFechaFin();
    }

    public function crearPlanUser()
    {
        $this->consulta = "INSERT INTO planes_users (id_user, id_plan, fecha_inicio, fecha_fin) VALUES (:id_user, :id_plan, :fecha_inicio, :fecha_fin)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':id_user', $this->id_user);
        $this->resultado->bindParam(':id_plan', $this->id_plan);
        $this->resultado->bindParam(':fecha_inicio', $this->fecha_inicio);
        $this->resultado->bindParam(':fecha_fin', $this->fecha_fin);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? $this->conexion->con->lastInsertId() : null;

        return $this->retorno;
    }

    public function obtenerPlanesUsers()
    {
        $this->consulta = "SELECT * FROM planes_users ORDER BY fecha_inicio ASC";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPlanUser($id)
    {
        $this->consulta = "SELECT * FROM planes_users WHERE id = ".$id;
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarPlanUser()
    {
        $this->consulta = "UPDATE planes_users SET id_user = :id_user, id_plan = :id_plan, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':id_user', $this->id_user);
        $this->resultado->bindParam(':id_plan', $this->id_plan);
        $this->resultado->bindParam(':fecha_inicio', $this->fecha_inicio);
        $this->resultado->bindParam(':fecha_fin', $this->fecha_fin);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    public function eliminarPlanUser()
    {
        $this->consulta = "DELETE FROM planes_users WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }
}
?>
