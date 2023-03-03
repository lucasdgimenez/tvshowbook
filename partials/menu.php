<aside class="mt-10">
            <nav>
                <a href="<?=$base;?>">
                    <div class="menu-item <?=$activeMenu=='home'?'active':'';?>">
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/tv.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Busca de series
                        </div>
                    </div>
                </a>
                <!--<a href="<?=$base;?>">
                    <div class="menu-item <?=$activeMenu=='feed'?'active':'';?>">
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/home-run.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Feed
                        </div>
                    </div>
                </a>-->

                <a href="tvshow_watchlist.php">
                    <div class="menu-item <?=$activeMenu=='watchlist'?'active':'';?>">
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/bookmark.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Assistir mais tarde
                        </div>
                    </div>
                </a>

                <a href="tvshow_alreadysee.php">
                    <div class="menu-item <?=$activeMenu=='alreadysee'?'active':'';?>">
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/check-mark.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Serias finalizadas
                        </div>
                    </div>
                </a>

                <a href="tvshow_likes.php">
                    <div class="menu-item <?=$activeMenu=='likes'?'active':'';?>">
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/like.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Series curtidas
                        </div>
                    </div>
                </a>

                <a href="tvshow_favorites.php">
                    <div class="menu-item <?=$activeMenu=='favorites'?'active':'';?>">
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/heart.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Series favoritas
                        </div>
                    </div>
                </a>

                <a href="<?=$base;?>/perfil.php">
                    <div class="menu-item" <?=$activeMenu=='profile'?'active':'';?>>
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/user.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Meu Perfil
                        </div>
                    </div>
                </a>
                <!--<a href="<?=$base;?>/amigos.php">
                    <div class="menu-item" <?=$activeMenu=='friends'?'active':'';?>>
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/friends.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Amigos
                        </div>
                    </div>
                </a>-->

                <div class="menu-splitter"></div>
                <a href="<?=$base;?>/configuracoes.php">
                    <div class="menu-item" <?=$activeMenu=='config'?'active':'';?>>
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/settings.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Configurações
                        </div>
                    </div>
                </a>
                <a href="<?=$base;?>/logout.php">
                    <div class="menu-item">
                        <div class="menu-item-icon">
                            <img src="<?=$base;?>/assets/images/power.png" width="16" height="16" />
                        </div>
                        <div class="menu-item-text">
                            Sair
                        </div>
                    </div>
                </a>
            </nav>
        </aside>