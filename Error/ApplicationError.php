<?php

/* 
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */


class ApplicationError extends Exception {
    
    public function __construct( $message, $code = 1, $previous = '' ){
        $this->message = $message;
        $this->code = $code;
        $this->previous = $previous;
    }
    
}
