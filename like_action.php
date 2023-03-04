<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserTVShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$idTvShow = filter_input(INPUT_GET, 'id');

$UserTvShowDao = new UserTVShowDaoMysql($pdo);
$isLike = $UserTvShowDao->isLike($userInfo->id, $idTvShow);

if($idTvShow) {
    $userTVShowDao = new UserTVShowDaoMysql($pdo);
    $userDao = new UserDaoMysql($pdo);

    if($isLike) {
        $userTVShowDao->deleteTvShowLikes($userInfo->id, $idTvShow);
    } else {
        $userTVShowDao->addTvShowLikes($userInfo->id, $idTvShow);
    }

    $frase = "Serie curtida com sucesso";
    $_SESSION['frase'] = $frase;

    header("Location: ".$base);
    exit;
}

header("Location: ".$base);
exit;


?>