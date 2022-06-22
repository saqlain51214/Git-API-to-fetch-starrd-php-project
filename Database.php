<?php
class Database {
    
    // DB Params
    private $host = "localhost";
    private $db_name = "git";
    private $username = "root";
    private $password ="";
    private $conn;
    
    
    
    //DB Connect
    public function connect() {
        
        $this->conn = null;
       
        $this->conn = new mysqli($this->host, $this->username, $this->password,  $this->db_name);
        if($this->conn->connect_error){
            echo "Fail" . $this->conn->connect_error;
                       
        }
        //echo "Connected";
        
       return $this->conn;
       
    }

}
    
    //$dbh0 = new Database();
   //$dbh= $dbh0->connect();
   