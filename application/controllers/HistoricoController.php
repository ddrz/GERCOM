<?php

class HistoricoController extends Zend_Controller_Action
{

    public function contatoAction()
    {
        $modelHistorico = new Application_Model_Historico();
        $rowSet = $modelHistorico->fetchAll();

        $this->view->rowSet = $rowSet;
    }

    public function novoAction()
    {

    }

}
