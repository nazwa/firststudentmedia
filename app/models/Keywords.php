<?php


class Keywords extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $keyword_id;
     
    /**
     *
     * @var string
     */
    protected $word;
     
    /**
     * Method to set the value of field keyword_id
     *
     * @param integer $keyword_id
     */
    public function setKeywordId($keyword_id)
    {
        $this->keyword_id = $keyword_id;
        return $this;
    }

    /**
     * Method to set the value of field word
     *
     * @param string $word
     */
    public function setWord($word)
    {
        $this->word = $word;
        return $this;
    }

    /**
     * Returns the value of field keyword_id
     *
     * @return integer
     */
    public function getKeywordId()
    {
        return $this->keyword_id;
    }

    /**
     * Returns the value of field word
     *
     * @return string
     */
    public function getWord()
    {
        return $this->word;
    }
    public function initialize() {  
        //$this->hasMany('keyword_id', 'FeedKeywords', 'keywords_id');
    }

}
