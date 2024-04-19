<?php
include_once("classes/company.php");              
include_once("classes/passengar.php");

if($_SESSION["type"]=="company"){
    $comp=new company();
    $array =$comp->COM_Home();
}
else if($_SESSION["type"]=="passenger"){
    $pass=new passenger();
    $array =$pass->PASS_Home();
}
?>