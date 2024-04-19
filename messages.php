<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: gray;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        #ALL {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: #007bff;
        }

        .passenger-list {
            margin-top: 20px;
        }

        .passenger-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .passenger-item span {
            flex: 1;
            padding: 0 10px;
        }

        .DO {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .cancelandrefund {
            background-color: #007bff;
            color: white;
        }

        .DO:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div>
    <form id="addmessage" method="post">
        <label for="content">Enter message:</label>
        <input type="text" id="content" name="content" required>
        <label for="ComEmail">Enter company email:</label>
        <input type="email" id="ComEmail" name="ComEmail" required>
        <button type="submit" id="send message">send</button>
    </form>
</div>
</body>

<?php

include_once(__DIR__ . "/php/input_validiation.php");
include_once(__DIR__ . "/php/classes/messages.php");
include_once(__DIR__ . "/php/classes/company.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["type"]=="passenger") {
    $message = test_input($_POST["content"]);
    $com_email = test_input($_POST["ComEmail"]);

    $mesg=new messages();
    $mesg->addMessage($message,$com_email);
}
 
?>

</html>