    <link rel="shortcut icon" href="gambar/coffe.webp">
            <?php
            session_start();
            if (isset($_GET['x']) && $_GET['x'] == 'home') {
                $page = "exercise.php"; 
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
                $page = "settings.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
                if($_SESSION['level_decafe']==1){
                    $page = "user.php";
                    include "main.php";
                }else{
                    $page = "exercise.php"; 
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'customer') {
                $page = "customer.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
                if($_SESSION['level_decafe']==1){
                    $page = "report.php";
                    include "main.php";
                }else{
                    $page = "exercise.php"; 
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'menu') {
                $page = "explorer.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
                include "login.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
                include "proses/proses_logout.php";
            }elseif (isset($_GET['x']) && $_GET['x'] == 'katmenu') {
                $page = "report.php"; 
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'orderitem') {
                $page = "order_item.php"; 
                include "main.php";
            } else {
                $page = "exercise.php";
                include "main.php";
            }
            ?>