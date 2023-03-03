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

<section class="mt-10" style="max-width: 800px;">
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

