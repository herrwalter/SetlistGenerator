<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class TemplateLoader {

    /**
     * Twig loader
     * @var Twig_Loader_Filesystem 
     */
    protected $loader;
    
    /**
     * Path to templates
     * @var string
     */
    protected $templatePath;
    
    /**
     * Singleton instance
     * @var TemplateLoader
     */
    protected static $self;

    /**
     * Singleton method for this instance.
     * @return TemplateLoader
     */
    public static function getInstance(){
        if( self::$self == null ){
            self::$self = new self();
        }
        return self::$self;
    }
    
    /**
     * Gets the current template paths
     * @return type
     */
    public function getTemplatePath() {
        return $this->templatePath;
    }

    /**
     * Set the template full path to the your template folder
     * @param type $templatePath
     */
    public function setTemplatePath($templatePath) {
        $this->templatePath = $templatePath;
    }

    public function __construct() {
        $config = JSONConfig::getInstance();
        $templatePathPart = $config->getSetting('template-path');
        $this->setTemplatePath(DOCUMENT_ROOT . $templatePathPart);
        $this->setLoader();
    }

    /**
     * Sets the loader by the setted path.
     * Need to set the path first if not set.
     */
    protected function setLoader() {
        $this->loader = new Twig_Loader_Filesystem($this->getTemplatePath(), array('cache' => DOCUMENT_ROOT . '/Config'));
    }
    
    /**
     * Returns the twig template loader
     * @return Twig_Loader_Filesystem
     */
    public function getLoader(){
        return $this->loader;
    }
    
    

}
