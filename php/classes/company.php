<?php
include_once("connection.php");

session_start();

class company extends connection{

    function signup($name,$email,$password,$tel){
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        $query="INSERT INTO company (name , email, password ,tel) VALUES ('$name','$email','$hashedPass','$tel')";
        mysqli_query(parent::connect(),$query);
        parent::disconnect();
    }

    function complete_data($bio,$logo,$address,$username,$account){
        $email=$_SESSION["email"];
        $query = "UPDATE company SET bio = '$bio', logo='$logo', address = '$address', username='$username', account='$account' WHERE email = '$email'";
        mysqli_query(parent::connect(),$query);
        parent::disconnect();
    }

    function sign_in($email,$password){
        $query="SELECT * FROM company WHERE email='$email'";
        $result=mysqli_query(parent::connect(),$query);
        if($result->num_rows>0){
            session_start();
            $user=mysqli_fetch_assoc($result);
            if (password_verify($password, $user["password"])) {
                $_SESSION["email"]=$email;
                $_SESSION["name"]=$user["name"];
                $_SESSION["bio"]=$user["bio"];
                $_SESSION["address"]=$user["address"];
                $_SESSION["username"]=$user["username"];
                $_SESSION["logo"]=$user["logo"];
                $_SESSION["account"]=$user["account"];
                $_SESSION["tel"]=$user["tel"];
                $_SESSION["type"]="company";
                return true;
            } else{
                return false;
            }
        }
        else{
            return false;
        }
        parent::disconnect();
    }

    function check_exist($email){
        $query="SELECT * FROM company WHERE email='$email'";
        $user=mysqli_query(parent::connect(),$query);
        parent::disconnect();
        if($user->num_rows>0){
            return true;
        }
        else{
            return false;
        }
        parent::disconnect();
    }

    function profile_data(){
        $data["name"] = $_SESSION["name"] ?? '';
        $data["bio"] = $_SESSION["bio"] ?? '';
        $data["address"] = $_SESSION["address"] ?? '';
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
    
    function edit($field,$value){
        $email=$_SESSION["email"];
        $query="UPDATE company SET $field='$value' WHERE email='$email'";
        mysqli_query(parent::connect(), $query);
        parent::disconnect();
    }

    function COM_Home(){
        $data["name"] = $_SESSION["name"] ?? '';
        $data["logo"] = $_SESSION["logo"] ?? '';
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function sign_out(){
        parent::disconnect();
        session_destroy();
    }

}
?>