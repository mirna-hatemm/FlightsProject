<?php
include_once("classes/company.php");
include_once("classes/passengar.php");

session_start();

if($_SESSION["type"]=="company"){
    $comp=new company();
    $comp->edit($_POST["field"],$_POST["value"]);
}
else if($_SESSION["type"]=="passenger"){
    $pass=new passenger();
    $pass->edit($_POST["name"],$_POST["email"],$_POST["tel"]);
}

header("Location:/web/PassengerHome.html");
exit();

?>