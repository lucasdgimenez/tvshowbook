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
            $array = $this->_postListToObject($data, $id_user);
        }

        return $array;
    }

    private function _postListToObject($tvshow_list, $id_user) {

        foreach($tvshow_list as $tvshow_item) {
            $newPost = new TvShow();
            $newPost->id = $tvshow_item['id'];
            $newPost->name = $tvshow_item['name'];
            $newPost->genres = $tvshow_item['genres'];
            $newPost->capa = $tvshow_item['capa'];
            $newPost->description = $tvshow_item['description']; 

            $tvshows[] = $newPost;
        }

        return $tvshows;
    }


}

?>