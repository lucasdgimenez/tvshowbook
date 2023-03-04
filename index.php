<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/TvShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

$tvShowDao = new TvShowDAOMySql($pdo);
$tvshows = $tvShowDao->getListTvShow();
/*
echo '<pre>';
print_r($tvshows);*/

require 'partials/header.php';
require 'partials/menu.php';
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<section class="mt-10" style="max-width: 800px;">
    <?php if(!empty($_SESSION['frase'])): ?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['frase'];?>
        <?=$_SESSION['frase']='';?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <div class="list-tvshows">
        <?php foreach($tvshows as $item): ?>
            <?php require 'partials/tvshow-item.php'; ?>
        <?php endforeach; ?>
    </div>

</section>

<style>
    .list-tvshows {
        display: flex;
        flex-wrap: wrap;
        width: 700px;
    }
</style>

