<?php


class Categories extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $category_id;
     
    /**
     *
     * @var string
     */
    protected $name;
     
    /**
     * Method to set the value of field category_id
     *
     * @param integer $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the value of field category_id
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    public function initialize() {      
        $this->hasMany('category_id', 'Feed', 'feed_category_id', array('reusable' => true));   
        
    }

}
