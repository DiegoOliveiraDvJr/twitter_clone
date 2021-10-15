<?php

    namespace App\Controllers;

    //recursos miniframework
    use MF\Controller\Action;
    use MF\Model\Container; 

    class AppController extends Action{

        public function timeline(){


            $this->validaAuth();

            $tweet = Container::getModel('tweet');

            $tweet->__set('id_usuario', $_SESSION['id']);

            $this->view->tweets = $tweet->getAll();

            $this->render('timeline');
            
        }

        public function tweet(){

            $this->validaAuth();
            $tweet = Container::getModel('Tweet');
            $tweet->__set('tweet', trim($_POST['tweet']));
            $tweet->__set('id_usuario', $_SESSION['id']);
            $tweet->salvar();
            header('Location: /timeline');
           
        }
        public function validaAuth(){
            session_start();
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == ''){   
                header('Location: /?login=erro');  
            }
        }
    }



?>