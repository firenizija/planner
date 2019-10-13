<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
session_start();
$config= require_once 'config.php';
$conn = new mysqli($config['host'],$config['user'],$config['password'],$config['database']);
mysqli_query($conn,'SET NAMES utf8');
$dateEvent = strtotime($_POST['DateEvent']);
function filtruj($zmienna)
{
	global $conn;
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe

    // usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($zmienna)));
}
if ($dateEvent) {
  $year = date('Y', $dateEvent);
  $day = date('d', $dateEvent);
  $month = date('m', $dateEvent);
  echo $day.".".$month.".".$year;
} else {
  echo 'Invalid Date: ' . $_POST['DateEvent'];
}
$time = strtotime($_POST['timeEvent']);
if($time){
	$hour = date("H",$time);
	$minute= date("i",$time);
	echo $hour.":".$minute;
}else{
	echo 'Invalid Time: ' . $_POST['timeEvent'];
}
if (isset($_POST['NameEvent'])) {
	$name=filtruj($_POST['NameEvent']);
}else{
	echo "Invalid Name";
}

if (isset($_POST['GroupEvent'])) {
	$group=filtruj($_POST['GroupEvent']);
}else{
	echo "Invalid GroupEvent";
}

if (isset($_POST['ColorEvent'])) {
	$color=filtruj($_POST['ColorEvent']);
}else{
	echo "Invalid ColorEvent";
}

if (isset($_POST['TypeEvent'])) {
	$type=filtruj($_POST['TypeEvent']);
}else{
	echo "Invalid TypeEvent";
}
    $idQuery=mysqli_query($conn,"SELECT id FROM `users` WHERE login='".$_SESSION['login']."' AND session='".$_SESSION["key"]."';");
    $iduser=mysqli_fetch_array($idQuery);



if ($_POST['sendEvent']=="Zapisz") {
	saveEvent();
}
function saveEvent()
{
	global $conn, $name, $group, $color, $type, $hour, $minute, $day, $year, $month, $iduser;
    if(!mysqli_query($conn, "INSERT INTO plans (name, groupName, color, type, hour, minute, day, month, year, idusers) VALUES ('".$name."', '".$group."', '".$color."', '".$type."', '".$hour."', '".$minute."', '".$day."', '".$month."', '".$year."', '".$iduser[0]."');")){
        printf("Error message: %s\n", $conn->error);
    }
}
header("Location: user-panel.php");
?>
</body>
</html>