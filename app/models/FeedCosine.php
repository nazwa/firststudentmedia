<?php


class FeedCosine extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $tag;
     
    /**
     *
     * @var double
     */
    protected $cosine;
     
    /**
     * Method to set the value of field tag
     *
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Method to set the value of field cosine
     *
     * @param double $cosine
     * @return $this
     */
    public function setCosine($cosine)
    {
        $this->cosine = $cosine;
        return $this;
    }

    /**
     * Returns the value of field tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Returns the value of field cosine
     *
     * @return double
     */
    public function getCosine()
    {
        return $this->cosine;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'tag' => 'tag', 
            'cosine' => 'cosine'
        );
    }

}
