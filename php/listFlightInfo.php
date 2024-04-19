<?php
include_once("classes/flight.php");
$flight = new flight;
$array = $flight->list_flight_info($_SESSION["selected_flight_id"]);
header('Content-Type: application/json');
echo json_encode($array);
?>
