<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/TvShowDaoMysql.php';
require_once 'dao/UserTVShowDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

$tvshow = false;

$id = filter_input(INPUT_GET, 'id');
if($id) {
    $tvShowDao = new TvShowDAOMySql($pdo);
    $tvshow = $tvShowDao->findById($id);
} 

if($tvshow === false) {
    header("Location: index.php");
    exit;
}

$UserTvShowDao = new UserTVShowDaoMysql($pdo);
$isAlreadySee = $UserTvShowDao->isAlreadySee($userInfo->id, $id);
$isWatchlist = $UserTvShowDao->isWatchlist($userInfo->id, $id);
$isLike = $UserTvShowDao->isLike($userInfo->id, $id);
$isFavorite = $UserTvShowDao->isFavorite($userInfo->id, $id);

require 'partials/header.php';
require 'partials/menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Detalhes</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/tvshowitem.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <section class="tvshowItem mt-10">

        <div style="display: flex;">
            <div class="tvshowItem_image">
                <img src="<?=$tvshow->capa;?>" alt="">
            </div>

            <div class="tvshowItem_description">
                <h1><?=$tvshow->name;?></h1>
                <div>
                    <?php if(!$isAlreadySee):?>
                        <a 
                            href="alreadysee_action.php?id=<?=$tvshow->id;?>" 
                            class="button" 
                            style="margin: 8px;"
                        >
                            Já vi
                        </a>
                        <?php else:?>
                        <a 
                            href="alreadysee_action.php?id=<?=$tvshow->id;?>" 
                            class="button" 
                            style="margin: 8px; background: green"
                        >
                            <img src="<?=$base;?>/assets/images/check-mark.png" width="16" height="16" alt="">
                            Já vi
                        </a>
                        <?php endif;?>
      
                    <?php if(!$isWatchlist):?>
                        <a 
                            href="watchlist_action.php?id=<?=$tvshow->id;?>" class="button" 
                            style="margin: 8px;"
                        >
                            Quero ver
                        </a>
                        <?php else:?>
                        <a 
                            href="watchlist_action.php?id=<?=$tvshow->id;?>" class="button" 
                            style="margin: 8px; background: green"
                        >
                            <img src="<?=$base;?>/assets/images/check-mark.png" width="16" height="16" alt="">
                            Quero ver
                        </a>
                    <?php endif;?>
                    
                    <?php if(!$isLike):?>
                        <a 
                            href="like_action.php?id=<?=$id;?>" class="button" 
                            style="margin: 8px;"
                        >
                            Gostei
                        </a>
                        <?php else:?>
                        <a 
                            href="like_action.php?id=<?=$id;?>" class="button" 
                            style="margin: 8px; background: green"
                        >
                            <img src="<?=$base;?>/assets/images/check-mark.png" width="16" height="16" alt="">
                            Gostei
                        </a>
                    <?php endif;?>

                    <?php if(!$isFavorite):?>
                        <a 
                            href="favorite_action.php?id=<?=$id;?>" class="button" 
                            style="margin: 8px;"
                        >
                            Favoritar
                        </a>
                        <?php else:?>
                        <a 
                            href="favorite_action.php?id=<?=$id;?>" class="button" 
                            style="margin: 8px; background: green"
                        >
                            <img src="<?=$base;?>/assets/images/check-mark.png" width="16" height="16" alt="">
                            Favoritar
                        </a>
                    <?php endif;?>
                </div>
                <p class="mt-5" ><?=$tvshow->description;?></p>
            </div>
        </div>
        
    
       
        
        
        
    </section>

    
    
</body>

</html>

