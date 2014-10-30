<?php


class Sources extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $source_id;
     
    /**
     *
     * @var string
     */
    protected $url;
     
    /**
     *
     * @var string
     */
    protected $title;
     
    /**
     *
     * @var string
     */
    protected $website;
     
    /**
     *
     * @var integer
     */
    protected $category_id;
     
    /**
     *
     * @var integer
     */
    protected $active;
     
    /**
     *
     * @var integer
     */
    protected $fails;
     
    /**
     * Method to set the value of field source_id
     *
     * @param integer $source_id
     */
    public function setSourceId($source_id)
    {
        $this->source_id = $source_id;
        return $this;
    }

    /**
     * Method to set the value of field url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Method to set the value of field title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Method to set the value of field website
     *
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

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
     * Method to set the value of field active
     *
     * @param integer $active
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Method to set the value of field fails
     *
     * @param integer $fails
     */
    public function setFails($fails)
    {
        $this->fails = $fails;
        return $this;
    }

    /**
     * Returns the value of field source_id
     *
     * @return integer
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * Returns the value of field url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
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
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Returns the value of field fails
     *
     * @return integer
     */
    public function getFails()
    {
        return $this->fails;
    }
    public function initialize() {      
        $this->hasMany('source_id', 'Feed', 'feed_source_id', array('reusable' => true));   
        
    }
    public function Failed() {
        $this->fails++;
        if( $this->fails >= 3) {
            $this->active = 0;
        }
        $this->save();
        return $this->fails;
    }
    public function Loaded() {
        $this->fails = 0;
        $this->active = 1;
        $this->save();      
    }

}
