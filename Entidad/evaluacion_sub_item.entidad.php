<?php 
namespace entidadEvaluacionSubItem;

class EvaluacionSubItem {
    private $id;
    private $pregunta;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuesta4;
    private $respuesta_correcta;
    private $id_sub_item;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pregunta
     */ 
    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * Set the value of pregunta
     *
     * @return self
     */ 
    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    /**
     * Get the value of respuesta1
     */ 
    public function getRespuesta1()
    {
        return $this->respuesta1;
    }

    /**
     * Set the value of respuesta1
     *
     * @return self
     */ 
    public function setRespuesta1($respuesta1)
    {
        $this->respuesta1 = $respuesta1;

        return $this;
    }

    /**
     * Get the value of respuesta2
     */ 
    public function getRespuesta2()
    {
        return $this->respuesta2;
    }

    /**
     * Set the value of respuesta2
     *
     * @return self
     */ 
    public function setRespuesta2($respuesta2)
    {
        $this->respuesta2 = $respuesta2;

        return $this;
    }

    /**
     * Get the value of respuesta3
     */ 
    public function getRespuesta3()
    {
        return $this->respuesta3;
    }

    /**
     * Set the value of respuesta3
     *
     * @return self
     */ 
    public function setRespuesta3($respuesta3)
    {
        $this->respuesta3 = $respuesta3;

        return $this;
    }

    /**
     * Get the value of respuesta4
     */ 
    public function getRespuesta4()
    {
        return $this->respuesta4;
    }

    /**
     * Set the value of respuesta4
     *
     * @return self
     */ 
    public function setRespuesta4($respuesta4)
    {
        $this->respuesta4 = $respuesta4;

        return $this;
    }

    /**
     * Get the value of respuesta_correcta
     */ 
    public function getRespuestaCorrecta()
    {
        return $this->respuesta_correcta;
    }

    /**
     * Set the value of respuesta_correcta
     *
     * @return self
     */ 
    public function setRespuestaCorrecta($respuesta_correcta)
    {
        $this->respuesta_correcta = $respuesta_correcta;

        return $this;
    }

    /**
     * Get the value of id_sub_item
     */ 
    public function getIdSubItem()
    {
        return $this->id_sub_item;
    }

    /**
     * Set the value of id_sub_item
     *
     * @return self
     */ 
    public function setIdSubItem($id_sub_item)
    {
        $this->id_sub_item = $id_sub_item;

        return $this;
    }
}
?>
