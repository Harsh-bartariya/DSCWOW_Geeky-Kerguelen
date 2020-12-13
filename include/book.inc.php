<?php 
 //session_start();
 //include_once 'include/dbh.inc.php';


$pname=$_POST['pname'];
$view=$_POST['view'];
$class=$_POST['class'];
$vplace=$_POST['vplace'];
$adult=$_POST['adult'];
$child=$_POST['child'];


$dbServername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbName = "loginsystem";

//$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);


//$sql= "INSERT INTO users( user_first, user_last, user_email, user_pwd) VALUES('$first','$last','$email','$password ')";

//mysqli_query($conn, $sql);
$conn = new mysqli('localhost','root','','loginsystem');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into visit(name, veh, fair, place, adults, childs) values( '$pname', '$view', '$class', '$vplace', '$adult','$child')");
		//$stmt->bind_param("sssssi", $first, $last,$email, $password);
		$execval=$stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

header("Location: ../booked.html?booked=success");

?>