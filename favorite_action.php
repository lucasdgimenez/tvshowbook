<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserTVShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$idTvShow = filter_input(INPUT_GET, 'id');

if($idTvShow) {
    $userTVShowDao = new UserTVShowDaoMysql($pdo);
    $userDao = new UserDaoMysql($pdo);
    $userTVShowDao->addTvShowFavorites($userInfo->id, $idTvShow);

    header("Location: tvshowitemdetails.php?id=".$base);
    exit;
}

header("Location: ".$base);
exit;


?>