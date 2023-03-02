<?php
require_once 'models/UserTvShow.php';

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
}

?>