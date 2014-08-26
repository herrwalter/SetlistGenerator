<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

abstract class AView {
    
    /**
     * Template that is used by this view
     */
    protected $template;
    
    /**
     * Twig loader
     * @var Twig_Loader_Filesystem 
     */
    protected $loader;
    
    /**
     * Twig environment
     * @var Twig_Environment
     */
    public $twig;
    

    public function __construct() {
        $templateLoader = TemplateLoader::getInstance();
        $this->loader = $templateLoader->getLoader();
        // set base template (index.html.twig)
        $config = JSONConfig::getInstance();
        $debug = $config->getSetting('debug');
        $this->twig = new Twig_Environment($this->loader, array('debug' => $debug));
    }

    /**
     * Sets the twig template
     */
    abstract protected function setTemplate();

    /**
     * Will render the template with the given parameters
     */
    abstract public function render($parameters = '');
}
