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
        <h1><?=$_SESSION['frase'];?></h1>
        <?php if(!empty($_SESSION['frase'])): ?>
        <div class="alert alert-success" role="alert">
            <?=$_SESSION['frase'];?> <a href="#" class="alert-link">Clique aqui</a> para ver a sua lista atual
            <?php $_SESSION['frase'] = ''; ?>
        </div>
        <?php endif; ?>

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