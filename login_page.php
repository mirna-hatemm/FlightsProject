<html>
<head>
  <title>Login</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<style>
body {
 font-family: Arial, sans-serif;
}

.ALL {
 max-width: 300px;
 padding: 16px;
 margin: 0 auto;
}

button {
 font-size: 16px;
 padding: 8px 16px;
 margin: 8px 0;
 display: inline-block;
 cursor: pointer;
 border: none;
 width: 100%;
 background-color: #007bff;
 color: white;
}

button:hover {
 background-color:#007bff;
}

.class {
 text-align: center;
 font-size: 28px;
 color: #007bff;
}
</style>
</head>
<body>

<div class="ALL">
 <h2 class="class">Login</h2>
 <form id="login" method="post">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
<br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
<br>
    <label for="role">Role:</label>
    <select id="role" name="role">
    <option value="company">Company</option>
    <option value="passenger">Passenger</option>
    </select>

    <button type="submit">Login</button>
 </form>
</div>

<?php
include_once(__DIR__ . "/php/classes/company.php");
include_once(__DIR__ . "/php/classes/passengar.php");
include_once(__DIR__ . "/php/input_validiation.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);

    if($_POST["role"]=="company"){
      $comp=new company();
      if($comp->sign_in($email,$password)){
        header("Location:/web/company_home.html");
        exit();
      }
      else {
        echo "wrong email or password <br>";
      }
    } else if($_POST["role"]=="passenger"){
      $pass=new passenger();
      if($pass->sign_in($email,$password)){
        header("Location:/web/PassengerHome.php");
        exit();
      }
      else{
        echo "wrong email or password <br>";
      }
    }
  }
 
?>

</body>
</html>