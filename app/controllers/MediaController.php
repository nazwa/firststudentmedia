<?php
use Phalcon\Mvc\View;

class MediaController extends ControllerBase
{
      
    function showAction()
    {     
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
       
        
        $slug = $this->dispatcher->getParam(0, "string");
                                                 
        /** @var Feed $article */
        $article = Feed::findFirst(array( 'slug = :slug: OR feed_id = ?0', 'bind' => array('slug' => $slug, 0 => $slug)));
        if( $article) {
            $article->bumpView();
        }      
                  
        $this->view->setVar('item', $article);  
         
        
    }
    
    function redirectAction()
    {       
        $this->view->disable();
        $url = '/';
        
        $id = $this->dispatcher->getParam(0, "int");
        
        if( is_numeric($id)) {   
            /** @var Feed $article */
            $article = Feed::findFirst($id);
            if( $article) {
                $article->bumpClick();
                return $this->response->redirect($article->getLink(), true);
            }                                                                            
        }   
        return $this->response->redirect('/', false);
    }   
         
    function ajax_scoreAction()
    {       
        $this->view->disable();
        $return['error'] = false;
        
        $id = $this->dispatcher->getParam(0, "int");
        $stars = $this->dispatcher->getParam(1, "int");
        
        if( !is_numeric($id) || !is_numeric($stars)) {
            $return['error'] = 'Invalid parameters';   
        } else {                                                                    
            /** @var Feed $article */
            $article = Feed::findFirst($id);
            
            if( !$article) {                
                $return['error'] = 'Article not found';
            } else {                         
                $return['stars'] = $article->bumpVote($stars);
            }
        }     
                                                                                 
        $this->response->setHeader('Cache-Control', 'no-cache, must revalidate');
        $this->response->setHeader('Content-type', 'application/json');   
        
        echo json_encode($return); 
        
    }
        
       
            
    function indexAction()
    {                                                       
      
        // <----
        // Let's do something clever here.
        // See if we have a last-visit cookie and load 2 groups - new and old
        // Then, set up a cookie with current date.
        // If no cookie, display all
        // ---->
                                                                                   
        
        $key = 'media-index-all-latest';
            
        $exists = $this->view->getCache()->get($key);
                
        if( $exists === null) 
        {                     
            $itemsToLoad = 90;                               
            /** @var Feed[] $new */
            $new = Feed::query()
                ->limit($itemsToLoad)
                ->orderBy('date_published DESC')
                ->execute();                                                                 
                      
            $this->view->setVar('new',  $new);        
        }    
        $this->view->cache(array("lifetime" => 86400, "key"  => $key, "level" => Phalcon\Mvc\View::LEVEL_ACTION_VIEW));
                                               
    }     
    
    public function filtersAction() {
                                   /*                                                   
        $categories = Categories::find(array('column' => 'name'));
        $sources = Sources::find(array('column' => 'website', 'group' => 'website'));
        $this->view->setVar('sources', $sources);
        $this->view->setVar('categories', $categories);   */
    }
}

