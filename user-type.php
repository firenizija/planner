<!DOCTYPE html>
<html>

<head>
    <?php
        $config= require_once 'config.php';
        $conn = new mysqli($config['host'],$config['user'],$config['password'],$config['database']);
        session_start();
        if (mysqli_num_rows(mysqli_query($conn, "SELECT login, session FROM users WHERE login = '".$_SESSION['login']."' AND session = '".$_SESSION["key"]."';")) == 0){
            header("Location: index.php");
            exit();
        }
        ?>
        <title>PLAnNER</title>
        <meta charset="utf-8">
        <!--BG&Font Style-->
        <link rel="stylesheet" type="text/css" href="css\background.css">
        <link rel="stylesheet" type="text/css" href="css\main-style.css">
        <!--Spreche styles-->
        <link rel="stylesheet" type="text/css" href="css\user-type-style.css">
        <!--Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Bootstrap CSS End-->
</head>

<body>
    <!--Panel UP-->
    <ul id="topnav" class="row">
        <!--Left corner text-->
        <li class="col-10"><span id="left-corner">PLA<span class="bluen">n</span>NER</span>
        </li>
        <!--User panel-->
        <li class="user col-lg-2">
            <ul id="user">
                <li><span id="usericon" class="fa fa-user-circle"></span>&nbsp;Witaj&nbsp;
                    <?php echo $_SESSION['login']; ?>&nbsp;</li>
            </ul>
        </li>
    </ul>
    <!--Panel UP End-->
    <!--Type menu-->
    <ul class="types row">
        <li class="col-sm-12">Witaj
            <?php echo $_SESSION['login']; ?>!</li>
        <li class="col-sm-12 down"><span>Wybór pomoże nam dopasować moduły, które będą wyświetlane w panelu użytkownika<p style="font-size: smaller">Możesz je potem samemu dodać lub usunąć w sekcji ustawień</p></span>
            <hr id="horizontal" />
        </li>
        <label class="col-3" onclick="about(1);">
            <li class="fa fa-graduation-cap">
                <p>Uczeń</p>
            </li>
        </label>
        <label class="col-3" onclick="about(2);">
            <li class="fa fa-line-chart">
                <p>Praca WIP</p>
            </li>
        </label>
        <label class="col-3" onclick="about(3);">
            <li class="fa fa-user-o">
                <p>Osobiste WIP</p>
            </li>
        </label>
        <label class="col-3" onclick="about(4);">
            <li class="fa fa-pencil">
                <p>Inne WIP</p>
            </li>
        </label>
        <li class="col-sm-12"><span id="about-list"></span></li>
    </ul>
    <!--Type menu End-->
    <!--Background particles-->
    <div id="particles-js"></div>
    <!--Background particles End-->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- BG particles -->
<script type="text/javascript" src="js\particles.min.js"></script>
<script src="js\app.js"></script>
    <script type="text/javascript" src="js\usertypestyle.js"></script>
</body>

</html>
<!--
    TO DO:
-Pomyśleć coś z znikającym loginem i rejestacją na górze