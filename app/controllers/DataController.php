<?php

function cmp($a, $b)
{
    if ($a['similarCount'] == $b['similarCount']) {
        return 0;
    }
    return ($a['similarCount'] < $b['similarCount']) ? 1 : -1;
}

class DataController extends ControllerBase
{
    private $maxDescriptionLength = 250;

    private $categoryMaps = array(
        "news"   =>   1,
        "headline"  => 1,
        "campus news"   => 1,
        "breaking news" => 1,
        "lead news" => 1 ,
        "uncategorized"     => 1,
        "history"   => 1,
        "domestic uk"   => 1,
        "foreign affairs"   => 1,
        "national"  => 1,
        "healthcare"    => 1,
        "general"   => 1,
        "economics" => 1,
        "columnist" => 1,
        "insidestory"   => 1,
        "winchester"    => 1,
        "have your say" => 1,
        "newspaper" => 1,
        "politics"  => 1,
        "transportation"    => 1,
        "durham news"   => 1,
        "elections"   => 1,
        "local news"    => 1,
        "key stories"   => 1,
        "columns"   => 1,
        "other" => 1,
        "share" => 1,
        "fourth story"  => 1,
        "main story"    => 1,
        "birmingham"    => 1,
        "activities"    => 2,
        "sport"     => 2,
        "rugby"     => 2,
        "match reports" => 2,
        "other sport"   => 2,
        "football"  => 2,
        "rowing"    => 2,
        "social"    => 2,
        "bucs"  => 2,
        "portsmouth fc" => 2,
        "featured sport"    => 2,
        "netball"   => 2,
        "university sport"  => 2,
        "durham sport"  => 2,
        "other sports"  => 2,
        "college cup"   => 2,
        "fencing"   => 2,
        "hockey"    => 2,
        "sports"    => 2,
        "local sport"   => 2,
        "features"  => 3,
        "feature"   => 3,
        "feature - home page" => 3,
        "music" => 3,
        "entertainment" => 3,
        "featured"  => 3,
        "science & environment" => 3,
        "features & comment"    => 3,
        "featured article"  => 3,
        "featured stories"  => 3,
        "multimedia"    => 3,
        "blogs" => 3,
        "culture"   => 3,
        "college"   => 3,
        "interviews"    => 3,
        "online exclusives" => 3,
        "band of the week"  => 3,
        "editors pick"  => 3,
        "bigfeature"    => 3,
        "blog from afar"    => 3,
        "arts"  => 3,
        "muse"  => 3,
        "play it long"  => 4,
        "food & drink"  => 4,
        "film"  => 4,
        "food and drink"    => 4,
        "food"  => 4,
        "durham comment"    => 4,
        "comment"   => 4,
        "album reviews" => 4,
        "reviews"   => 4,
        "review"    => 4,
        "fierce and finished" => 4,
        "gig reviews"   => 4,
        "opinion"   => 4,
        "live reviews"  => 4,
        "roses" => 4,
        "magazine"  => 4,
        "shorts"    => 4,
        "longs"     => 4 ,
        "comedy"    => 4,
        "student comment"   => 4,
        "campus comment"    => 4,
        "video games"   => 4,
        "editorial"     => 4,
        "views" => 4,
        "culture & reviews" => 4,
        "national comment"  => 4,
        "cinema"   => 4,
        "lifestyle" => 5,
        "the relationship blog" => 5,
        "sex"   => 5,
        "style" => 5,
        "fashion"   => 5 ,
        "health and fitness"    => 5,
        "health and fitness"    => 5,
        "substance" => 5,
        "travel"    => 5,
        "life"  => 5,
        "festival previews" => 5,
        "careers" => 5

    );

    /**
     * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
     * array containing the HTTP server response header fields and content.
     */
    function get_web_page( $url )
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "1st Student Media", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }




    function load()
    {

        $id = null;
        if( !defined('CLI')) {
            $id = $this->dispatcher->getParam(0, "int");
        }


        $results = array();
        $results['saved'] = 0;
        $results['existing'] = 0;
        $results['keywords'] = 0;
        $results['list'] = array();
        $results['errors'] = array();



        $start = time();
        /** @var Sources[] $sources */
        $sources = null;

        if( is_numeric($id)) {
            $sources = Sources::find(array('active = 1 AND source_id = ?0', 'bind' => array($id)));
        } else {
            $sources = Sources::find(array('active = 1'));
        }

        $config = array(
                       'input-xml'      => true,
                       'output-xml'   => true);

            // Tidy
        $tidy = new tidy;

        $new = 0;
        $sourcesCount = 0;


        foreach($sources as $source)
        {
            //echo '<br>Loading: ' . $source->getUrl()  .'<br>';

            $sourcesCount++;
            $doc = new DOMDocument();

          //  $opts = array('http' => array('header' => 'Accept-Charset: UTF-8, *;q=0'));
          //  $context = stream_context_create($opts);

           // $file = file_get_contents($source->source, FILE_TEXT, $context);
            $file = $this->get_web_page($source->getUrl());
            if($file['errno'] !== 0 || intval($file['http_code']) !== 200) {
                $results['errors'][] = 'http error ' .$source->getUrl() . ' (' . $source->Failed() . ')';
                continue;
            } else {
                $source->Loaded();
            }


            try {
                $content = @iconv(mb_detect_encoding($file['content'], mb_detect_order(), true), 'utf-8//TRANSLIT', $file['content']);
            } catch(Exception $e) {
                 $results['errors'][] = 'Encoding error - ' . $source->getUrl() . ' (' . $source->Failed() . ')';
                 continue;
            }
            if($content === false)
            {
                $results['errors'][] = 'No content ' .$source->getUrl() . ' (' . $source->Failed() . ')<br>';
                continue;
            }

       //     $file = str_replace('\xC2', '', $file);
            $content = str_replace('dc:', '', $content);
          //  $file = mb_convert_encoding($file, 'utf8');
            $tidy->parseString($content, $config, 'utf8');
            $tidy->cleanRepair();


            @$doc->loadXML($tidy->value);

            foreach ($doc->getElementsByTagName('item') as $node)
            {
                $published = 0;
                $category = 0;
                $image = '';
                $title = trim(strip_tags(filter_var($node->getElementsByTagName('title')->item(0)->nodeValue, FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH)));
                $description_long = filter_var($node->getElementsByTagName('description')->item(0)->nodeValue, FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                $url = trim(strip_tags($node->getElementsByTagName('link')->item(0)->nodeValue));
                $url = preg_replace("/[\n\r]/","",$url);
                $guid = ($node->getElementsByTagName('guid')->length != 0 ? trim(strip_tags($node->getElementsByTagName('guid')->item(0)->nodeValue)) : $url);
                if( $node->getElementsByTagName('pubDate')->length != 0 ) {
                    $published = strtotime($node->getElementsByTagName('pubDate')->item(0)->nodeValue);
                } else  {
                    if( $node->getElementsByTagName('date')->item(0)->nodeValue != 0 )
                        $published = strtotime($node->getElementsByTagName('date')->item(0)->nodeValue);
                    else
                    {
                        $results['errors'][] = $feed->link. " - no date <br> \n\r";
                        continue;
                    }
                }

                if(Feed::findFirst(array(
                    "conditions" => "guid = :guid:",
                    "bind"       => array('guid' => $guid)
                ))) {
                    // <----
                    // This story already exists, so skip it
                    // ---->
                    $results['existing']++;
                    continue;
                }




                if( $node->getElementsByTagName('category')->length != 0)  {
                    $tempCat = trim(mb_strtolower($node->getElementsByTagName('category')->item(0)->nodeValue));
                    if( array_key_exists($tempCat, $this->categoryMaps)) {
                        $category = $this->categoryMaps[$tempCat];
                    }  else  {
                        Missing::addMissing($tempCat);
                        $category = $source->getCategoryId();
                    }
                }
                else  {
                    Missing::addMissing($source->getUrl());
                    $category = $source->getCategoryId();
                }

                preg_match_all('/<img[^>]+>/i',$description_long, $result);

                if( isset($result[0][0])) {
                    $result = str_replace('\'', '"', $result[0][0]);
                    preg_match_all('/(src)=("[^"]*")/i',$result, $img);
                    if( isset($img[2][0])) {
                        $image = str_replace('"', '', $img[2][0]);
                    }
                }

                $image = filter_var($image, FILTER_VALIDATE_URL);
                if( !$image) {
                    $image = '';
                }


                $description_long =  (str_replace("[...]",'',strip_tags($description_long)));
                $description = ($description_long);

                if (mb_strlen($description . $title)  > $this->maxDescriptionLength)
                {
                   // $feed->description = wordwrap($feed->description, $this->maxDescriptionLength - strlen($feed->title), "\n");
                    //$feed->description = substr($feed->description, 0, (strpos($feed->description, "\n")> 1 ? strpos($feed->description, "\n") : strlen($feed->description)));
                    $description = mb_substr($description, 0, $this->maxDescriptionLength);

                   // $feed->description = trim($feed->description) . "...";
                }



                $feed = new Feed();
                $feed->setFeedSourceId($source->getSourceId());
                $feed->setScore(3);
                $feed->setVotes(1);
                $feed->setStars(3);
                $feed->setFeedCategoryId($category);
                $feed->setDateLoaded($start);
                $feed->setDatePublished($published);
                $feed->setTitle($title);
                $feed->setDescriptionLong($description_long);
                $feed->setDescription($description);
                $feed->setImage($image);
                $feed->setLink($url);
                $feed->setGuid($guid);


                if( !$feed->save() ) {
                    foreach($feed->getMessages() as $message) {
                        $results['errors'][] =  'Save error - ' . $feed->getTitle() . ' - ' .$message->getField() .  ' - ' . $message->getMessage() . ' - ' . $feed->getSlug() . '  -' . $source->getSourceId();
                    }
                    continue;
                }  else {
                    $new++;
                    $results['list'][] = $feed->getTitle() . ' - ' . $feed->getLink() . ' - ' . $feed->getGuid();
                }
                 /*
                $keyword = null;
                $keys = Feed::getMostCommonWords(Feed::removeUselessWords($feed->getTitle().' '.$feed->getDescriptionLong()));
                foreach($keys as $key)
                {
                    $ok = true;
                    $keyword = Keywords::findFirst(array("conditions" => "word = :text:", "bind" => array('text' => $key)));
                    if(!$keyword) {
                        $keyword = new Keywords();
                        $keyword->setWord($key);
                        if( !$keyword->save() ) {
                            $ok = false;
                        }
                    }
                    if( $ok) {
                        $feed_keyword = new FeedKeywords();
                        $feed_keyword->setFeedId($feed->getFeedId());
                        $feed_keyword->setKeywordsId($keyword->getKeywordId());
                        $feed_keyword->create();
                        $results['keywords']++;
                    }
                }   */
                $results['saved']++;
            }

        }


        $results['finished'] = date("j/n/Y", time());
        $results['duration'] = (time() - $start);
        $results['sources'] = $sourcesCount;
        $results['total'] = Feed::count();

        if( !defined('CLI')) {
            $this->view->setVar('results',  $results);
        } else {
            return $results;
        }

    }


    function cosineSimilarity($tokensA, $tokensB)
    {
        $a = $b = $c = 0;
        $uniqueTokensA = $uniqueTokensB = array();

        $uniqueMergedTokens = array_unique(array_merge($tokensA, $tokensB));

        foreach ($tokensA as $token) $uniqueTokensA[$token] = 0;
        foreach ($tokensB as $token) $uniqueTokensB[$token] = 0;

        foreach ($uniqueMergedTokens as $token) {
            $x = isset($uniqueTokensA[$token]) ? 1 : 0;
            $y = isset($uniqueTokensB[$token]) ? 1 : 0;
            $a += $x * $y;
            $b += $x;
            $c += $y;
        }
        return $b * $c != 0 ? $a / sqrt($b * $c) : 0;
    }


    function findSimilar()
    {

        $results = array();

        $results['new'] = 0;
        $results['skip_db'] = 0;
        $results['skip_cos'] = 0;
        $results['oldest'] = PHP_INT_MAX;
        $start = microtime(true);
        $timeNow = time();
        //$timeEnd = strtotime("-3 month", $timeNow);
        $timeEnd = strtotime("-6 months", $timeNow);

        $num = 20;

        $timer = array();

        /** @var Feed[] $list */
        $feed_main = Feed::find(array(  'conditions' => 'date_published > ?1', 'bind' => array(1 => $timeEnd)));

        $keys = array();
        $map = array();

        foreach( $feed_main as $one) {
            $map[] =  preg_split("/[\s,]+/", Feed::removeUselessWords($one->getTitle() . ' ' . $one->getDescriptionLong()));
            $keys[] = $one->getFeedId();
            if( $one->getDatePublished() < $results['oldest']) {
                $results['oldest'] = $one->getDatePublished();
            }

        }

        $max_count = count($map);
        for($_A=0; $_A < $max_count; $_A++) {
            $this->db->begin();
            for($_B = $_A + 1; $_B < $max_count; $_B++) {
                if( $_B % 50 == 0) {
                    usleep(200);
                }
                $cosine = $this->cosineSimilarity($map[$_A], $map[$_B]);
                if( $cosine < 0.5) {
                    $results['skip_cos']++;
                    continue;
                }
                $results['new']++;
                $similar = Similar::findFirst("similar_id = '" . $keys[$_A] . '_' . $keys[$_B]. "'");
                if( !$similar) {
                    $similar = new Similar();
                    $similar->setSimilarId( $keys[$_A] . '_' . $keys[$_B] );
                    $similar->setFeedId($keys[$_A]);
                    $similar->setSimilarFeedId($keys[$_B]);
                    $similar->setCosine($cosine);
                    $similar->save();
                } else {
                    $results['skip_db']++;
                }

                $similar = Similar::findFirst("similar_id = '" .$keys[$_B] . '_' . $keys[$_A] . "'");
                if( !$similar) {
                    $similar = new Similar();
                    $similar->setSimilarId($keys[$_B] . '_' . $keys[$_A]);
                    $similar->setFeedId($keys[$_B]);
                    $similar->setSimilarFeedId($keys[$_A]);
                    $similar->setCosine($cosine);
                    $similar->save();
                } else {
                    $results['skip_db']++;
                }
            }

            $this->db->commit();
        }

        $results['duration'] = microtime(true) - $start;
        $results['finished'] = date("j/n/Y", time());
        $results['articles'] = $feed_main->count();
        $results['oldest'] = date("j/n/Y", $results['oldest']);

        $this->view->setVar('results', $results);

    }

    public function indexAction()
    {

    }

    public function similarAction()
    {
        $this->findSimilar();
    }


    public function loadAction()
    {
        $this->load();
    }

    public function websiteAction() {
        $sources = Sources::find();

        foreach($sources as $source) {
            $name = split(':', $source->getTitle());
            $source->setWebsite($name[0]);
            $source->save();
        }
    }

}

