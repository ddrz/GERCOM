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
    
    public function autenticarAction(){
        
         $dados = $this->_getAllParams(); //resgatando o array de dados do formulario (<form>)
         $email = $dados['email'];//atributo colhido no input (campo) de name="email"
         $senha = $dados['senha'];//atributo colhido no input (campo) de name="senha"
 
         $modelLogin = new Application_Model_Login(); //Ainda não descobri qual o model certo, pois não encontrei no banco de dados
         $rowLogin = $modelLogin->fetchRow("tx_email = '$email' and ps_senha = '$senha'");//não foi encontrado o campo de senha no banco de dados
         
         if ($rowLogin){
         
             $_SESSION['id_usuario'] = $rowLogin['id_usuario'];//setando na session o id_usuario
             $_SESSION['nome'] = $rowLogin['tx_nome'];//setando na session o nome
             $_SESSION['id_perfil'] = $rowLogin['id_perfil'];//setando na session o id_perfil
             
             $_SESSION['mensagem'] = 'Usuário logado com sucesso!';

             $this->redirect('index/index');//redirecionando para a página inicial  
         
         } else {
             
             $_SESSION['mensagem'] = 'E-mail ou senha inválidos!';

             $this->redirect('login/login');//redirecionando para tentar novamente o Login
             
             
         }
    }

}