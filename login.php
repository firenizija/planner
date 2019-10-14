<?php
$config= require_once 'config.php';
$conn = new mysqli($config['host'],$config['user'],$config['password'],$config['database']);
session_start();
$_SESSION["status"]=0;//status: 0-nothing 4-signed 5-not logged in
$_SESSION["key"]=bin2hex(openssl_random_pseudo_bytes(4));
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br />";
function filtruj($zmienna)
{
	global $conn;
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe

    // usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($zmienna)));
}

if (isset($_POST['loginbutton']))
{
    $login = filtruj($_POST['usernamelogin']);
    $haslo = filtruj($_POST['passwordlogin']);
    $ip = filtruj($_SERVER['REMOTE_ADDR']);

    // sprawdzamy czy login i hasło są dobre
    if (mysqli_num_rows(mysqli_query($conn, "SELECT login, password FROM users WHERE login = '".$login."' AND password = '".md5($haslo)."';")) > 0)
    {
        //check if 0
        $lastLoginQuery=mysqli_query($conn,"SELECT logowanie FROM `users` WHERE login='".$login."'");
        $lastLogin=mysqli_fetch_array($lastLoginQuery);
        if ($lastLogin['logowanie']=='0') {
           $firstLogin=true;
           echo "To pierwsze<br />";
        }
        else $firstLogin=false;
        // uaktualniamy date logowania oraz ip
        if(!mysqli_query($conn, "UPDATE users SET logowanie = '".time()."', ip = '".$ip."', session = '".$_SESSION["key"]."' WHERE login = '".$login."';")){
            printf("Error message: %s\n", $conn->error);

        }

        $_SESSION["status"]=4;
        //User Data
        $_SESSION['login'] = $login;
        echo "Zalogowano pomyślnie: $login <br />";
        if ($firstLogin==true) {
            header("Location: user-type.php");
        }
        else{
            header("Location: user-panel.php");
        }
    }
    else{
        echo "Wpisano złe dane.";
        $_SESSION["status"]=5;
        header("Location: index.php");
    }
}
mysqli_close($conn);
exit();
?>
