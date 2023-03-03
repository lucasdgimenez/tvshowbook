<?php 
require_once 'config.php';
require_once 'dao/TvShowDaoMysql.php';

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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Detalhes</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/tvshowitem.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container tvshowItem">
        <div class="tvshowItem_image">
            <img src="<?=$tvshow->capa;?>" alt="">
        </div>

        <div class="tvshowItem_description">
            <h1><?=$tvshow->name;?></h1>
            <div class="buttons">
                <a href="alreadysee_action.php?id=<?=$tvshow->id;?>" class="button">
                    Já vi
                </a>
                <a href="watchlist_action.php?id=<?=$tvshow->id;?>" class="button">
                    Quero ver
                </a>
                <a href="like_action.php?id=<?=$id;?>" class="button">
                    Gostei
                </a>
                <a href="favorite_action.php?id=<?=$id;?>" class="button">
                    Favoritar
                </a>
            </div>
            <p><?=$tvshow->description;?></p>
        </div>
        
        
        
    </section>
    
</body>
</html>