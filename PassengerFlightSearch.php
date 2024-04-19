<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Flight Search</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .flight-search-form {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"] {
            width: calc(50% - 10px);
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .flight-list {
            border-collapse: collapse;
            width: 100%;
        }

        .flight-list th,
        .flight-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .flight-list th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>

<body>
    <header>
        <h1>Flight Search</h1>
    </header>

    <div>
    <form class="flight-search-form" method="post">
            <label for="From">From:</label>
            <input type="text" id="From" name="From" required>
            <br>
            <label for="To">To:</label>
            <input type="text" id="To" name="To" required>
            <button type="submit">Search</button>
    </form>
</div>

<?php

include_once(__DIR__ . "/php/classes/flight.php");
include_once(__DIR__ . "/php/input_validiation.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["type"]=="passenger") {
    $from = test_input($_POST["From"]);
    $to = test_input($_POST["To"]);

    $f = new flight();
    $f->list_flights($from,$to);
}
 
?>


</body>

</html>