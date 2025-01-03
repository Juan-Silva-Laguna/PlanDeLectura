<?php 
namespace entidadItem;

class Item {
    private $id;
    private $item;
    private $id_plan;

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
     * Get the value of item
     */ 
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set the value of item
     *
     * @return self
     */ 
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get the value of id_plan
     */ 
    public function getIdPlan()
    {
        return $this->id_plan;
    }

    /**
     * Set the value of id_plan
     *
     * @return self
     */ 
    public function setIdPlan($id_plan)
    {
        $this->id_plan = $id_plan;

        return $this;
    }
}
?>
