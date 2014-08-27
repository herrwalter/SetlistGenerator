<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */


require_once '/../Autoloader.php';
Autoloader::init();


class ApplicationErrorTest extends PHPUnit_Framework_TestCase {
    
    public function testError(){
        $error = new ApplicationError('hallo', 3);
        $this->assertEquals('hallo', $error->getMessage());
        $this->assertEquals(3, $error->getCode());
    }
    
}
