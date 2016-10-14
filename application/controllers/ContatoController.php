<?php

class ContatoController extends Zend_Controller_Action
{

    public function contatoAction()
    {
        $modelContato = new Application_Model_Contato(); 
        $rowSet = $modelContato->fetchAll(); 
        
        $this->view->rowSet = $rowSet;
    }

    public function novoAction()
    {
        
    }

}

