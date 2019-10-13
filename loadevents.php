<?php
  	$hm=0;
function loadEvent()
{
	global $conn, $hm;
    $idQuery=mysqli_query($conn,"SELECT id FROM `users` WHERE login='".$_SESSION['login']."' AND session='".$_SESSION["key"]."';");
    $iduser=mysqli_fetch_array($idQuery);
   	$eventsQuery=mysqli_query($conn,"SELECT name, groupName, color, type, day, month, hour, minute, year FROM `plans` WHERE idusers='".$iduser[0]."' ORDER BY `plans`.`year`, `plans`.`month`, `plans`.`day`, `plans`.`month`, `plans`.`hour`, `plans`.`minute` ASC;");
   	while ($events=mysqli_fetch_array($eventsQuery)) {
	    $eventsList['nameS'.$hm] = $events["name"];
	    $eventsList['groupNameS'.$hm] = $events["groupName"];
	    $eventsList['colorS'.$hm] = $events["color"];
	    $eventsList['typeS'.$hm] = $events["type"];
	    $eventsList['hourS'.$hm] = $events["hour"];
	    $eventsList['minuteS'.$hm] = $events["minute"];
	    $eventsList['dayS'.$hm] = $events["day"];
	    $eventsList['monthS'.$hm] = $events["month"];
	    $eventsList['yearS'.$hm] = $events["year"];
	    $hm++;
   	}
   	$eventsList['lenght-row'] = $hm;
   	return $eventsList;
}
loadEvent();
?>