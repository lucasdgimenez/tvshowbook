<?php
require_once 'models/UserTvShow.php';
require_once 'models/TvShow.php';

class UserTVShowDaoMysql implements UserTVShowDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function addTvShowWatchList($id, $idTvShow) {
        $sql = $this->pdo->prepare("INSERT INTO userwatchlist
        (user_id, tvshow_id) VALUES 
        (:user_id, :tvshow_id)");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();
    }

    public function addTvShowAlreadySee($id, $idTvShow) {
        echo "Entrou 2".$id. " - ".$idTvShow;
        $sql = $this->pdo->prepare("INSERT INTO useralreadysee
        (user_id, tvshow_id) VALUES 
        (:user_id, :tvshow_id)");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();
    }

    public function addTvShowLikes($id, $idTvShow) {
        $sql = $this->pdo->prepare("INSERT INTO userlikes
        (user_id, tvshow_id) VALUES 
        (:user_id, :tvshow_id)");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();
    }

    public function addTvShowFavorites($id, $idTvShow) {
        $sql = $this->pdo->prepare("INSERT INTO userfavorites
        (user_id, tvshow_id) VALUES 
        (:user_id, :tvshow_id)");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();
    }

    public function getWatchlist($id) {
        $sql = $this->pdo->query("SELECT * from tvshows INNER JOIN userwatchlist ON (tvshows.id = userwatchlist.tvshow_id) WHERE userwatchlist.user_id = $id");

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            //3- Transformar o resultado em objetos
            $array = $this->_postListToObject($data, $id);
        }

        return $array;
    }

    public function getLikeslist($id) {
        $sql = $this->pdo->query("SELECT * from tvshows INNER JOIN userlikes ON (tvshows.id = userlikes.tvshow_id) WHERE userlikes.user_id = $id");

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            //3- Transformar o resultado em objetos
            $array = $this->_postListToObject($data, $id);
        }

        return $array;
    }

    public function getFavoriteslist($id) {
        $sql = $this->pdo->query("SELECT * from tvshows INNER JOIN userfavorites ON (tvshows.id = userfavorites.tvshow_id) WHERE userfavorites.user_id = $id");

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            //3- Transformar o resultado em objetos
            $array = $this->_postListToObject($data, $id);
        }

        return $array;
    }

    public function getAlreadySeeList($id) {
        $sql = $this->pdo->query("SELECT * from tvshows INNER JOIN useralreadysee ON (tvshows.id = useralreadysee.tvshow_id) WHERE useralreadysee.user_id = $id");

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            //3- Transformar o resultado em objetos
            $array = $this->_postListToObject($data, $id);
        }

        return $array;
    }

    public function isWatchlist($id, $idTvShow) {
        $sql = $this->pdo->prepare("SELECT * FROM userwatchlist WHERE
        user_id = :user_id AND tvshow_id = :tvshow_id");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isAlreadySee($id, $idTvShow) {
        $sql = $this->pdo->prepare("SELECT * FROM useralreadysee WHERE
        user_id = :user_id AND tvshow_id = :tvshow_id");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isLike($id, $idTvShow) {
        $sql = $this->pdo->prepare("SELECT * FROM userlikes WHERE
        user_id = :user_id AND tvshow_id = :tvshow_id");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isFavorite($id, $idTvShow) {
        $sql = $this->pdo->prepare("SELECT * FROM userfavorites WHERE
        user_id = :user_id AND tvshow_id = :tvshow_id");

        $sql->bindValue(':user_id', $id);
        $sql->bindValue(':tvshow_id', $idTvShow);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    private function _postListToObject($tvshow_list, $id_user) {

        foreach($tvshow_list as $tvshow_item) {

            $s = new TvShow();
            $s->setId($tvshow_item['id']);
            $s->setName($tvshow_item['name']);
            $s->setGenres($tvshow_item['genres']);
            $s->setCapa($tvshow_item['capa']);
            $s->setDescription($tvshow_item['description']);

            $tvshows[] = $s;
        }

        return $tvshows;
    }


}

?>