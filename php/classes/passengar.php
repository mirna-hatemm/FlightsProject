<?php
include("connection.php");

session_start();

class passenger extends connection{

    function signup($name, $email, $password, $tel) {
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO passenger (name, email, password, tel) VALUES ('$name', '$email', '$hashedPass', '$tel')";
        mysqli_query(parent::connect(), $query);
        parent::disconnect();
    }

    function complete_data($passport,$passport_photo,$passenger_photo,$account){
        $email=$_SESSION["email"];
        $query = "UPDATE passenger SET passport_num='$passport', passport_photo='$passport_photo', photo='$passenger_photo', account='$account' WHERE email = '$email'";
        mysqli_query(parent::connect(),$query);
        parent::disconnect();
    }

    function sign_in($email, $password){
        $query = "SELECT * FROM passenger WHERE email='$email'";
        $result = mysqli_query(parent::connect(), $query);
        
        if ($result->num_rows > 0) {
            session_start();
            $user=mysqli_fetch_assoc($result);
            if (password_verify($password, $user["password"])) {
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $user["name"];
                $_SESSION["password"] = $user["password"];
                $_SESSION["account"] = $user["account"];
                $_SESSION["tel"] = $user["tel"];
                $_SESSION["photo"] = $user["photo"];
                $_SESSION["passport_photo"] = $user["passport_photo"];
                $_SESSION["passport_num"] = $user["passport_num"];
                $_SESSION["type"] = "passenger";
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function check_exist($email){
        $query="SELECT * FROM passenger WHERE email='$email'";
        $user=mysqli_query(parent::connect(),$query);
        if($user->num_rows>0){
            return true;
        }
        else{
            return false;
        }
        parent::disconnect();
    }
    function profile_data(){
        $email=$_SESSION["email"];
        $query="SELECT * FROM passenger WHERE email='$email'";
        $user=mysqli_query(parent::return_connection(),$query);
        $row=mysqli_fetch_assoc($user);
        $array[0]=$row["name"];
        $array[1]= $user["password"];
        $array[2]= $user["address"];
        $array[3]= $user["tel"];
        $array[4]= $user["account"];
        return $array; 
    }
    
    function PASS_Home(){
        $data["name"] = $_SESSION["name"] ?? '';
        $data["email"] = $_SESSION["email"] ?? '';
        $data["tel"] = $_SESSION["tel"] ?? '';
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    function edit($name,$email,$tel){
        $_SESSION["email"]=$email;
        $query = "UPDATE passenger SET name='$name', email='$email', tel='$tel' WHERE email = '$email'";
        mysqli_query(parent::connect(),$query);
        parent::disconnect();
    }
    
}
?>