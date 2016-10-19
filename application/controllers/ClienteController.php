<?php

class ClienteController extends Zend_Controller_Action
{

    public function formularioAction()
    {   
        $modelEntidade = new Application_Model_Entidade();
        $rowSet = $modelEntidade->fetchAll(); // recupera todos os dados da tabela 'tb_entidade' do banco de dados
  
        $dados = $this->_getAllParams(); //recupera os dados enviados pelo formulario do method POST ou GET
        $modelEntidade = new Application_Model_Entidade();
        
        if (!empty($dados['id_entidade'])){
            
            $row = $modelEntidade->fetchRow('id_entidade=' .$dados['id_entidade']);
        
        } else {
        
            $row = $modelEntidade->createRow();
        }
        
        $this->view->row = $row;
    }

    public function paginaAction()
    {

    }
    
     public function gravarAction()
    {     
        $dados = $this->_getAllParams(); //recupera os dados enviados pelo formulario
        
        $modelEntidade = new Application_Model_Entidade();
        
        $modelEntidade->gravar($dados);
        
        $this->redirect('cliente/pagina');
    }
    
   

}