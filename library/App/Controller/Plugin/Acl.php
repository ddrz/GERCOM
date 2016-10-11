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
            'login/autentica',
            'login/logout',
            'index/home',

        );

        $paginasAdmin = array(
            'agenda/calendario',
            'agenda/novo',
            'contato/novo',
            'contato/contato',
            'contato/contato',
            'funcionario/funcionario',
            'funcionario/add',
            'funcionario/gravar',
            'funcionario/excluir',
            'perfil/perfil',
            'perfil/gravar',
            'perfil/excluir',
            'perfil/form',
            'cliente/pagina',
            'cliente/formulario',
        );

        $controller = $request->getControllerName();
        $action = $request->getActionName();

        $url = $controller . '/' . $action;

        if (in_array($url, $paginasPublicas)) {
            return true;
        }
        if (!empty($_SESSION['id_perfil'])){
            if ($_SESSION['id_perfil'] == 1 && in_array($url, $paginasAdmin)){
                return true;
            }
        }

        $request->setControllerName('login');
        $request->setActionName('login');

    }
}
?>