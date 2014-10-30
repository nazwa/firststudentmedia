<?php


class Missing extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $missing_id;
     
    /**
     *
     * @var string
     */
    protected $name;
     
    /**
     * Method to set the value of field missing_id
     *
     * @param integer $missing_id
     */
    public function setMissingId($missing_id)
    {
        $this->missing_id = $missing_id;
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
     * Returns the value of field missing_id
     *
     * @return integer
     */
    public function getMissingId()
    {
        return $this->missing_id;
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
    public function columnMap() {
        return array(
            'missing_id' => 'missing_id', 
            'name' => 'name'
        );
    }
    public static function addMissing($name) {
        if( Missing::count(array('conditions' => 'name = :n:', 'bind' => array('n' => $name))) === 0 ) {
            $mis = new Missing();
            $mis->setName($name);
            $mis->save();
        }
    }

}
