<?php 
    include 'dbConnection.php';
	require_once __DIR__ . '/vendor/autoload.php';
	$loader = new Twig_Loader_Filesystem('Resources/views');
	$twig = new Twig_Environment($loader);
	

    function getName(){
        $ser = array();
        global $conn;
        $sql = "SELECT * FROM serials_name";
        $result = $conn->query($sql);  
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                array_push($ser, $row["name"]);
            }
        } 
        return $ser;
    }
    $test = getName();
    
    echo $twig->render('header.html');
    echo $twig->render('index.html', ['serials' =>  $test]);
    echo $twig->render('footer.html');
?>