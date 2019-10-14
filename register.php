<?php
// Create connection
$config= require_once 'config.php';
$conn = new mysqli($config['host'],$config['user'],$config['password'],$config['database']);
//Sesja validacji poprawności danych
session_start();
$_SESSION["status"]=0;//status: 0-nothing 1-register successfully 2-wrong password 3-busy login
$_SESSION["loginInput"]=$_POST["username"];
$_SESSION["emailInput"]=$_POST["email"];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
function filtruj($zmienna)
{
	global $conn;
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe

    // usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysqli_real_escape_string($conn,htmlspecialchars(trim($zmienna)));
}
if (strlen(filtruj($_POST['username']))>2&&strlen(filtruj($_POST['username']))<21) {


	if (strlen(filtruj($_POST['password']))>7) {

		if (isset($_POST['registerbutton']))
		{
		    $login = filtruj($_POST['username']);
		    $haslo1 = filtruj($_POST['password']);
		    $haslo2 = filtruj($_POST['repassword']);
		    $email = filtruj($_POST['email']);
		    $ip = filtruj($_SERVER['REMOTE_ADDR']);

		    // czy login nie jest już w bazie
		    if (mysqli_num_rows(mysqli_query($conn, "SELECT login FROM users WHERE login = '".$login."';")) == 0)
		    {
		        if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
		        {
		            mysqli_query($conn, "INSERT INTO `users` (`login`, `password`, `email`, `rejestracja`, `logowanie`, `ip`)
		                VALUES ('".$login."', '".md5($haslo1)."', '".$email."', '".time()."', '0', '".$ip."');");

		            echo "Konto zostało utworzone!";
                    $_SESSION["status"]=1;
//		            $_SESSION["accountSuccessful"]=true;

		        }
		        else{
			        echo "Hasła nie są takie same";
                    $_SESSION["status"]=2;
//			        $_SESSION["accountSuccessfulPassword"]=true;
		        }
		    }
		    else {
			    echo "Podany login jest już zajęty.";
                $_SESSION["status"]=3;
//			    $_SESSION["accountSuccessfulLogin"]=true;
		    }
		}
	}


} 
mysqli_close($conn);
header("Location: index.php");
exit();
	?>
