<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	$loader = new Twig_Loader_Filesystem('Resources/views');
	$twig = new Twig_Environment($loader);
	require 'Admin/serial.php';
    
    
    
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
    
    $serials = array();

    $sql = "SELECT * FROM serials_name";
	$result = $conn->query($sql);  
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            array_push($serials, new serial($row["name"]));
        }
    } 
    echo $twig->render('add-serial.html', ['serials' =>  $serials]);
?>