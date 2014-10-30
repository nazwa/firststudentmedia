<?php
use Phalcon\Mvc\Model\Validator\Uniqueness;


class Feed extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $feed_id;
     
    /**
     *
     * @var integer
     */
    protected $feed_source_id;
     
    /**
     *
     * @var integer
     */
    protected $feed_category_id;
     
    /**
     *
     * @var string
     */
    protected $slug;
     
    /**
     *
     * @var integer
     */
    protected $date_loaded;
     
    /**
     *
     * @var string
     */
    protected $title;
     
    /**
     *
     * @var string
     */
    protected $description;
     
    /**
     *
     * @var string
     */
    protected $description_long;
     
    /**
     *
     * @var string
     */
    protected $image;
     
    /**
     *
     * @var string
     */
    protected $link;
     
    /**
     *
     * @var integer
     */
    protected $date_published;
     
    /**
     *
     * @var string
     */
    protected $guid;
     
    /**
     *
     * @var integer
     */
    protected $clicks;
     
    /**
     *
     * @var integer
     */
    protected $score;
     
    /**
     *
     * @var integer
     */
    protected $votes;
     
    /**
     *
     * @var integer
     */
    protected $stars;
     
    /**
     *
     * @var integer
     */
    protected $view;
     
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
     * Method to set the value of field feed_source_id
     *
     * @param integer $feed_source_id
     */
    public function setFeedSourceId($feed_source_id)
    {
        $this->feed_source_id = $feed_source_id;
        return $this;
    }

    /**
     * Method to set the value of field feed_category_id
     *
     * @param integer $feed_category_id
     */
    public function setFeedCategoryId($feed_category_id)
    {
        $this->feed_category_id = $feed_category_id;
        return $this;
    }

    /**
     * Method to set the value of field slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Method to set the value of field date_loaded
     *
     * @param integer $date_loaded
     */
    public function setDateLoaded($date_loaded)
    {
        $this->date_loaded = $date_loaded;
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
     * Method to set the value of field description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Method to set the value of field description_long
     *
     * @param string $description_long
     */
    public function setDescriptionLong($description_long)
    {
        $this->description_long = $description_long;
        return $this;
    }

    /**
     * Method to set the value of field image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Method to set the value of field link
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Method to set the value of field date_published
     *
     * @param integer $date_published
     */
    public function setDatePublished($date_published)
    {
        $this->date_published = $date_published;
        return $this;
    }

    /**
     * Method to set the value of field guid
     *
     * @param string $guid
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;
        return $this;
    }

    /**
     * Method to set the value of field clicks
     *
     * @param integer $clicks
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
        return $this;
    }

    /**
     * Method to set the value of field score
     *
     * @param integer $score
     */
    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }

    /**
     * Method to set the value of field votes
     *
     * @param integer $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
        return $this;
    }

    /**
     * Method to set the value of field stars
     *
     * @param integer $stars
     */
    public function setStars($stars)
    {
        $this->stars = $stars;
        return $this;
    }

    /**
     * Method to set the value of field view
     *
     * @param integer $view
     */
    public function setView($view)
    {
        $this->view = $view;
        return $this;
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
     * Returns the value of field feed_source_id
     *
     * @return integer
     */
    public function getFeedSourceId()
    {
        return $this->feed_source_id;
    }

    /**
     * Returns the value of field feed_category_id
     *
     * @return integer
     */
    public function getFeedCategoryId()
    {
        return $this->feed_category_id;
    }

    /**
     * Returns the value of field slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Returns the value of field date_loaded
     *
     * @return integer
     */
    public function getDateLoaded()
    {
        return $this->date_loaded;
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
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field description_long
     *
     * @return string
     */
    public function getDescriptionLong()
    {
        return $this->description_long;
    }

    /**
     * Returns the value of field image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns the value of field link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Returns the value of field date_published
     *
     * @return integer
     */
    public function getDatePublished()
    {
        return $this->date_published;
    }

    /**
     * Returns the value of field guid
     *
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Returns the value of field clicks
     *
     * @return integer
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Returns the value of field score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Returns the value of field votes
     *
     * @return integer
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Returns the value of field stars
     *
     * @return integer
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Returns the value of field view
     *
     * @return integer
     */
    public function getView()
    {
        return $this->view;
    }
    
    
    
    
    
    public function initialize() {                             
                                                                          
        $this->hasManyToMany('feed_id', 'FeedKeywords', 'feed_id', 'keywords_id', 'Keywords', 'keyword_id');
        $this->hasManyToMany('feed_id', 'Similar', 'feed_id', 'similar_feed_id', 'Feed', 'feed_id', array('alias' => 'similar')); 
        $this->hasOne('feed_source_id', 'Sources', 'source_id', array('alias' => 'website', 'reusable' => true));
        $this->hasOne('feed_category_id', 'Categories', 'category_id', array('alias' => 'category', 'reusable' => true));
    }       
    
    public function generateSlug()
    {                              
        $this->slug = Phalcon\Tag::friendlyTitle($this->feed_id . ' ' . $this->title);                                                      
    } 
    
    public function beforeValidationOnCreate()
    {      
        $this->generateSlug();   
    } 
    
    
    public function afterCreate()
    {      
        $this->generateSlug();
        $this->update();
    }
       
    public static function removeUselessWords($str)
    {        
        $words=array('the',' of ',' and ',' a ',' to ',' in ',' is ',' you ',' that ',' it ',' he ',' was ',' for ',' on ',' are ',' as ',' with ',' his ',' they ',' I ',' at ',' be ',' this ',' have ',' from ',' or ',' one ',' had ',' by ',' word ',' but ',' not ',' what ',' all ',' were ',' we ',' when ',' your ',' can ',' said ',' there ',' use ',' an ',' each ',' which ',' she ',' do ',' how ',' their ',' if ',' will ',' up ',' other ',' about ',' out ',' many ',' then ',' them ',' these ',' so ',' some ',' her ',' would ',' make ',' like ',' him ',' into ',' time ',' has ',' look ',' two ',' more ',' write ',' go ',' see ',' number ',' no ',' way ',' could ',' people ',' my ',' than ',' first ',' water ',' been ',' call ',' who ',' oil ',' its ',' now ',' find ',' long ',' down ',' day ',' did ',' get ',' come ',' made ',' may ',' part ',' click ');
        return str_replace($words,' ',strtolower($str));
    }
    public static  function getMostCommonWords($str, $cap=10)
    {
       // get rid of everything except the words
       $letters=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
       $temp=str_replace($letters,'',strtolower($str));
       $temp=str_replace(array('1','2','3','4','5','6','7','8','9','0',' '),'',$temp);
       $str=str_replace(str_split($temp),'',$str);

       // create an array of words and an associative array of word appearance
       $w = array();
       $words=explode(' ',$str);
       if($words)
       {
          foreach($words as $value)
          {
                if( mb_strlen($value) < 3) {
                    continue;
                }
             if(str_replace(' ','',$value)!='')
                if( isset($w[$value]))
                    $w[$value]++;
                else
                    $w[$value] = 1;
          }
       }
       arsort($w);                                 
       $c=0;
       if($w)
          foreach($w as $key => $value){
             if($c < $cap)                                                                       
              $ret[]=$key;
          $c++;
       }                            

       return $ret;
    }
    public function bumpView() {
        $this->view++;
        $this->save();
    }
    public function bumpClick() {
        $this->clicks++;
        $this->save();
    }
    public function bumpVote($stars) {
        if( is_numeric($stars) ) {
            $stars = intval($stars);
            
            if( $stars > 0 && $stars < 6) {
                $this->votes++;
                $this->score += $stars;   
            }
        }
        
        $this->stars = round($this->score / $this->votes, 0);
        $this->save();
        return $this->stars;
    }
    public function countSimilar() {
        return Similar::count(array('conditions' => 'feed_id = ?1', 'bind' => array(1 => $this->feed_id), 'cache' =>
            array('lifetime' => 3600, 'key' => 'count-similar-' . $this->feed_id)));        
    }
    protected static function _createKey($parameters)
    {
        $uniqueKey = array();
        foreach ($parameters as $key => $value) {
            if (is_scalar($value)) {
                $uniqueKey[] = $key . ':' . $value;
            } else {
                if (is_array($value)) {
                    $uniqueKey[] = $key . ':[' . self::_createKey($value) .']';
                }
            }
        }
        return join(',', $uniqueKey);
    }          

}
