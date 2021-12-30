<?php

$conn=mysqli_connect("localhost","root","","whoops");
header('Content-Type: application/json');


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$full_name = $_POST['full_name'];
	$email 	  = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	 

	 $errors=[];
	   if(empty($full_name))
	    {
	 	$errors[] = "FullName is required";
	    }else if(empty($email))
	    {
	 	$errors []= "email is required";
	     }else if(empty($password))
	     {
	 	$errors[] = "password is required";
	     }
	     else if(empty($Password2))
	     {
	 	  $errors []= "confirm Password is required";
	     }else if(empty($errors)) {

			$alreadyExistVal = mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = $email");
				if(mysqli_num_rows($alreadyExistVal) == 0)
				{
			      if($password === $password2) 
				  {
					$password=password_hash($password,PASSWORD_BCRYPT);
			
				    $insertQry = "INSERT INTO `users`(`full_name`, `email`,  `password` ) 
				    VALUES ('$full_name','$email','$password')";
				
				     $query = mysqli_query($conn, $insertQry);

					 if($query)
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


		 }else{
			//display errors
			$errorsJson=json_encode($errors);
			 echo $errorsJson;
	
		}
	
	
				
}else{
    http_response_code(405);

    $message="method not allowed";
    echo json_encode($message)  ;
}







?>