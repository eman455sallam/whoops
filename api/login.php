<?php
 header('Access-Control-Allow-Origin: *'); 
$conn=mysqli_connect("localhost","root","","whoops");
header('Content-Type: application/json');



if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors=[];
    if (empty($email)) {
        $errors[]="email is required";
    }else if (empty($password)){
    $errors[]="Password is required";
    }else{
        $query = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
		$result=mysqli_query($conn,$query);

        if (mysqli_num_rows($run_query) > 0) 
        {
			$row = mysqli_fetch_assoc($run_query);
            $dataJson=json_encode($row);
            
            
            echo $dataJson;
        }else{
            http_response_code(404);
            $message="user not found";
            echo $message;
        }
    }



}else{
    http_response_code(405);

    
    $message="method not allowed";
    echo $message;
}



?>