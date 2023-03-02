<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/TvShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

$tvShowDao = new TvShowDAOMySql($pdo);
$tvshows = $tvShowDao->getListTvShow();

require 'partials/header.php';
require 'partials/menu.php';
?>

<section class="feed mt-10">
    <div>

        <div class="">
            <?php foreach($tvshows as $item): ?>
                <?php require 'partials/tvshow-item.php'; ?>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php 
require 'partials/footer.php';
?>