<?php 
class TvShow {
    public $id;
    public $name;
    public $genres;
    public $capa;
    public $description;

    public function getId() {
        return $this->TvShow->id;
    }

    public function setId($i) {
        $this->id = trim($i);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($n) {
        $this->name = ucwords(trim($n));
    }

    public function getGenres() {
        return $this->TvShow->genres;
    }

    public function setGenres($g) {
        $this->genres = trim($g);
    }

    public function getCapa() {
        return $this->capa;
    }

    public function setCapa($c) {
        $this->capa = ucwords(trim($c));
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($c) {
        $this->description = ucwords(trim($c));
    }

}

interface TvShowDAO {
    public function getListTvShow();
    public function findById($id);
}

?>