<?php 
require_once 'config.php';
require_once 'models/Auth.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

require 'partials/header.php';
?>

<section class="feed mt-10">
    Opa
</section>

<?php 
require 'partials/footer.php';
?>