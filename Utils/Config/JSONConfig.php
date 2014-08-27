<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 * 
 */

class JSONConfig extends AConfig {

    public function getSetting($setting) {
        if (array_key_exists($setting, $this->config)) {
            return $this->config[$setting];
        }
    }

    public function read() {
        if ($this->configPath == null) {
            throw new ApplicationError('Config path not set, please set it with "setConfigPath"');
        }
        if (!file_exists($this->configPath)) {
            throw new ApplicationError('Config path does not exist, please point to the right file');
        }
        if (!is_readable($this->configPath)) {
            throw new ApplicationError('Config path is not readable, please make it readable.');
        }
        
        try{
            $config = file_get_contents($this->configPath);
            $config = json_decode($config, true);
        } catch (Exception $ex) {
            throw new ApplicationError('Config could not be read. Is this a valid Json format?');
        }
        
        $this->config = $config;
    }

    public function setConfigPath($path) {
        $this->configPath = $path;
    }

}
