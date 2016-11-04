<?php

class HistoricoController extends Zend_Controller_Action
{

    public function historicoAction()
    {
      //Entidade
       $modelEntidade = new Application_Model_Entidade(); //Instanciando a model
       $rowSetEntidade = $modelEntidade->fetchAll(); //buscando TODA a tabela do banco de dados
       $this->view->rowSetEntidade = $rowSetEntidade; //enviando pra view
      //Histórico
       $modelHistorico = new Application_Model_Historico();
       $rowSetHistorico = $modelHistorico->fetchAll();
       $this->view->rowSetHistorico = $rowSetHistorico;
      //Endereço
       $modelEndereco = new Application_Model_Endereco();
       $rowSetEndereco = $modelEndereco->fetchAll();
       $this->view->rowSetEndereco = $rowSetEndereco;
    }

    public function novoAction()
    {
       //Entidade
        $modelEntidade = new Application_Model_Entidade(); //Instanciando a model
        $rowSetEntidade = $modelEntidade->fetchAll(); //buscando TODA a tabela do banco de dados
        $this->view->rowSetEntidade = $rowSetEntidade; //enviando pra view
       //Histórico
        $modelHistorico = new Application_Model_Historico();
        $rowSetHistorico = $modelHistorico->fetchAll();
        $this->view->rowSetHistorico = $rowSetHistorico;
       //Endereço
        $modelEndereco = new Application_Model_Endereco();
        $rowSetEndereco = $modelEndereco->fetchAll();
        $this->view->rowSetEndereco = $rowSetEndereco;
    }

    public function gravarAction()
    {
        $dados = $this->_getAllParams(); //recupera os dados enviados pelo formulario
        $modelHistorico = new Application_Model_Historico();
        $modelEntidade = new Application_Model_Entidade();
        $modelEndereco = new Application_Model_Endereco();

        $rowSet = $modelEndereco->fetchAll();
        $modelEndereco->gravar($dados);
        $modelHistorico->gravar($dados);
        $modelEntidade->gravar($dados);

        $this->redirect('historico/historico');
    }
}
