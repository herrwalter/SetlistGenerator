<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

abstract class AView {

    public function __construct() {
        
    }

    /**
     * Sets the twig template
     */
    abstract public function setTemplate($template);

    /**
     * Will render the template with the given parameters
     */
    abstract public function render(array $parameters);
}
