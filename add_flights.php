<html>
<head>
    <title>Add Flight</title>
    <style>
        body {
            background-color: #000000;
            font-family: Arial, sans-serif;
        }
        .ALL {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px 0px #007bff;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #0d00ff;
            border-radius: 3px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="ALL">
        <h2>Add Flight</h2>
        <form method="post">
            <div class="class">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required><br><br>
            </div>

            <div class="class">
                <label for="itinerary">From:</label>
                <input type="text" id="from" name="from" class="form-control" required><br><br>
            </div>

            <div class="class">
                <label for="itinerary">To:</label>
                <input type="text" id="to" name="to" class="form-control" required><br><br>
            </div>

            <div class="class">
                <label for="itinerary">Itinerary:</label>
                <input type="text" id="itinerary" name="itinerary" class="form-control" required><br><br>
            </div>

            <div class="class">
                <label for="fees">Fees:</label>
                <input type="number" id="fees" name="fees" class="form-control" required><br><br>
            </div>

            <div class="class">
                <label for="time">Departure time:</label>
                <input type="text" id="departure" name="departure" class="form-control" required><br><br>
            </div>

            <div class="class">
                <label for="time">Arrival time:</label>
                <input type="text" id="arrival" name="arrival" class="form-control" required><br><br>
            </div>

            <input type="submit" value="Add Flight" class="btn btn-primary">
        </form>
    </div>
</body>

<?php

include_once(__DIR__ . "/php/classes/flight.php");
include_once(__DIR__ . "/php/input_validiation.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["type"]=="company") {
    $from = test_input($_POST["from"]);
    $to = test_input($_POST["fo"]);
    $name = test_input($_POST["name"]);
    $itinerary = test_input($_POST["itinerary"]);
    $fees = test_input($_POST["fess"]);
    $departure = test_input($_POST["departure"]);
    $arrival = test_input($_POST["arrival"]);

    $f = new flight();
    $flight->addFlight($name,$from,$to,$itinerary,$fees,$departure,$arrival);
    header("Location:/web/company_home.html");
    exit();
}
 
?>

</html>