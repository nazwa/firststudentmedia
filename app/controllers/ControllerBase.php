<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{                                
    /** @var Phalcon\Assets\Manager $scripts */
    protected $scripts = null; 
    /** @var Phalcon\Assets\Manager $styles */
    protected $styles = null;
    
    public function initialize() {
        //Add some local CSS resources         
        
        $this->styles = $this->assets                               
            ->collection('styles')        
            ->setTargetPath(__DIR__ . '/../../public/production/styles.css') 
            ->setTargetUri('production/styles.css')  
            ->join(true)                   
            ->addFilter(new Phalcon\Assets\Filters\Cssmin())  
            ->addCss('css/foundation.css')                                         
            ->addCss('css/fonts.css') 
            ->addCss('css/template.css');
            
        //and some local javascript resources
        $this->scripts = $this->assets
            ->collection('scripts')
            ->setTargetPath(__DIR__ . '/../../public/production/final.js') 
            ->setTargetUri('production/final.js')  
            ->join(true)                   
            ->addFilter(new Phalcon\Assets\Filters\Jsmin())               
            ->addJs('js/foundation.min.js')
            ->addJs('js/jquery.raty.min.js')  
            ->addJs("js/jquery.isotope.min.js")
            ->addJs('js/general.js');                           
                     
    }
}