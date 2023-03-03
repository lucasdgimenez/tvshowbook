<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/TvShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'search';

$tvShowDao = new TvShowDaoMysql($pdo);

$searchTerm = filter_input(INPUT_GET, 's');

if(empty($searchTerm)) {
    header("Location: ./");
    exit;
}

$tvShowList = $tvShowDao->findByName($searchTerm);

require 'partials/header.php';
require 'partials/menu.php';
?>

<section>
    <h2>Pesquisa por: <?=$searchTerm;?></h2>

    <div class="list-tvshows">
        <?php foreach($tvShowList as $item): ?>
            <?php require 'partials/tvshow-item.php'; ?>
        <?php endforeach; ?>
    </div>
</section>

<style>

.list-tvshows {
    display: flex;
    width: 700px;
}
    
</style>