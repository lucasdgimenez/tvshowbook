<?php 

?>

    <a class="itemTvShow" href="<?=$base;?>/tvshowitemdetails.php?id=<?=$item->id;?>">
        <div class="">
            <img src="<?=$item->capa;?>" alt="">
            
        </div>
        <div class="">
            <h4><?=$item->name;?></h4>
        </div>
    </a>
        <!--</div>-->

<style>
    
    .itemTvShow img {
        max-width: 200px;
        height: 150px;
    }

    .itemTvShow {
        max-width: 300px;
        margin: 5px;
    }

    .itemTvShow div {
        /*background-color: yellow;*/
        max-width: 300px;
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }
</style>