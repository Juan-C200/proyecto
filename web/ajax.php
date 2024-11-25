<?php
    include_once "../lib/helpers.php";
    include_once "../view/partials/head.php";
    include_once "../view/partials/navbar.php";
    if(isset($_GET['modulo'])){
        resolve();
    }
    include_once "../view/partials/footer.php";
?>