<?php
class connecting{

    private $server = "localhost";
    private $user = "username";
    private $password = "******";
    private $conn;


    //constructor
    public __constructor(){
        $this->connect();
    }
    //creates the db connection
    private function connect(){
        $this->conn = new mysqli($this->server, $this->user, $this->password);
    }
    
    /*
        logging  function will be used to log into the website
        @parameters username and password
    */
    function logging($uname, $password){
        $query = $this->conn->prepare("SELECT fname lname FROM users where pwrd = (SELECT ID FROM USERS WHERE ID = $uname OR $var=email)")
    }
    


}