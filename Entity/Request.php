<?php

/* 
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class Request {
    
    /**
     * The request uri
     * @var string 
     */
    protected $uri;
    /**
     * The request method
     * @var string 
     */
    protected $method;
    
    
    public function __construct(){
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
    
    /**
     * Get request Uri
     * @return string
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * Get request method
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }
    
}