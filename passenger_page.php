
<head>
<title>More Passenger Info</title>
<style>
body {
 font-family: Arial, sans-serif;
 background:white;
}
form {
 width: 600px;
 margin: 0 auto;
 border: 1px solid #007bff;
 padding: 16px;
 background:white;
}
form div {
 margin-bottom: 15px;
}
input[type="text"],
input[type="email"],
input[type="password"],
input[type="tel"] {
 width: 100%;
 padding: 12px 20px;
 margin: 8px 0;
 box-sizing: border-box;
 border: 2px solid #007bff;
}
button {
 background-color: #007bff;
 color: white;
 padding: 14px 20px;
 margin: 8px 0;
 border: none;
 cursor: pointer;
 width: 100%;
 border: 2px solid #ccc;
}

button:hover {
 opacity: 0.8;
}
.class {
 text-align: center;
 font-size: 28px;
 color: #007bff;
}
.ALL {
 padding: 16px;
}
@media screen and (max-width: 600px) {
 form {
    width: 100%;
 }
}
</style>
</head>
<body>

<div class="ALL">
 <h2 class="class">More Passenger Info</h2>
 <form method="post" enctype="multipart/form-data">
    <div>
      <label for="passport">Passport Number:</label>
      <input type="text" id="passport" name="passport" required>
    </div>
    <div>
      <label for="passportphoto">Passport Photo:</label>
      <input type="file" id="passportphoto" name="passportphoto" required>
    </div>
    <div>
      <label for="passengerphoto">Passenger Photo:</label>
      <input type="file" id="passengerphoto" name="passengerphoto" required>
    </div>
    <div>
      <label for="account">Account $:</label>
      <input type="text" id="account" name="account" required>
    </div>
    <button type="submit">submit</button>
 </form>
</div>

<?php

include_once(__DIR__ . "/php/classes/company.php");
include_once(__DIR__ . "/php/classes/passengar.php");
include_once(__DIR__ . "/php/input_validiation.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["type"]=="passenger") {
  $account = test_input($_POST["account"]);
  $passport = test_input($_POST["passport"]);

  $pass=new passenger();
  $pass->complete_data($passport,$_POST["passportphoto"],$_POST["passengerphoto"],$account);
  header("Location:/web/login_page.php");
  exit();
}
 
?>

</body>
</html>