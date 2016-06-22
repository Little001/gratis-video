<?php
    require 'epizode.php';


    class serial { 
        public $name; 
        public $visited = 0;
        public $epizodes;
        
        public function __construct ($name) {
            $this->name = $name;
            $this->epizodes = $this->getEpizodes($name);
        } 
        
        private function getEpizodes($name){ 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "serials";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                //echo "<script>console.log('Connected to DB failed!');</script>";
            } 
                    
            
            $epizodes = array();
            $sql = "SELECT * FROM serials WHERE serial_name='" . $name . "' ORDER BY epizode, serie";
            $result = $conn->query($sql);  
            if ($result){
                while($row = $result->fetch_assoc()) {
                    array_push($epizodes, new epizode($row["epizode_name"],$row["serie"], $row["epizode"], $row["path"], $row["visited"]));
                    $this->visited += $row["visited"];
                }
            }
            return $epizodes;  
            
        }
    } 
?>