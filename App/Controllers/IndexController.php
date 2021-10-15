<?php

    namespace App\Controllers;

    //recursos miniframework
    use MF\Controller\Action;
    use MF\Model\Container;  

    class IndexController extends Action{

        public function index(){
    
            $this->render('index');
        }
        public function inscreverse(){
            $this->view->erroCadastro = false;
            $this->render('inscreverse');
        }
        public function notFound(){
            $this->render('notFound');
        }
        public function registrar(){
            //receber dados do formulario

            if(isset($_POST) && $_POST['nome'] && $_POST['email'] && $_POST['senha']){

                $usuario = Container::getModel('Usuario');

                $usuario->__set('nome', trim($_POST['nome']));
                $usuario->__set('email', trim($_POST['email']));
                $usuario->__set('senha', password_hash(trim($_POST['senha']), PASSWORD_DEFAULT));

                if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0 ){

                    $usuario->salvar();

                    $this->render('cadastro');

    
                }else{
                    $this->view->usuario = array(

                        'nome' =>  $_POST['nome'],
                        'email' => $_POST['email'],
                        'senha' => $_POST['senha']

                    );
                    $this->view->erroCadastro = true;
                    $this->render('inscreverse');
                }

            }else{
                header('Location: /');
            }
 
        }

    }

?>