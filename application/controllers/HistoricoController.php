<?php

class HistoricoController extends Zend_Controller_Action
{

    public function historicoAction()
    {
        $modelHistorico = new Application_Model_Historico();
        $rowSet = $modelHistorico->fetchAll(); // recupera todos os dados da tabela 'tb_perfil' do banco de dados

        $this->view->rowSet = $rowSet;
    }

    public function novoAction()
    {

    }

    public function gravarAction()
    {
        $dados = $this->_getAllParams(); //recupera os dados enviados pelo formulario
        $modelHistorico = new Application_Model_Historico();

        $modelHistorico->gravar($dados);

        $this->redirect('historico/historico');
    }
}
