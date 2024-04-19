<?php
if (!class_exists('connection')) {
    class connection {
        var $server="localhost";
        var $username="root";
        var $password="12345678";
        var $db_name="flight_booking";
        var $con;

        function connect(){
            $this->con=mysqli_connect($this->server,$this->username,$this->password,$this->db_name);
            return $this->con;
        }

        function disconnect(){
            if($this->con){
                mysqli_close($this->con);
            }
        }

        function return_connection(){
            return $this->con;
        }
    }
}
?>
