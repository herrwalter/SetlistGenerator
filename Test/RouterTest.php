<?php

require_once '/../Autoloader.php';
Autoloader::init();


/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class RouterTest extends PHPUnit_Framework_TestCase {

    /**
     * @return Router
     */
    public function getRouterMock($uri, $method) {
        return $this->getMock('Router', array('route'), array($this->getRequest($uri, $method)));
    }

    /**
     * @return Request
     */
    public function getRequest($uri, $method) {
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['REQUEST_URI'] = $uri;
        return new Request();
    }

    /**
     * @dataProvider uriProvider
     */
    public function testGetController($uri, $expectedController) {

        $router = $this->getRouterMock($uri, 'GET');
        $controllerName = $router->getController();
        $this->assertEquals($expectedController, $controllerName);
    }

    /**
     * @dataProvider actionProvider
     */
    public function testGetAction($uri, $expectedAction) {
        $router = $this->getRouterMock($uri, 'GET');
        $action = $router->getAction();
        $this->assertEquals($expectedAction, $action);
    }

    /**
     * @dataProvider getUriParametersProvider
     */
    public function testGetUriParameters($uri, $expectedParameters) {
        $router = $this->getRouterMock($uri, 'GET');
        $parameters = $router->getUriParameters();
        $this->assertEquals($expectedParameters, $parameters);
    }

    public function getUriParametersProvider() {
        return array(
            array('/default', array()),
            array('/default/index', array()),
            array('/default/index/asdf', array('asdf')),
            array('/default/index/', array()),
            array('default/index/asdf', array('asdf')),
            array('default/index/asdf/asdf/asdf', array('asdf','asdf','asdf')),
        );
    }

    public function actionProvider() {
        return array(
            array('/default/index', 'index'),
            array('/default', 'defaultAction'),
            array('/', 'defaultAction'),
            array('/default/', 'defaultAction'),
            array('', 'defaultAction'),
            array('/default/index/language', 'index'),
        );
    }

    public function uriProvider() {
        return array(
            array('/default/index', 'DefaultController'),
            array('/default', 'DefaultController'),
            array('/', 'DefaultController'),
            array('', 'DefaultController'),
            array('Default', 'DefaultController'),
        );
    }

}
