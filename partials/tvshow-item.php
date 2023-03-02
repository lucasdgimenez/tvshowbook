<?php 

?>

<div class="box feed-item">
    <div class="box-body">
            <div class="feed-item-head row mt-20 m-width-20">
                <div class="feed-item-head-info">
                    <a class="itemTvShow" href="<?=$base;?>/tvshowitemdetails.php?id=<?=$item->id;?>">
                        <div type="submit">
                            <img src="<?=$item->capa;?>" alt="">
                            <h3><?=$item->name;?></h3>
                        </div>
                    </a>
                </div>

                <div class="feed-item-head-btn">
                    <img src="<?=$base;?>/assets/images/more.png" />
                </div>
            </div>
        
        </div>
    
    </div>
</div>

<style>
    img {
        max-width: 250px;
    }

    .itemTvShow {
        background-color: red;
        max-width: 300px;

    }

    .itemTvShow div {
        background-color: yellow;
        max-width: 300px;
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }
</style>