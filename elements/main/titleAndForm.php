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
