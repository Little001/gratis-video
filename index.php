<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	$loader = new Twig_Loader_Filesystem('Resources/views');
	$twig = new Twig_Environment($loader);
	
    
    
    
    // $servername = "localhost";
	// $username = "root";
	// $password = "";
	// $dbname = "serials";
	
	// // Create connection
	// $conn = new mysqli($servername, $username, $password, $dbname);
	
	// // Check connection
	// if ($conn->connect_error) {
	//     die("Connection failed: " . $conn->connect_error);
	// 	//echo "<script>console.log('Connected to DB failed!');</script>";
	// } 
    
    // $ser = array();
    // // $sql = "SELECT * FROM serials ORDER BY visited DESC";
	// // $result = $conn->query($sql);  
    // // if ($result->num_rows > 0){
    // //     while($row = $result->fetch_assoc()) {
    // //         array_push($ser, $row["name"]);
    // //     }
    // // } 
    echo $twig->render('header.html');
    echo $twig->render('index.html');
    echo $twig->render('footer.html');
?>