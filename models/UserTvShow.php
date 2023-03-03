<?php
class UserRelation {
    public $id;
    public $user_id;
    public $tvshow_id;
}

interface UserTVShowDAO {
    public function addTvShowWatchList($id, $idTvShow);
    public function addTvShowAlreadySee($id, $idTvShow);
    public function addTvShowLikes($id, $idTvShow);
    public function addTvShowFavorites($id, $idTvShow);
    public function getWatchlist($id);
    public function getLikeslist($id);
    public function getFavoriteslist($id);
    public function getAlreadySeeList($id);
    public function isWatchlist($id, $idTvShow);
    public function isLike($id, $idTvShow);
}
?>