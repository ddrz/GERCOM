<?php
/**
 * Created by PhpStorm.
 * User: DiegoDenizard
 * Date: 18/05/2016
 * Time: 20:02
 */

class App_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $paginasPublicas = array(

            'login/login',
            'index/home',
            'perfil/perfil',
            'funcionario/funcionario',
            'funcionario/add',
            'contato/novo',
            'contato/contato',
        );
        $controller = $request->getControllerName();
        $action = $request->getActionName();

        $url = $controller . '/' . $action;

        if (in_array($url, $paginasPublicas) || $_SESSION['idlogin']) {
            return true;
        }

        $request->setControllerName('login');
        $request->setActionName('login');


    }
}