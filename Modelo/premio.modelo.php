<?php 
namespace modeloPremio;
use PDO;

include_once("../entidad/premio.entidad.php");
include_once("../entorno/conexion.php");

class Premio {
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $id_user;
    private $id_plan;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadPremio\Premio $premioE)
    {
        $this->conexion = new \Conexion();
        $this->id = $premioE->getId();
        $this->nombre = $premioE->getNombre();
        $this->descripcion = $premioE->getDescripcion();
        $this->imagen = $premioE->getImagen();
        $this->id_user = $premioE->getIdUser();
        $this->id_plan = $premioE->getIdPlan();
    }

    public function crearPremio()
    {
        $this->consulta = "INSERT INTO premios (nombre, descripcion, imagen, id_user, id_plan) VALUES (:nombre, :descripcion, :imagen, :id_user, :id_plan)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':nombre', $this->nombre);
        $this->resultado->bindParam(':descripcion', $this->descripcion);
        $this->resultado->bindParam(':imagen', $this->imagen);
        $this->resultado->bindParam(':id_user', $this->id_user);
        $this->resultado->bindParam(':id_plan', $this->id_plan);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? $this->conexion->con->lastInsertId() : null;

        return $this->retorno;
    }

    public function obtenerPremios()
    {
        $this->consulta = "SELECT * FROM premios ORDER BY nombre ASC";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPremiosPorPlan($id_plan, $id_user)
    {
        $this->consulta = "SELECT * FROM premios WHERE id_plan=".$id_plan." AND id_user=".$id_user;
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarPremio()
    {
        $this->consulta = "UPDATE premios SET nombre = :nombre, descripcion = :descripcion, imagen = :imagen, id_user = :id_user, id_plan = :id_plan WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':nombre', $this->nombre);
        $this->resultado->bindParam(':descripcion', $this->descripcion);
        $this->resultado->bindParam(':imagen', $this->imagen);
        $this->resultado->bindParam(':id_user', $this->id_user);
        $this->resultado->bindParam(':id_plan', $this->id_plan);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    public function eliminarPremio()
    {
        $this->consulta = "DELETE FROM premios WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }
}
?>
