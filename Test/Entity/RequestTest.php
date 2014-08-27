<?php

require_once '/../../Autoloader.php';
Autoloader::init();


class RequestTest extends PHPUnit_Framework_TestCase {

    public function getRequest( $uri, $method ){
        $_SERVER['REQUEST_METHOD'] = $method; 
        $_SERVER['REQUEST_URI'] = $uri; 
        return new Request();
    }

    public function testGetMethod() {
        $request = $this->getRequest('', 'GET');
        $this->assertEquals('GET', $request->getMethod());
    }

    public function testGetUri() {
        $request = $this->getRequest('/default/index', '');
        $this->assertEquals('/default/index', $request->getUri());
    }

}
