<?php
if (! empty($_POST["send"])) {
$name = $_POST["name"]; // ok
$email = $_POST["email"];	//ok
$status = $_POST["radio-group"];   //fail
if(isset($_POST['guest']))
{
	$guestsnum = $_POST["guest"]; //ok
}
else{
	$guestsnum = 0;
}
if(isset($_POST['what']))
{
	$country = $_POST["what"]; //fail
}
else
{
	$country = "None";
}
$message = $_POST["messageto"];		//ok

// error_log("step 111", 0);


$conn = mysqli_connect("localhost", "root", "", "mysql") or die("Connection Error: " . mysqli_error($conn));
$stmt = $conn->prepare("INSERT INTO weddcontact (user_name, user_email, status, numofguests, country, message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss",$name, $email, $status, $guestsnum, $country, $message);

$stmt->execute();
$message = "Your contact information is saved successfully.";
$type = "success";
$stmt->close();
$conn->close();
}
?>