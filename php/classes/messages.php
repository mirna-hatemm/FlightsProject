<?php
include_once("connection.php");

session_start();

class messages extends connection{
    function addMessage($messContent,$ComEmail)
    {
        $UserEmail=$_SESSION["email"];
        $query="INSERT INTO message (useremail,content,company_email)
        VALUES ('$UserEmail','$messContent','$ComEmail')";
        mysqli_query(parent::connect(),$query);
        parent::disconnect();
    }
    function DisplayMessages()
    {
        $query = "SELECT * FROM message";
        $messagesResult = mysqli_query(parent::connect(), $query);
        $messages = [];
        while ($row = mysqli_fetch_assoc($messagesResult)) {
        $messages[] = $row;
        }
        $data["messages"] = $messages;
        header('Content-Type: application/json');
        echo json_encode($data);
        parent::disconnect();;
    }
}
?>