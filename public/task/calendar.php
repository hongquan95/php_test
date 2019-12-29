<?php use App\Config;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('public/template/meta.php') ?>
        <link href='public/fullcalendar/core/main.css' rel='stylesheet' />
        <link href='public/fullcalendar/daygrid/main.css' rel='stylesheet' />
        <script src='public/fullcalendar/core/main.js'></script>
        <script src='public/fullcalendar/daygrid/main.js'></script>
        <script src='public/calendar.js'></script>
    </head>
    <body>
        <div class="container mt-5">
            <?php require_once('public/template/nav.php') ?>
            <div id='calendar'></div>
        </div>
    </body>
</html>
