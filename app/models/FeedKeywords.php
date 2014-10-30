<?php


class FeedKeywords extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;
     
    /**
     *
     * @var integer
     */
    protected $feed_id;
     
    /**
     *
     * @var integer
     */
    protected $keywords_id;
     
    /**
     * Method to set the value of field id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Method to set the value of field feed_id
     *
     * @param integer $feed_id
     */
    public function setFeedId($feed_id)
    {
        $this->feed_id = $feed_id;
        return $this;
    }

    /**
     * Method to set the value of field keywords_id
     *
     * @param integer $keywords_id
     */
    public function setKeywordsId($keywords_id)
    {
        $this->keywords_id = $keywords_id;
        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * Returns the value of field keywords_id
     *
     * @return integer
     */
    public function getKeywordsId()
    {
        return $this->keywords_id;
    }
    public function initialize() {                     
      //  $this->belongsTo('feed_id', 'Feed', 'feed_id');
       // $this->belongsTo('keywords_id', 'KEywords', 'keyword_id');
    }

}
