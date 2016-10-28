<?php

class HistoricoController extends Zend_Controller_Action
{

    public function historicoAction()
    {
        $modelHistorico = new Application_Model_Historico();
        $rowSet = $modelHistorico->fetchAll();

        $this->view->rowSet = $rowSet;
    }

    public function novoAction()
    {

    }

}
