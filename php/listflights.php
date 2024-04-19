<?php
include_once("classes/flight.php");
include_once("classes/company.php");
$comp=new company();
if($comp->check_exist($_POST['email'])){
    $flight=new flight;
    $flight->list_flights($_POST['email'],$_POST['to'],$_POST['from']);
}
  
?>