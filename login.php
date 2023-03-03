<?php 
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/tvshowbook.png" /></a>
        </div>
    </header>
    <div class="container">
        <form method="POST" action="<?=$base;?>/login_action.php">
            <?php if(!empty($_SESSION['flash'])): ?>
                <?= $_SESSION['flash']; ?>
                <?php $_SESSION['flash'] = ''; ?>
            <?php endif; ?>
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu e-mail" name="email">
            </div>
            <div class="form-group mt-3">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" name="password">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Login</button>

            <div class="mt-2">
                <a href="<?=$base;?>/signup.php">Ainda não tem conta? Cadastre-se</a>
            </div>
            
        </form>
    </div>
</body>
</html>