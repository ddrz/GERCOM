<?php
class Application_Model_Historico extends Zend_Db_Table
{
    protected $_name   = 'tb_historico';
    protected $_tabelasDependentes = array('tb_entidade', 'tb_cliente', 'tb_endereco', 'tb_cliente', 'tb_telefone');

    public function gravar($dados)
    {
    	// Se tiver o id vai alterar, se não tiver, insere
    	if(!empty($dados['id_historico'])){
	    	// Resgatando registro no banco pelo ID
    		$row = $this->fetchRow('id_historico = ' . $dados['id_historico']);
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
    	$this->delete('id_historico = ' . $dados['id_historico']);
    }

    public function innerjoin($chave)
    {
        $select = $this->select()
                       ->setIntegrityCheck(false)
                       ->from('tb_historico')
                       ->joinInner('tb_entidade', 'tb_endereco.id_endereco = tb_entidade.fk_endereco',
                                   array('tb_historico_per_tb_endereco'=>'COUNT(*)'))
                       ->group('tb_entidade.id_entidade')
                       ->having('tb_historico_per_tb_endereco >= ?', $chave);

        return $this->fetchAll($select);
    }
}
