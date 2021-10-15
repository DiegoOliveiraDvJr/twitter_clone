<?php

    namespace App\models;

    use MF\Model\Model;
use PDO;

class Tweet extends Model{
        private $id;
        private $id_usuario;
        private $tweet;
        private $data;

        public function __get($atributo){
            return $this->$atributo;
        }
        public function __set($atributo, $valor){
             $this->$atributo = $valor;
        }

        public function salvar(){

            $query = "INSERT INTO tb_tweets(id_usuario, tweet) values (:id_usuario, :tweet)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->bindValue(':tweet', $this->__get('tweet'));
            $stmt->execute();
        }
        public function getAll(){

            $query = "SELECT t.id, t.id_usuario, t.tweet, DATE_FORMAT(t.data, '%d/%m/%Y %H:%i') as data, u.nome from  tb_tweets t left join tb_usuarios as u on t.id_usuario = u.id where id_usuario = :id_usuario order by t.data DESC";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
            
        }
    }




?>