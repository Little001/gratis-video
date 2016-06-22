<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	$loader = new Twig_Loader_Filesystem('Resources/views');
	$twig = new Twig_Environment($loader);
	
    
    
    
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "serials";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    
    
    
    /////////////////////////////
    $serial = "himym";
    
    $epizodes = array();
    for($i = 1; $i < 50; $i++){
        $sql = "SELECT * FROM " . $serial . " WHERE serie= " . $i;
        $result = $conn->query($sql);  
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                array_push($ser, $row["path"]);
            }
        }
        else{
            break;
        } 
    }
    
    
    
    echo $twig->render('index.html', ['serial' =>  $ser]);
?>