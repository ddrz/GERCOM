<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 02/09/2016
 * Time: 18:50
 */
//Editado por Mikhail Gorbachev

class LoginController extends Zend_Controller_Action
{
    public function loginAction()
    {
            $this->_helper->layout->disableLayout();
    }
    
    public function autenticaAction(){

         $dados = $this->_getAllParams(); //resgatando o array de dados do formulario (<form>)
         $email = $dados['email'];//atributo colhido no input (campo) de name="email"
         $senha = $dados['senha'];//atributo colhido no input (campo) de name="senha" 
        
         $modelPerfil = new Application_Model_Perfil();
         $modelUsuario = new Application_Model_Usuario(); 
         $modelEntidade = new Application_Model_Entidade();
        
         $rowEntidade = $modelEntidade->fetchRow("tx_email = '$email'");
         $idEntidade = $rowEntidade['id_entidade'];
         $rowUsuario = $modelUsuario->fetchRow("fk_usuario_entidade = '$idEntidade'");
         $senhaBanco = base64_decode($rowUsuario['tx_senha']); //criptografado
        
         //$rowNome = $modelEntidade->select("tx_nome where tx_email = '$email'"); //capturando o nome da tabela entidade
         //$rowPerfil = $modelPerfil->select("tx_nome where id_perfil = '$rowIdEntidade'");
         if ($senhaBanco == $senha){
         
             $_SESSION['nome'] = $rowNome;//setando na session o nome do usuario
             //$_SESSION['email'] = $rowUsuario['tx_email'];//setando o email do usuario na session
           echo  $_SESSION['id_perfil'] = $rowUsuario['fk_perfil'];//setando na session o id_perfil
             die;
             $_SESSION['mensagem'] = 'Usuário logado com sucesso!';

             $this->redirect('index/home');//redirecionando para a página inicial  
         
         } else {
             
             $_SESSION['mensagem'] = 'E-mail ou senha inválidos!';

             $this->redirect('login/login');//redirecionando para tentar novamente o Login
             
             
         }
    }

}