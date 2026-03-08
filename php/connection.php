<?php

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
    
    //getting the parameters for the query to be prepared
    public function get($var1, $var2, $var3, $table){
        $query = $this->conn->prepare("SELECT (feild1, feild2, feild3")
    }
    


}