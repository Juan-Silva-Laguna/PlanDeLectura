<?php 
namespace entidadSubItem;

class SubItem {
    private $id;
    private $sub_item;
    private $id_item;

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
     * Get the value of sub_item
     */ 
    public function getSubItem()
    {
        return $this->sub_item;
    }

    /**
     * Set the value of sub_item
     *
     * @return self
     */ 
    public function setSubItem($sub_item)
    {
        $this->sub_item = $sub_item;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get the value of id_item
     */ 
    public function getIdItem()
    {
        return $this->id_item;
    }

    /**
     * Set the value of id_item
     *
     * @return self
     */ 
    public function setIdItem($id_item)
    {
        $this->id_item = $id_item;

        return $this;
    }
}
?>
