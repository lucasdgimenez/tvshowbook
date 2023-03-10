<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserTVShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'watchlist';

$tvShowDao = new UserTVShowDaoMysql($pdo); 
$tvShow = $tvShowDao->getWatchlist($userInfo->id);

/* foreach($tvShow as $item) {
    echo '<pre>';
    print_r($item);
} */

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="mt-10" style=" max-width: 800px;">

<h1>Assistir mais tarde</h1>

    <div class="list-tvshows">
        <?php foreach($tvShow as $item): ?>
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
               
