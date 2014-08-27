<?php

/* 
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

abstract class AConfig {
    
    /**
     * Path to config file.
     * @var string
     */
    protected $configPath;
    
    /**
     * Actual parsed config data.
     */
    protected $config;
    /**
     * Reference to self
     * @var AConfig
     */
    protected static $self;
    
    public function __construct(){
        self::$self = $this;
    }
    
    /**
     * Singleton method
     * @return AConfig
     */
    final public static function getInstance(){
        $calledClass = get_called_class();
        if( $calledClass::$self == null ){
            $calledClass::$self = new $calledClass();
        }
        return $calledClass::$self;
    }
    
    /**
     * Public interface for setting the config file.
     */
    abstract public function setConfigPath( $path );
    
    /**
     * Public interface for reading the actual config file.
     * Sets the config property
     */
    abstract public function read();
    
    /**
     * Public interface for reading a setting from the config file.
     */
    abstract public function getSetting( $setting );
    
}