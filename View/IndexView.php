<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class IndexView extends AView {
    
    /**
     * Render the template
     * @param array $parameters
     */
    public function render($parameters = array()) {
        //$this->validateParameters($parameters);
        echo $this->template->render($parameters);
    }
    
    /**
     * Validates the parameters for this view
     */
    protected function validateParameters( array $parameters ){
        if(!empty($parameters)){
            throw new ApplicationError('Parameters cannot be empty for index view');
        }
    }

    /**
     * Sets the main template
     */
    protected function loadTemplate() {
        $this->template = $this->twig->loadTemplate('index.html.twig');
    }

}
