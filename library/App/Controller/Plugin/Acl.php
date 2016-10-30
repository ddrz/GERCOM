<?php
class App_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $paginasPublicas = array(

            'login/login',
            'login/autentica',
            'login/logout',
            'index/home',
            'teste/teste',
            'teste/index',

        );

        $paginasAdmin = array(
            'agenda/calendario',
            'agenda/novo',
            'historico/novo',
            'historico/historico',
            'historico/gravar',
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
            'cliente/gravar',
            'teste/index',

        );

        $paginasAtendente = array(



        );

        $paginasGerente = array(



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
        }if (!empty($_SESSION['id_perfil'])){
        if ($_SESSION['id_perfil'] == 2 && in_array($url, $paginasAtendente)){
            return true;
        }
    }if (!empty($_SESSION['id_perfil'])){
        if ($_SESSION['id_perfil'] == 3 && in_array($url, $paginasGerente)){
            return true;
        }
    }

        $request->setControllerName('login');
        $request->setActionName('login');

    }
}
