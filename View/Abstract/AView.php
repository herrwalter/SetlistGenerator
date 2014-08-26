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
        $config = JSONConfig::getInstance();
        //$templateLoader = TemplateLoader::getInstance();
        $templatePathPart = $config->getSetting('template-path');
        $this->loader = new Twig_Loader_Filesystem(DOCUMENT_ROOT . $templatePathPart, array('cache' => DOCUMENT_ROOT . '/Config'));
        // set base template (index.html.twig)
        $debug = $config->getSetting('debug');
        $this->twig = new Twig_Environment($this->loader, array('debug' => $debug));
        $this->loadTemplate();
    }

    /**
     * Sets the twig template
     */
    abstract protected function loadTemplate();

    /**
     * Will render the template with the given parameters
     */
    abstract public function render($parameters = '');
}
