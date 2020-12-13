<?php 
 //session_start();
 //include_once 'include/dbh.inc.php';


$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$password=$_POST['password'];

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
		$stmt = $conn->prepare("insert into users(user_first, user_last, user_email, user_pwd) values( '$first', '$last','$email', '$password')");
		//$stmt->bind_param("sssssi", $first, $last,$email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
session_start();
header("Location: ../end.html?signup=success");

?>