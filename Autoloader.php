<?php

/* 
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */
class Autoloader {
    /**
     * @var Autoloader 
     */
    public static $loader;
    
    /**
     * Singleton our instance to prevent double loading
     * @return Autoloader
     */
    public static function init(){
        if( self::$loader == null ){
            self::$loader = new self();
        }
        return self::$loader;
    }
    
    public function __construct() {
        require_once 'bootstrap.php';
        spl_autoload_register(array($this, 'core'));
        $this->loadLibraries();
    }
    
    /**
     * Will look for core classes
     * @param type $className
     */
    public function core($className){
        if( strpos($className, 'Twig_') !== false ){
            return;
        }
        $fileScanner = new FileScanner( DOCUMENT_ROOT );
        $files = $fileScanner->getFilesInOneDimensionalArray();
        // exclude folders.
        $corefiles = array_filter($files, array($this, 'isCoreClass'));
        foreach($corefiles as $file){
            if( strpos(pathinfo($file, PATHINFO_FILENAME), $className) > -1 ){
                require_once $file;
            }
        }
    }
    
    /**
     * Returns if a file is in a core path.
     * @param string $path
     * @return boolean wheater the file is in a core folder
     */
    public function isCoreClass($path){
        $coreFolders = array(
            UTIL_PATH,
            CONTROLLER_PATH,
            ENTITY_PATH,
            RESOURCES_PATH,
            ERROR_PATH,
            VIEW_PATH
        );
        foreach($coreFolders as $folder){
            $path = str_replace(array('/', '\\'), array('', ''), $path);
            $folder = str_replace(array('/', '\\'), array('', ''), $folder);
            if(strpos($path, $folder) === 0){
                return true;
            }
        }
        return false;
    }
    
    
    /**
     * Will load the library autoloaders
     */
    public function loadLibraries(){
        // twig
        require_once LIBRARY_PATH.DIRECTORY_SEPARATOR.'Twig'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'Twig'.DIRECTORY_SEPARATOR.'Autoloader.php';
        Twig_Autoloader::register();
        
    }
    
}
