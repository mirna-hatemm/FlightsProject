<!DOCTYPE html>
<html>
<head>
<title>More Company Info</title>
<style>
body {
 font-family: Arial, sans-serif;
 background:white;
}
form {
 width: 100%;
 max-width: 600px;
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
}
button:hover {
 opacity: 0.8;
}
.form-header {
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
 <h2 class="form-header">More Company Info</h2>
 <form method="post">
    <div>
      <label for="username">Company username:</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div>
      <label for="bio">Bio:</label>
      <input type="text" id="bio" name="bio" required>
    </div>
    <div>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required>
    </div>
    <div>
        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo" accept="image/*">
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

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION["type"]=="company") {
  $username = test_input($_POST["username"]);
  $account = test_input($_POST["account"]);
  $bio = test_input($_POST["bio"]);
  $address = test_input($_POST["address"]);

  $comp=new company();
  $comp->complete_data($bio,$_POST["logo"],$address,$username,$account);
  header("Location:/web/login_page.php");
  exit();
}

?>

</body>
</html>