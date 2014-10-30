<?php


class Similar extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $similar_id;
     
    /**
     *
     * @var integer
     */
    protected $feed_id;
     
    /**
     *
     * @var integer
     */
    protected $similar_feed_id;
     
    /**
     *
     * @var double
     */
    protected $cosine;
     
    /**
     * Method to set the value of field similar_id
     *
     * @param string $similar_id
     * @return $this
     */
    public function setSimilarId($similar_id)
    {
        $this->similar_id = $similar_id;
        return $this;
    }

    /**
     * Method to set the value of field feed_id
     *
     * @param integer $feed_id
     * @return $this
     */
    public function setFeedId($feed_id)
    {
        $this->feed_id = $feed_id;
        return $this;
    }

    /**
     * Method to set the value of field similar_feed_id
     *
     * @param integer $similar_feed_id
     * @return $this
     */
    public function setSimilarFeedId($similar_feed_id)
    {
        $this->similar_feed_id = $similar_feed_id;
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
     * Returns the value of field similar_id
     *
     * @return string
     */
    public function getSimilarId()
    {
        return $this->similar_id;
    }

    /**
     * Returns the value of field feed_id
     *
     * @return integer
     */
    public function getFeedId()
    {
        return $this->feed_id;
    }

    /**
     * Returns the value of field similar_feed_id
     *
     * @return integer
     */
    public function getSimilarFeedId()
    {
        return $this->similar_feed_id;
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
            'similar_id' => 'similar_id', 
            'feed_id' => 'feed_id', 
            'similar_feed_id' => 'similar_feed_id', 
            'cosine' => 'cosine'
        );
    }

}
