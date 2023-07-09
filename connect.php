<?php
	$Name = $_POST['Name'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$Plang = $_POST['Plang'];
	$Choice = $_POST['Choice'];
	$Note = $_POST['Note'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','OnlineSurvey');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into survey(name,email,agee, Plang, Choice, Note) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssisis", $Name, $email, $age, $Plang, $Choice, $Note);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>