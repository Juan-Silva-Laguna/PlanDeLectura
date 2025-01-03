<?php 
namespace modeloEvaluacionSubItem;
use PDO;

include_once("../entidad/evaluacion_sub_item.entidad.php");
include_once("../entorno/conexion.php");

class EvaluacionSubItem {
    private $id;
    private $pregunta;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuesta4;
    private $respuesta_correcta;
    private $id_sub_item;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;

    public function __construct(\entidadEvaluacionSubItem\EvaluacionSubItem $evaluacionSubItemE)
    {
        $this->conexion = new \Conexion();
        $this->id = $evaluacionSubItemE->getId();
        $this->pregunta = $evaluacionSubItemE->getPregunta();
        $this->respuesta1 = $evaluacionSubItemE->getRespuesta1();
        $this->respuesta2 = $evaluacionSubItemE->getRespuesta2();
        $this->respuesta3 = $evaluacionSubItemE->getRespuesta3();
        $this->respuesta4 = $evaluacionSubItemE->getRespuesta4();
        $this->respuesta_correcta = $evaluacionSubItemE->getRespuestaCorrecta();
        $this->id_sub_item = $evaluacionSubItemE->getIdSubItem();
    }

    /**
     * Método para crear una nueva evaluación de subitem en la base de datos
     */
    public function crearEvaluacionSubItem()
    {
        $this->consulta = "INSERT INTO evaluacion_sub_items (pregunta, respuesta1, respuesta2, respuesta3, respuesta4, respuesta_correcta, id_sub_item) 
                           VALUES (:pregunta, :respuesta1, :respuesta2, :respuesta3, :respuesta4, :respuesta_correcta, :id_sub_item)";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':pregunta', $this->pregunta);
        $this->resultado->bindParam(':respuesta1', $this->respuesta1);
        $this->resultado->bindParam(':respuesta2', $this->respuesta2);
        $this->resultado->bindParam(':respuesta3', $this->respuesta3);
        $this->resultado->bindParam(':respuesta4', $this->respuesta4);
        $this->resultado->bindParam(':respuesta_correcta', $this->respuesta_correcta);
        $this->resultado->bindParam(':id_sub_item', $this->id_sub_item);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para obtener todas las evaluaciones de subitems
     */
    public function obtenerEvaluacionesSubItems()
    {
        $this->consulta = "SELECT * FROM evaluacion_sub_items ORDER BY id ASC";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para obtener evaluaciones por subitem
     */
    public function obtenerEvaluacionesPorSubItem($id_sub_item)
    {
        $this->consulta = "SELECT * FROM evaluacion_sub_items WHERE id_sub_item = :id_sub_item";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id_sub_item', $id_sub_item);
        $this->resultado->execute();

        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para actualizar una evaluación de subitem existente
     */
    public function actualizarEvaluacionSubItem()
    {
        $this->consulta = "UPDATE evaluacion_sub_items SET pregunta = :pregunta, respuesta1 = :respuesta1, respuesta2 = :respuesta2, 
                           respuesta3 = :respuesta3, respuesta4 = :respuesta4, respuesta_correcta = :respuesta_correcta, id_sub_item = :id_sub_item 
                           WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);

        $this->resultado->bindParam(':pregunta', $this->pregunta);
        $this->resultado->bindParam(':respuesta1', $this->respuesta1);
        $this->resultado->bindParam(':respuesta2', $this->respuesta2);
        $this->resultado->bindParam(':respuesta3', $this->respuesta3);
        $this->resultado->bindParam(':respuesta4', $this->respuesta4);
        $this->resultado->bindParam(':respuesta_correcta', $this->respuesta_correcta);
        $this->resultado->bindParam(':id_sub_item', $this->id_sub_item);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }

    /**
     * Método para eliminar una evaluación de subitem
     */
    public function eliminarEvaluacionSubItem()
    {
        $this->consulta = "DELETE FROM evaluacion_sub_items WHERE id = :id";
        $this->resultado = $this->conexion->con->prepare($this->consulta);
        $this->resultado->bindParam(':id', $this->id);

        $this->resultado->execute();
        $this->retorno = $this->resultado->rowCount() >= 1 ? 1 : 0;

        return $this->retorno;
    }
}
?>
