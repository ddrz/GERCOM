<?php
class PerfilController extends Zend_Controller_Action
{
    public function perfilAction()
    {
        $modelPerfil = new Application_Model_Perfil(); 
        $rowSet = $modelPerfil->fetchAll(); // recupera todos os dados da tabela 'tb_perfil' do banco de dados
        
        $this->view->rowSet = $rowSet;
  
        $dados = $this->_getAllParams(); //recupera os dados enviados pelo formulario do method POST ou GET
        $modelPerfil = new Application_Model_Perfil();
        
        if (!empty($dados['id_perfil'])){
            
            $row = $modelPerfil->fetchRow('id_perfil=' .$dados['id_perfil']);
        
        } else {
        
            $row = $modelPerfil->createRow();
        }
        
        $this->view->row = $row;
    }
    
     public function gravarAction()
    {
    
                
        $dados = $this->_getAllParams(); //recupera os dados enviados pelo formulario
        
        $modelPerfil = new Application_Model_Perfil();
        
        $modelPerfil->gravar($dados);
        
        $this->redirect('perfil/perfil');
    }
    
    public function excluirAction()
    {
    
        
        $dados = $this->_getAllParams(); 
        
        $modelPerfil = new Application_Model_Perfil();
        
        $modelPerfil->excluir($dados);
        
        $this->redirect('perfil/perfil');
    }
}

