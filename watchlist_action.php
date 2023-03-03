<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserTVShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$idTvShow = filter_input(INPUT_GET, 'id');

$UserTvShowDao = new UserTVShowDaoMysql($pdo);
$isWatchlist = $UserTvShowDao->isWatchlist($userInfo->id, $idTvShow);
/*$isAlreadySee = $UserTvShowDao->isAlreadySee($userInfo->id, $id);
$isLike = $UserTvShowDao->isLike($userInfo->id, $id);
$isFavorite = $UserTvShowDao->isFavorite($userInfo->id, $id);*/

if($idTvShow) {
    $userTVShowDao = new UserTVShowDaoMysql($pdo);
    $userDao = new UserDaoMysql($pdo);

    if($isWatchlist) {
        $userTVShowDao->deleteTvShowWatchList($userInfo->id, $idTvShow);
    } else {
        $userTVShowDao->addTvShowWatchList($userInfo->id, $idTvShow);
    }
    

    $frase = "Serie adicionada";
    $_SESSION['frase'] = $frase;

    header("Location: tvshowitemdetails.php?id=".$base);
    exit;
}

header("Location: ".$base);
exit;


?>