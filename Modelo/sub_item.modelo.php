<?php 
namespace modeloSubItem;
use PDO;

include_once("../entidad/sub_item.entidad.php");
include_once("../entorno/conexion.php");

class SubItem {
    private $id;
    private $sub_item;
    private $id_item;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadSubItem\SubItem $subItemE)
    {
        $this->conexion = new \Conexion();
        $this->id = $subItemE->getId();
        $this->sub_item = $subItemE->getSubItem();
        $this->id_item = $subItemE->getIdItem();
    }

    /**
     * Método para crear un nuevo subitem en la base de datos
     */
    public function crearSubItem()
    {
        $this->consulta = "INSERT INTO sub_items (sub_item, id_item) VALUES (:sub_item, :id_item)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':sub_item', $this->sub_item);
        $this->resultado->bindParam(':id_item', $this->id_item);

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
     * Método para obtener todos los subitems
     */
    public function obtenerSubItems()
    {
        $this->consulta = "SELECT * FROM sub_items ORDER BY id ASC";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener subitems por item
     */
    public function obtenerSubItemsPorItem($id_item)
    {
        $this->consulta = "SELECT s.*, IF(EXISTS (SELECT 1 FROM evaluacion_sub_items e WHERE e.id_sub_item = s.id), 1, 0) AS existe_evaluacion FROM sub_items s WHERE s.id_item = :id_item";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_item', $id_item);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener subitems co info puntajes por item
     */
    public function obtenerSubItemsPorItemConInfoUser($id_item, $id_plan_user)
    {
        $this->consulta = "SELECT s.sub_item, e.*, s.id_item, p.*, p.id AS id_puntaje FROM evaluacion_sub_items e INNER JOIN sub_items s ON s.id=e.id_sub_item INNER JOIN puntajes p ON p.id_evaluacion_sub_item=e.id WHERE p.id_plan_user = :id_plan_user AND s.id_item = :id_item";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_item', $id_item);
        $this->resultado->bindParam(':id_plan_user', $id_plan_user);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerIdEvaluacionSubItem($id_sub_item)
    {
        $this->consulta = "SELECT e.id AS id_evaluacion FROM evaluacion_sub_items e INNER JOIN sub_items s ON s.id=e.id_sub_item WHERE s.id = :id_sub_item";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_sub_item', $id_sub_item);
        $this->resultado->execute();

        return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Método para actualizar un subitem existente
     */
    public function actualizarSubItem()
    {
        $this->consulta = "UPDATE sub_items SET sub_item = :sub_item, id_item = :id_item WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':sub_item', $this->sub_item);
        $this->resultado->bindParam(':id_item', $this->id_item);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para eliminar un subitem
     */
    public function eliminarSubItem()
    {
        $this->consulta = "DELETE FROM sub_items WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }
}
?>
