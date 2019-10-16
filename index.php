<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
    <?php
		session_start();
		if (isset($_SESSION['login'])&&$_SESSION['login']!=""&&isset($_SESSION["status"])&&$_SESSION["status"]==4) {
			header("Location: user-panel.php"); // if user is logged go to user-panel end end this code
			exit();
		}
    
        if(isset($_SESSION["status"])){
            $status=$_SESSION["status"];
        }
        else{
            $_SESSION["status"]=0;
            $status=0;
        }

if (isset($_SESSION["incorrectDataLogin"])) {
$incorrectLogin=$_SESSION["incorrectDataLogin"];//if login is gone wrong
}
else $incorrectLogin=false;

if ($status==1) {
$passwordERROR=false;//if register success set falses on errors
$loginERROR=false;
}
		?>
    <title>PLAnNER</title>
    <!--BG&Font Style-->
    <link rel="stylesheet" type="text/css" href="css\background.css">
    <link rel="stylesheet" type="text/css" href="css\base.css">
    <link rel="stylesheet" type="text/css" href="css\indexstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <?php
    include "elements/main/header.php";
    include "elements/main/titleAndForm.php";
    include "elements/main/articles.php";
    ?>
    <!--Background particles-->
    <div id="particles-js"></div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js\valid.js"></script>
    <script type="text/javascript">
        var status = <?php echo $status ?>

    </script>
    <!-- BG particles -->
    <script type="text/javascript" src="js\particles.min.js"></script>
    <script src="js\app.js"></script>
    <script type="text/javascript" src="js\switch-form.js"></script>
</body>
<?php
    if($status!=4){
        unset($_SESSION["status"]);
    }
    ?>

</html>
<!--
	TO DO:
-Polepszyć validację po stronie php żeby nie było przypału!
-Aktualizacja logowania zakazanie znaków tak jak jest to w rejestracji
-Czerwone pola tam gdzie błąd i znikający napis błędu po button down
-na iphone nie działa pole włączyć select na inputach
-naprawić php login i register zrobić funkcję i ogarnąć można wejść do login tak oo ...;-; przez jquery
