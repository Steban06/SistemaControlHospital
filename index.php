<?php
    if (isset($_GET['views'])) $url = explode("/", $_GET['views']);
    else $url = ["login"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Elemetos/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Sistema de Control</title>
</head>

<body>

    <?php 
        if (!isset($_GET['vista']) || $_GET['vista'] == "") {
            $_GET['vista'] = "inicio";
        }
    ?>

    <?php include_once './Aplicacion/Templates/sidebar.php'; ?>
    <section class="home-section">
        <div class="home-content">
            <i class="fa-solid fa-bars bx-menu"></i>
            <span class="text">Sistema de Control</span>
        </div>
        <?php require_once "./Aplicacion/views/".$_GET['vista']."-vista.php"?>
    </section>

    <script>
        let sidebar = document.querySelector(".barra-lateral");
        let sidebarBtn = document.querySelector(".bx-menu");

        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>

</body>

</html>