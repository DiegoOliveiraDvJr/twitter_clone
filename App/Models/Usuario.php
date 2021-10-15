<?php

    namespace App\Models;
    use MF\Model\Model;

    class Usuario extends Model{

       private $id;
       private $nome;
       private $email;
       private $senha;

       public function __get($atributo){
           return $this->$atributo;
       }
       public function __set($atributo, $valor){
            $this->$atributo = $valor;
       }

       //Salvar 
       public function salvar(){

        $query = "INSERT INTO tb_usuarios(nome, email, senha) values(:nome, :email, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();

        return $this;
       }
       
       //valida se um cadastro pode ser feito
       public function validarCadastro(){

           $valido = true;  

             //verifica se nome tem pelo menos 3    //verifica se senha tem pelo menos 8  //verifica se senha contem @                  //verifica se senha tem pelo menos 5
           if(strlen($this->__get('nome')) >= 3 && strlen($this->__get('senha')) >= 8 && str_contains($this->__get('email'), '@') &&  strlen($this->__get('email')) >= 5 ){

           }else{
                $valido = false;
           }

           return $valido;
       }

       //recuperar usuario por e-mail
       public function getUsuarioPorEmail(){

        $query = "SELECT nome, email FROM tb_usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

       }

       //autenticar
       public function autenticar(){

        $query = "SELECT id, nome, email, senha  FROM tb_usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_OBJ);

        if( $stmt->rowCount() && password_verify($this->__get('senha'), $usuario->senha)){

            $this->__set('id', $usuario->id);
            $this->__set('nome', $usuario->nome);
        }

         return $this;

       }
       
       
    }



?>