<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <?php
        $config= require_once 'config.php';
        $conn = new mysqli($config['host'],$config['user'],$config['password'],$config['database']);
        mysqli_query($conn,'SET NAMES utf8');
        session_start();
        if (mysqli_num_rows(mysqli_query($conn, "SELECT login, session FROM users WHERE login = '".$_SESSION['login']."' AND session = '".$_SESSION["key"]."';")) == 0){
            header("Location: index.php");
            exit();
        }
        ?>
    <title>PLAnNER</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--BG-->
    <link rel="stylesheet" type="text/css" href="css\background.css">
    <!--Nav-->
    <link rel="stylesheet" type="text/css" href="css\base.css">
    <!--user-panel style-->
    <link rel="stylesheet" type="text/css" href="css\user-panel-style.css">
    <!-- module styles -->
    <link rel='stylesheet' type='text/css' href='modules\modules.css'>
    <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <?php
            include 'loadevents.php';
        ?>
    <script type="text/javascript">
        var events = [<?php echo '"'.implode('","', loadEvent()).'"' ?>];

    </script>
</head>

<body>
    <!--Panel UP-->
    <header class="header">
        <!--Left corner logo-->
        <div class="header__logo">
            PLA<span class="bluen">n</span>NER
        </div>
        <!--Right text to login or register-->
        <nav class="header__user">
            <ul class="header__user-list">
                <li class="header__welcome-user">
                    <span class="header__icon fa fa-user-circle"></span>
                    &nbsp;Witaj&nbsp;
                    <?php echo $_SESSION['login']; ?>&nbsp;
                    <span class="header__icon fas fa-angle-down"></span>
                </li>
                <div class="header__user-options">
                    <li class="header__user-option header__user-option--account-settings">
                        Ustawienia konta
                    </li>
                    <li class="header__user-option header__user-option--logout" onclick="location.href='logout.php';">
                        Wyloguj
                    </li>
                </div>
            </ul>
        </nav>
    </header>
    <main class="moduleContainer">
        <ul class="moduleContainer__list">
            <?php
            include("modules.php"); 
            ?>
            <!--add new module big button-->
            <li class="moduleContainer__add-module">
                <span class="moduleContainer__add-plus fa fa-plus-circle"></span>
            </li>
        </ul>
    </main>
    <!--gray bg-->
    <div class="graybg" id="graybg"></div>
    <script type="text/javascript" src="modules\add-event.js"></script>
    <script type="text/javascript" src="modules\modules.js"></script>
    <!--Background particles-->
    <div id="particles-js"></div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
    <!--Text to right-->
    <script type="text/javascript" src="js\userpanel.js"></script>
    <!-- BG particles -->
    <script type="text/javascript" src="js\particles.min.js"></script>
    <script src="js\app-stars.js"></script>
</body>

</html>
<!--
    TODO:
        Zrobić dni wolne zielonkawe przezroczyste tło 
        Jak nie ma godziny to napis "Cało dniowe"
        Jak nie ma roku to co roczne a jak roku i miesiąca to co miesięczne dodać co tygodniowe
        !Błąd z planem lekcji nasza szkoła bierze mniej niż powinna klas i jak się dwa razy wykona funkcję to dopiero jest pełna lista klas :OO
