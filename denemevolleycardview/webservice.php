<?php





if($_SERVER['REQUEST_METHOD']=='POST'){

	session_start();
	
	


$extra  = $_POST["txtkim"];
$id  = $_POST["id"];
	
	$_SESSION['extra'] = '$extra';
	$_SESSION['id'] = $id;
	
	$resulte["employeesextra"] = $_SESSION['id'];

		echo json_encode($resulte);
	


	
$servername = "silindi";
$username = "silindi";
$password = "silindi";
$dbname = "silindi";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




if($id != ""){


    $sql = "INSERT INTO  tablethree (name, twitid )
    VALUES ('$extra', '$id')" ;
    // use exec() because no results are returned
    $conn->exec($sql);
	

}
	

	
	 

    $statement = $conn->prepare("SELECT name FROM tablethree WHERE twitid ='.$id.'");

$statement->execute();
$array = $statement->fetchAll(PDO::FETCH_ASSOC);
//$json = json_encode($array);
				$result["employees"] = $array;

		echo json_encode($result);
	


	
   
	
		

    
        
        
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
	
	
?>
