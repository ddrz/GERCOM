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
 
         $modelUsuario = new Application_Model_Usuario(); 
         $rowUsuario = $modelUsuario->fetchRow("tx_email = '$email' and tx_senha = '$senha'");
         
         if ($rowUsuario){
         
             $_SESSION['id_usuario'] = $rowUsuario['id_usuario'];//setando na session o id_usuario
             $_SESSION['email'] = $rowUsuario['tx_email'];//setando o usuario na session
             $_SESSION['id_perfil'] = $rowUsuario['fk_perfil'];//setando na session o id_perfil
             
             $_SESSION['mensagem'] = 'Usuário logado com sucesso!';

             $this->redirect('index/index');//redirecionando para a página inicial  
         
         } else {
             
             $_SESSION['mensagem'] = 'E-mail ou senha inválidos!';

             $this->redirect('login/login');//redirecionando para tentar novamente o Login
             
             
         }
    }

}