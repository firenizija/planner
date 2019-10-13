<?php
    //iduser
    $idQuery=mysqli_query($conn, "SELECT id FROM `users` WHERE login='".$_SESSION['login']."' AND session='".$_SESSION["key"]."';");
    $iduser=mysqli_fetch_array($idQuery);//$iduser[0] is user logged in id
    //data from 'setmodules' table. take position and module name from set modules and module and order by position
    $sql_query_user_modules="SELECT setmodules.idmodule, modules.module FROM setmodules INNER JOIN modules ON setmodules.idmodule=modules.id WHERE setmodules.iduser=".$iduser[0]." "."ORDER BY position ASC;";
    $result_user_modules=mysqli_query($conn, $sql_query_user_modules);
    $added_modules=array("0");
    
    if ($result_user_modules->num_rows > 0) {
        // output data of each row
        while($row = $result_user_modules->fetch_assoc()) {
            //echo "module: " . $row["module"]. " - position: " . $row["position"]. "<br>";
            $module_name=$row["module"];
            include("modules/".$module_name."/".$module_name.".html");//include module ssi
            array_push($added_modules,$row["idmodule"]);
        }
    } 

    function addModule(){
        global $iduser, $conn;
        $sql_module_postion=mysqli_query($conn, "SELECT COUNT(id) FROM setmodules WHERE iduser=".$iduser[0].";");
        $module_postion=mysqli_fetch_array($sql_module_postion);
        
        if(mysqli_query($conn, "INSERT INTO `setmodules` (`id`, `iduser`, `idmodule`, `position`) VALUES (NULL, ".$iduser[0].", '".$_POST['selected_module']."', '".$module_postion[0]."');")){
            echo("<meta http-equiv='refresh' content='0'>");
        }
        
    }

    //call addModule()
    if(isset($_POST['addModuleButton'])){
        unset($_POST['addModuleButton']);
        addModule();
    } 

?>
<link rel="stylesheet" href="modules\add_module.css">
<ul class="add_module_list col-md-4 text-center">
    <span id="title-text" class="col-12">Dodaj wydarzenie do planu</span>
    <span class="fa fa-window-close closeEventForm" title="Zamknij" onclick="closeModuleList();"></span>
    <form action="" method="post">
        <?php
            $sql_module_list="SELECT id, module FROM `modules`;";
            $result_module_list=mysqli_query($conn ,$sql_module_list);
            $li_before="<li><label><input type='radio' name='selected_module' ";
            $li_before_if_module_is="<li style='color:gray;'><label><input type='radio' name='selected_module' ";
            $li_after="</label></li>";
        if ($result_module_list->num_rows > 0) {
            // output data of each row
            while($row = $result_module_list->fetch_assoc()) {
                if(in_array($row["id"], $added_modules)){
                    echo $li_before_if_module_is."value='".$row["id"]."'>". $row["module"].$li_after;
                }
                else{
                    echo $li_before."value='".$row["id"]."'>". $row["module"].$li_after;
                }
                
            }
        }
         
         ?>
        <input type="submit" value="Dodaj" name="addModuleButton" id="add_module_button" class="btn btn-primary">
    </form>
</ul>
<script>
    //prevent a form from resubmitting when the page is refreshed
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>
