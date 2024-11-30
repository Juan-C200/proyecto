<?php
    
    include_once "../lib/helpers.php";
    include_once "../view/partials/head.php";
   
    if(!isset($_SESSION['auth'])){
        redirect("login.php");
    }
    
    
    echo "<body>";
        echo "<div class = 'wrapper d-flex'>";
            include_once "../view/partials/sidebar.php";
            echo "<div class = 'main-panel flex-grow-1'>";
                include_once "../view/partials/navbar.php";
            
                echo"<div class = 'container' id='contenedor'>";
           



                    if(isset($_GET['modulo'])){
                        resolve();
                    }else{
                        
                        // echo "<a href=".getUrl('Tareas', 'Tareas', 'test').">";
                        // echo "<button> Ir a Tarea </button>";
                        // echo "</a>";
                    }
                echo "</div>";
            echo"</div>";
        echo "</div>";
    include_once "../view/partials/footer.php";
    
echo "</body>";
echo "</html>";
    
?>