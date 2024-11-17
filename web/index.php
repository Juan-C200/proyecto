<?php
    
    include_once "../lib/helpers.php";
    include_once "../view/partials/head.php";

    if(!isset($_SESSION['auth'])){
        redirect("login.php");
    }else{

    echo "<body>";
        echo"<div class = 'container'>";
    include_once "../view/partials/navbar.php";

    if(isset($_GET['modulo'])){
        resolve();
    }else{

        echo "<a href=".getUrl('Tareas', 'Tareas', 'test').">";
        echo "<button> Ir a Tarea </button>";
        echo "</a>";
    }
    echo "</div>";
    include_once "../view/partials/footer.php";
    echo "</body>";
    echo "</html>";
    }
?>