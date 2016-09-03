<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initResourceAutoLoad() {

        $resourceloader = new Zend_Loader_Autoloader_Resource (array(
            'namespace' => 'Conta',
            'basePath' => APPLICATION_PATH . '/modules/'
        ));

        $resourceloader->addResourceType('model', 'models/', 'Model');

        return $resourceloader;

    }
}

