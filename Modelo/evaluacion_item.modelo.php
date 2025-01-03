<?php 
namespace modeloEvaluacionItem;
use PDO;

include_once("../entidad/evaluacion_item.entidad.php");
include_once("../entorno/conexion.php");

class EvaluacionItem {
    private $id;
    private $pregunta;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuesta4;
    private $respuesta_correcta;
    private $id_item;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadEvaluacionItem\EvaluacionItem $evaluacionItemE)
    {
        $this->conexion = new \Conexion();
        $this->id = $evaluacionItemE->getId();
        $this->pregunta = $evaluacionItemE->getPregunta();
        $this->respuesta1 = $evaluacionItemE->getRespuesta1();
        $this->respuesta2 = $evaluacionItemE->getRespuesta2();
        $this->respuesta3 = $evaluacionItemE->getRespuesta3();
        $this->respuesta4 = $evaluacionItemE->getRespuesta4();
        $this->respuesta_correcta = $evaluacionItemE->getRespuestaCorrecta();
        $this->id_item = $evaluacionItemE->getIdItem();
    }

    /**
     * Método para crear una nueva evaluación de item en la base de datos
     */
    public function crearEvaluacionItem()
    {
        $this->consulta = "INSERT INTO evaluacion_items (pregunta, respuesta1, respuesta2, respuesta3, respuesta4, respuesta_correcta, id_item) 
                           VALUES (:pregunta, :respuesta1, :respuesta2, :respuesta3, :respuesta4, :respuesta_correcta, :id_item)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':pregunta', $this->pregunta);
        $this->resultado->bindParam(':respuesta1', $this->respuesta1);
        $this->resultado->bindParam(':respuesta2', $this->respuesta2);
        $this->resultado->bindParam(':respuesta3', $this->respuesta3);
        $this->resultado->bindParam(':respuesta4', $this->respuesta4);
        $this->resultado->bindParam(':respuesta_correcta', $this->respuesta_correcta);
        $this->resultado->bindParam(':id_item', $this->id_item);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para obtener todas las evaluaciones de items
     */
    public function obtenerEvaluacionesItems()
    {
        $this->consulta = "SELECT * FROM evaluacion_items ORDER BY id ASC";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener evaluaciones por item
     */
    public function obtenerEvaluacionesPorItem($id_item)
    {
        $this->consulta = "SELECT * FROM evaluacion_items WHERE id_item = :id_item";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_item', $id_item);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para actualizar una evaluación de item existente
     */
    public function actualizarEvaluacionItem()
    {
        $this->consulta = "UPDATE evaluacion_items SET pregunta = :pregunta, respuesta1 = :respuesta1, respuesta2 = :respuesta2, 
                           respuesta3 = :respuesta3, respuesta4 = :respuesta4, respuesta_correcta = :respuesta_correcta, id_item = :id_item 
                           WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':pregunta', $this->pregunta);
        $this->resultado->bindParam(':respuesta1', $this->respuesta1);
        $this->resultado->bindParam(':respuesta2', $this->respuesta2);
        $this->resultado->bindParam(':respuesta3', $this->respuesta3);
        $this->resultado->bindParam(':respuesta4', $this->respuesta4);
        $this->resultado->bindParam(':respuesta_correcta', $this->respuesta_correcta);
        $this->resultado->bindParam(':id_item', $this->id_item);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para eliminar una evaluación de item
     */
    public function eliminarEvaluacionItem()
    {
        $this->consulta = "DELETE FROM evaluacion_items WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }
}
?>
