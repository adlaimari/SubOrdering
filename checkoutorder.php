<?php 

include("dbcon.php");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phoneno = $_POST['phoneno'];
$orderdetails = $_POST['orderdetails'];
$YOUR_API_KEY = 'qpRo0_clqEeuPhdC1G5W8qRVy0QbaUAS2LsW';
$project_id = 'PJ3b4343612254ed6d';

$sql = "INSERT INTO orders(lastname, firstname, phoneno, orderdetails) VALUES ('$lastname', '$firstname', '$phoneno', '$orderdetails')";
if(mysqli_query($connect, $sql))
{
			echo "<script>alert('Successful Order! A summary of your order will be sent via SMS')</script>";			
require_once 'telerivet.php';
$text = "Thank you " . $firstname . " " . $lastname ." for choosing Chip N Subs! Your Order is " . $orderdetails;
$tr = new Telerivet_API($YOUR_API_KEY);
$project = $tr->initProjectById($project_id);

$sent_msg = $project->sendMessage(array(
    'content' => $text, 
    'to_number' => $phoneno
));

			echo "<script>window.location='index.php?success=1'</script>";
}else{
	echo "Error:" . $sql . "" . mysqli_error($connect);
}



?>