<?php

/* 
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */


abstract class AController {
    /**
     * @var Request
     */
    protected $request;
    
    
    public function __construct( Request $request ) {
        $this->request = $request;
    }
    
    /**
     * Default action that should be implemented.
     */
    public abstract function defaultAction();
}
