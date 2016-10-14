<?php
class Application_Model_Contato extends Zend_Db_Table
{
    protected $_name   = 'tb_contato';
    
    public function gravar($dados)
    {
    	// Se tiver o id vai alterar, se não tiver, insere
    	if(!empty($dados['id_contatos'])){
	    	// Resgatando registro no banco pelo ID
    		$row = $this->fetchRow('id_contatos = ' . $dados['id_contatos']);
    	} else {
	    	// Criando linha vazia
	    	$row = $this->createRow();
    	}
    	
    	// Setando valores na linha
    	$row->setFromArray($dados);
    	
    	// Salvando no banco de dados
    	return $row->save();
    }
    
    public function excluir($dados)
    {
    	$this->delete('id_contatos = ' . $dados['id_contatos']);
    }
}
