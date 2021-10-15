<?php

    namespace App\Controllers;

    //recursos miniframework
    use MF\Controller\Action;
    use MF\Model\Container; 

    class AuthController extends Action{

       //autenticar usuario
       public function autenticar(){
            if(isset($_POST) && isset($_POST['email']) && isset($_POST['senha'])){

                $usuario = Container::getModel('usuario');

                $usuario->__set('email', $_POST['email']);
                $usuario->__set('senha', $_POST['senha']);

                $usuario->autenticar();

                if($usuario->__get('id') != '' && $usuario->__get('nome') != ''){

                    session_start();

                    $_SESSION['id'] = $usuario->__get('id');
                    $_SESSION['nome'] = $usuario->__get('nome');

                    header('Location: /timeline');
                }else{
                    
                    header('Location: /?login=erro');
                }
            }else{
                header('Location: /');
            }
       }

       //logout
       public function sair(){

            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

                unset($_SESSION['id']);
                unset($_SESSION['nome']);
                

            }
                
            header('Location: /');

        }
    }



?>