<?php

$conn=mysqli_connect("localhost","root","","whoops");
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$full_name = $_POST['full_name'];
$email 	  = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$password=password_hash($password,PASSWORD_BCRYPT);
$password2=password_hash($password2,PASSWORD_BCRYPT);

$errors=[];
  if(empty($full_name))
   {
	$error[] = "FullName is required";
   }else if(empty($email))
   {
	$error []= "email is required";
    }else if(empty($password))
    {
	$error[] = "password is required";
    }
    else if(empty($confirmPassword))
    {
	$error []= " password is required";
    }
  else{
	
	$alreadyExistVal = mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = $email");
	if(mysqli_num_rows($alreadyExistVal) == 0)
	{
      if($password === $password2) {

	    $insertQry = "INSERT INTO `users`(`full_name`, `email`,  `password` ) 
	    VALUES ('$full_name','$email','$password')";
	
	     $qry = mysqli_query($conn, $insertQry);
	
	     if($qry)
	       {
              echo json_encode(" Register successfuly"); 

		
	        }else{
				echo json_encode(" Register failed");
			}
	   }else{
		echo json_encode(" password are not matching");
	   }
    }else{
		echo json_encode(" already exist "); 
    }	
	}	
}else{
    http_response_code(405);

    $message="method not allowed";
    echo json_encode($message)  ;
}

?>