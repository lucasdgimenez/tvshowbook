<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserTVShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$idTvShow = filter_input(INPUT_GET, 'id');

$UserTvShowDao = new UserTVShowDaoMysql($pdo);
$isFavorite = $UserTvShowDao->isFavorite($userInfo->id, $idTvShow);

if($idTvShow) {
    $userTVShowDao = new UserTVShowDaoMysql($pdo);
    $userDao = new UserDaoMysql($pdo);

    if($isFavorite) {
        $userTVShowDao->deleteTvShowFavorites($userInfo->id, $idTvShow);
    } else {
        $userTVShowDao->addTvShowFavorites($userInfo->id, $idTvShow);
    }

    $frase = "Serie favoritada com sucesso";
    $_SESSION['frase'] = $frase;

    header("Location: ".$base);
    exit;
}

header("Location: ".$base);
exit;


?>