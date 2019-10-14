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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <!--Panel UP-->
    <header class="header">
        <!--Left corner logo-->
        <div class="header__logo">
            PLA<span class="bluen">n</span>NER
        </div>
        <!--Right text to login or register-->
        <nav class="header__buttons">
            <div class="header__button header__button--login">Zaloguj</div>
            <div class="header__button header__button--register">Zarejestruj</div>
        </nav>
    </header>
    <main class="main-content">
        <section class="main-content__slider">
            WSZYSTKO ZAPLANOWANE W JEDNYM MIEJSCU!
            <br /> ŁATWO I PRZEJRZYŚCIE
            <br /> z PLA<span class="bluen">n</span>NER
        </section>
        <!--Form-->
        <section class="main-content__forms">
            <form class="main-content__form main-content__form--register" method="POST" action="register.php">
                <header class="main-content__title main-content__title--register">
                    Rejestracja
                </header>
                <div class="main-content__input-field">
                    <label class="main-content__input-label">
                        Nazwa użytkownika:
                        <input class="main-content__input main-content__input--username" type="text" name="username" value="<?php if(isset($_SESSION["loginInput"])){echo $_SESSION["loginInput"];} ?>" placeholder="login" maxlength="20" required>
                        <?php if($status==3){echo "<span class='main-content__info-error' id='errorfromPHP'><br />Podany login jest zajęty</span>";} ?>
                        <span class="main-content__info-error main-content__info-error--login"></span>
                    </label>
                </div>
                <div class="main-content__input-field">
                    <label class="main-content__input-label">
                        Adres e-mail:
                        <input class="main-content__input main-content__input--email" type="email" value="<?php if(isset($_SESSION["emailInput"])){echo $_SESSION["emailInput"];} ?>" placeholder="user@example.pl" maxlength="40" required>
                        <span class="main-content__info-error main-content__info-error--email"></span>
                    </label>
                </div>
                <div class="main-content__input-field">
                    <label class="main-content__input-label">
                        Hasło:
                        <input class="main-content__input main-content__input--password" type="password" name="password" placeholder="•••••" maxlength="30" required>
                        <span class="main-content__info-error main-content__info-error--password"></span>
                    </label>
                </div>
                <div class="main-content__input-field">
                    <label class="main-content__input-label">
                        Powtórz hasło:
                        <input class="main-content__input main-content__input--repassword" type="password" name="repassword" placeholder="•••••" maxlength="30" required>
                        <span class="main-content__info-error main-content__info-error--repassword"></span>
                        <?php if($status==2){echo "<span class='main-content__info-error' id='errorfromPHP'><br />Podane hasła nie są identyczne</span>";} ?>
                    </label>
                </div>
                <div class="main-content__input-field">
                    <label class="main-content__input-label">
                        Przeczytałem regulamin:
                        <input class="main-content__input main-content__input--terms" type="checkbox" name="terms" <?php if($status==2||$status==3){echo 'checked';} ?>>
                        <span class="main-content__info-error main-content__info-error--terms"></span>
                    </label>
                </div>
                <div class="main-content__input-field">
                    <input class="main-content__submit main-content__submit--register" type="button" name="registerbutton" value="Zarejestruj">
                </div>
            </form>

            <!--Form Login-->
            <form class="main-content__form main-content__form--login" method="POST" action="login.php">
                <header class="main-content__title main-content__title--login">
                    Logowanie
                </header>
                <div class="main-content__input-field">
                    <label class="main-content__input-label">
                        Nazwa użytkownika:
                        <input class="main-content__input" type="text" name="usernamelogin" placeholder="Jan1299" maxlength="20" value="<?php if(isset($_SESSION["loginInput"])){echo $_SESSION["loginInput"];} ?>">
                    </label>
                </div>
                <div class="main-content__input-field">
                    <label class="main-content__input-label">
                        Hasło:
                        <input class="main-content__input" type="password" name="passwordlogin" placeholder="•••••" maxlength="40">
                    </label>
                </div>
                <input class="main-content__submit main-content__submit--login submitbutton login" type="submit" name="loginbutton" value="Zaloguj">
                <span class="main-content__info"></span>
                <?php if($status==5){echo "<span class='main-content__info-error'><br />Błędny login lub hasło</span>";} ?>
            </form>
        </section>
    </main>
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
