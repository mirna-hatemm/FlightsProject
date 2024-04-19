<?php
include_once("classes/company.php");
include_once("classes/passenger.php");

session_start();

if($_SESSION["type"]=="company"){
    $comp=new company();
    $array =$comp->profile_data();
}
else if($_SESSION["type"]=="passenger"){
    $pass=new passenger();
    $array =$pass->profile_data();
}
?>