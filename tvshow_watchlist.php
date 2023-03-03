<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserTVShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'watchlist';

$tvShowDao = new UserTVShowDaoMysql($pdo); 
$tvShow = $tvShowDao->getWatchlist($userInfo->id);

require 'partials/header.php';
require 'partials/menu.php';
?>

<h1>Assistir mais tarde</h1>