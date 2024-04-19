
<html>
<head>
    <title>Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 4px;
        }
        select {
            height: 40px;
        }
    </style>
</head>
<body>
    <form id="registrationForm" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="telephone">Telephone Number:</label>
        <input type="tel" id="telephone" name="telephone" required>

        <label for="userType">User Type:</label>
        <select id="userType" name="userType" required>
            <option value="company">Company</option>
            <option value="passenger">Passenger</option>
        </select>

        <input type="submit" value="Register">
    </form>

    <?php
    session_start();

    include_once(__DIR__ . "/php/classes/company.php");
    include_once(__DIR__ . "/php/classes/passengar.php");
    include_once(__DIR__ . "/php/input_validiation.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $telephone = test_input($_POST["telephone"]);
        

        if ($_POST["userType"] == "company") {
            $comp = new company();
            if (!$comp->check_exist($email)) {
                $comp->signup($name, $email, $password, $telephone);
                $_SESSION["email"] = $email;
                $_SESSION["type"] = $_POST["userType"];
                header("Location:/web/company_page.php");
                exit();  
            } else {
                $emailErr = "This email is already signed up";
                echo $emailErr ."<br>";
            }
        } else if ($_POST["userType"] == "passenger") {
            $pass = new passenger();
            if (!$pass->check_exist($email)) {
                $pass->signup($name, $email, $password, $telephone);
                $_SESSION["email"] = $email;
                $_SESSION["type"] = $_POST["userType"];
                header("Location:/web/passenger_page.php");
                exit();
            } else {
                $emailErr = "This email is already signed up";
                echo $emailErr ."<br>";
            }
        }
    }
?>

</body>

</html>
