<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Passenger Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-content">
            <h1>Passenger Profile</h1>
        </div>
    </header>

    <main class="container">
        <form id="profileForm" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="tel">Tel:</label>
            <input type="tel" id="tel" name="tel" required>

            <button type="submit">Save Changes</button>
        </form>
    </main>
</body>

<?php

include_once(__DIR__ . "/php/classes/company.php");
include_once(__DIR__ . "/php/classes/passengar.php");
include_once(__DIR__ . "/php/input_validiation.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["type"]=="passenger") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $tel = test_input($_POST["tel"]);

    $pass=new passenger();
    $pass->edit($name,$email,$tel);
    header("Location:/web/PassengerHome.php");
    exit();
}
 
?>

</html>