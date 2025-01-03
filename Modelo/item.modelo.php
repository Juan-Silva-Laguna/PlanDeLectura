<?php 
namespace modeloItem;
use PDO;

include_once("../entidad/item.entidad.php");
include_once("../entorno/conexion.php");

class Item {
    private $id;
    private $item;
    private $id_plan;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadItem\Item $itemE)
    {
        $this->conexion = new \Conexion();
        $this->id = $itemE->getId();
        $this->item = $itemE->getItem();
        $this->id_plan = $itemE->getIdPlan();
    }

    /**
     * Método para crear un nuevo item en la base de datos
     */
    public function crearItem()
    {
        $this->consulta = "INSERT INTO items (item, id_plan) VALUES (:item, :id_plan)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':item', $this->item);
        $this->resultado->bindParam(':id_plan', $this->id_plan);

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
     * Método para obtener todos los items
     */
    public function obtenerItems()
    {
        $this->consulta = "SELECT * FROM items ORDER BY id ASC";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener items por plan
     */
    public function obtenerItemsPorPlan($id_plan)
    {
        $this->consulta = "SELECT i.*, IF(EXISTS (SELECT 1 FROM evaluacion_items e WHERE e.id_item = i.id), 1, 0) AS existe_evaluacion FROM items i WHERE i.id_plan = :id_plan";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_plan', $id_plan);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener items por plan
     */
    public function obtenerIdsEvaluacionesItems($id_item)
    {
        $this->consulta = "SELECT e.id AS id_evaluacion FROM evaluacion_items e INNER JOIN items i ON i.id=e.id_item WHERE i.id = :id_item";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_item', $id_item);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener subitems co info puntajes por item
     */
    public function obtenerEvaluacionItemConInfoUser($id_item, $id_plan_user)
    {
        $this->consulta = "SELECT e.*, p.* FROM evaluacion_items e INNER JOIN items i ON i.id=e.id_item INNER JOIN puntajes p ON p.id_evaluacion_item=e.id WHERE p.id_plan_user = :id_plan_user AND i.id = :id_item";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_item', $id_item);
        $this->resultado->bindParam(':id_plan_user', $id_plan_user);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para actualizar un item existente
     */
    public function actualizarItem()
    {
        $this->consulta = "UPDATE items SET item = :item, id_plan = :id_plan WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':item', $this->item);
        $this->resultado->bindParam(':id_plan', $this->id_plan);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para eliminar un item
     */
    public function eliminarItem()
    {
        $this->consulta = "DELETE FROM items WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }
}
?>
