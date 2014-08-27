<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class JSONConfigTest extends PHPUnit_Framework_TestCase {
    
    public function testConfig(){
        $config = new JSONConfig();
    }
    
    /**
     * @expectedException ApplicationError
     * @expectedExceptionMessage Config path not set, please set it with "setConfigPath"
     */
    public function testNoConfigPathSet(){
        $config = new JSONConfig();
        $config->read();
    }
    
    /**
     * @expectedException ApplicationError
     * @expectedExceptionMessage Config path does not exist, please point to the right file
     */
    public function testWrongConfigPathSet(){
        $config = new JSONConfig();
        $config->setConfigPath('k:bestaat/asdfa/asdfniet/');
        $config->read();
    }
    
    
    /**
     * @expectedException ApplicationError
     * @expectedExceptionMessage Config path is not readable, please make it readable.
     */
    public function testUnreadableConfigPathSet(){
        $this->markTestIncomplete('Error with readability setting');
        $config = new JSONConfig();
        $unreadableJson = dirname(__FILE__) .'/../../Config/unreadableconfig.json';
        chmod( $unreadableJson, 0600);
        $config->setConfigPath($unreadableJson);
        $config->read();
    }
    
    public function testConfigRead(){
        $config = new JSONConfig();
        $config->setConfigPath(dirname(__FILE__) .'/../../Config/config.json');
        $config->read();
    }
    
    public function testGetSetting(){
        $config = new JSONConfig();
        $config->setConfigPath(dirname(__FILE__) .'/../../Config/config.json');
        $config->read();
        $test = $config->getSetting('test');
        $this->assertEquals('string', $test);
        $test = $config->getSetting('testarray');
        $this->assertEquals(array(1,2,3), $test);
    }
    
    public function testSingletonInstance(){
        $config = new JSONConfig();
        $config->setConfigPath(dirname(__FILE__) .'/../../Config/config.json');
        $config->read();
        $sameConfig = JSONConfig::getInstance();
        $this->assertEquals($config, $sameConfig);
    }
}
