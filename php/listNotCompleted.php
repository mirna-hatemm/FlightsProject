<?php
include_once("classes/flight.php");

$flight=new flight;
$array =$flight->listNotCompletedFlights();
?>