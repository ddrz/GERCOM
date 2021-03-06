<?php
/**
 * Created by PhpStorm.
 * User: Diego Denizard
 * Date: 04/09/2016
 */

class FuncionarioController extends Zend_Controller_Action
{

    public function funcionarioAction()
    {
        $modelEntidade = new Application_Model_Entidade(); 
        
        $rowSet = $modelEntidade->fetchAll(); // recupera todos os dados da tabela 'tb_entidade' do banco de dados
        
        $this->view->rowSet = $rowSet;
    }

    public function addAction()
    {
        $dados = $this->_getAllParams();
    }
    
    public function gravarAction()
    {      
        $dados = $this->_getAllParams(); 
        
        $modelEntidade = new Application_Model_Entidade();
        
        $modelEntidade->gravar($dados);
        
        $this->redirect('funcionario/funcionario');
    }
    
    public function excluirAction()
    {    
        $dados = $this->_getAllParams();
        
        $modelEntidade = new Application_Model_Entidade();
        
        $modelEntidade->excluir($dados);
        
        $this->redirect('funcionario/funcionario');
    }
}