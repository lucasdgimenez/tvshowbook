<?php
require_once 'models/TvShow.php';

class TvShowDAOMySql implements TvShowDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function getListTvShow() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM tvshows");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
            
            foreach($data as $item) {
                $s = new TvShow();
                $s->setId($item['id']);
                $s->setName($item['name']);
                $s->setGenres($item['genres']);
                $s->setCapa($item['capa']);
                $s->setDescription($item['description']);

                $array[] = $s;
            }

        }
        
        return $array;
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM tvshows WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) { 
            $data = $sql->fetch();

            $s = new TvShow();
            $s->setId($data['id']);
            $s->setName($data['name']);
            $s->setGenres($data['genres']);
            $s->setCapa($data['capa']);
            $s->setDescription($data['description']);
            
            return $s;
        } else {
            return false;
        }
    }
}


?>