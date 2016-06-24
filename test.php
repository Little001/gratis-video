<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	$loader = new Twig_Loader_Filesystem('Resources/views');
	$twig = new Twig_Environment($loader);
	

    
    $ser = array();
    $sql = "SELECT * FROM serials ORDER BY visited DESC";
	$result = $conn->query($sql);  
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            array_push($ser, $row["name"]);
        }
    } 
    
    echo $twig->render('header.html');
    echo $twig->render('footer.html');
    
?>