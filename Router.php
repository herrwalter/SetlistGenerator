<?php

class Router {

    /**
     * The request from the server.
     * @var Request  
     */
    protected $request;
    /**
     * The request URI exploded by / and filterd
     * @var array  
     */
    protected $uri;

    public function __construct(Request $request) {
        $this->request = $request;
        $this->setUri();
        $this->route();
    }
    
    /**
     * Set uri to array. 
     *  Will explode on /
     *  Then filter the empties
     *  Then reset the array keys
     */
    protected function setUri(){
        $this->uri = array_values(
                       array_filter(
                         explode('/', $this->request->getUri()
                     )));
    }

    /**
     * Routes the request
     */
    protected function route() {
        $offset = $this->getOffset();
        $controllerName = $this->getController($offset);
        $action = $this->getAction($offset);

        $controller = new $controllerName($this->request);
        $controller->$action();
    }

    /**
     * Gets the uri offset, this is 1 when it is localhost.
     * @return int 
     */
    protected function getOffset() {
        if (ENVIRONMENT == 'localhost') {
            return 1;
        }
        return 0;
    }

    /**
     * Will get the controller based on the request
     * @return string requested controller
     */
    protected function getController($offset = 0) {
        if(array_key_exists(0 + $offset, $this->uri)){
            return ucfirst($this->uri[0 + $offset]) . 'Controller';
        }
        return 'DefaultController';
    }

    /**
     * Gets the action of the controller based on the request
     * @return string requested action
     */
    protected function getAction($offset = 0) {
        $uri = $this->uri;
        if (count($uri) > 1 + $offset) {
            return $uri[1 + $offset];
        }
        return 'defaultAction';
    }

    /**
     * Will get the extra get parameters from the uri
     * @return array
     */
    protected function getUriParameters($offset = 0) {
        $uri = explode('/', $this->request->getUri());
        // if the array is greater then the action and controller, we have some extra parameters
        if (count($uri) > 2 + $offset) {
            $i = 2 + $offset;
            // shift while there are no more parameters.
            while ($i > 0) {
                array_shift($uri);
                $i--;
            }
            return $uri;
        }
        return array();
    }

}
