<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class DefaultController extends AController {
    
    public function defaultAction() {
        
        $view = new IndexView();
        $view->render(array('asdf'));
    }
    
    public function helloWorld(){
        echo 'Well hello there';
    }

}
