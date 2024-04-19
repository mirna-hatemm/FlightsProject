<?php
include_once("connection.php");

session_start();

class flight extends connection{

    function list_all_flights()
    {
        $email = $_SESSION["email"] ?? '';
        $query1 = "SELECT * FROM flight WHERE company_email='$email'";
        $flightsResult = mysqli_query(parent::connect(), $query1);
        $flights = [];
        while ($row = mysqli_fetch_assoc($flightsResult)) {
        $flights[] = $row;
        }
        $data["flights"] = $flights;
        header('Content-Type: application/json');
        echo json_encode($data);
        parent::disconnect();

    }
    function list_flights($from,$to)
    {
        $query = "SELECT * FROM flight WHERE `from`='$from' AND `to`='$to'";
        $flightsResult = mysqli_query(parent::connect(), $query);
        $flights = [];
        while ($row = mysqli_fetch_assoc($flightsResult)) {
        $flights[] = $row;
        }
        $data["flights"] = $flights;
        header('Content-Type: application/json');
        echo json_encode($data);
        parent::disconnect();
        header("Location:/web/search_result.html");
    }

    function list_flight_info($id)
    {
        $query = "SELECT * FROM flight WHERE id='$id";
        $result=mysqli_query(parent::connect(),$query);
        if (!$result) {
            $error = mysqli_error(parent::connect());
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array('error' => $error));
            parent::disconnect();
            exit;
        }
        $flights = [];
        while ($row = mysqli_fetch_assoc($result)) {
        $flights[] = $row;
        }
        $data["flights"] = $flights;
        header('Content-Type: application/json');
        echo json_encode($data);
        parent::disconnect();
    }

    function addFlight($name,$from,$to,$itinerary,$fees,$departure,$arrival)
    {   
        $email=$_SESSION["email"];
        $query="INSERT INTO flight (name , `from` , `to` , itinerary , fess,passengar_num,status,departure,arrival,company_email)
        VALUES ('$name','$from','$to','$itinerary','$fees',0,'notcompleted','$departure','$arrival','$email')";
        mysqli_query(parent::connect(),$query);
        parent::disconnect();
    }

    function listCompletedFlights()
    {
        $email=$_SESSION["email"];
        $query = "SELECT * FROM flight WHERE status='completed' AND company_email='$email'";
        $flightsResult = mysqli_query(parent::connect(), $query);
        $flights = [];
        while ($row = mysqli_fetch_assoc($flightsResult)) {
        $flights[] = $row;
        }
        $data["flights"] = $flights;
        header('Content-Type: application/json');
        echo json_encode($data);
        parent::disconnect();
    }

    function listNotCompletedFlights()
    {
        $email=$_SESSION["email"];
        $query = "SELECT * FROM flight WHERE status='notcompleted' AND company_email='$email'";
        $flightsResult = mysqli_query(parent::connect(), $query);
        $flights = [];
        while ($row = mysqli_fetch_assoc($flightsResult)) {
        $flights[] = $row;
        }
        $data["flights"] = $flights;
        header('Content-Type: application/json');
        echo json_encode($data);
        parent::disconnect();
    }
}
?>
