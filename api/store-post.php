<?php

$conn=mysqli_connect("localhost","root","","whoops");
header('Content-Type: application/json');


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title= isset($_POST['title']) ?  trim(htmlspecialchars($_POST['title'])) : "";
    $body=isset($_POST['body'])  ? trim(htmlspecialchars($_POST['body'])) : "";
     
    $errors=[];
    //validation
    if(empty($title)){
        $errors=['title is required'];
    }elseif(! is_string($title)){
        $errors[]='title must be string';
    }elseif(strlen($title) > 255){
        $errors[]='title must be <= 255';
    }

    if(empty($body)){
        $errors[]='body is required';
    }elseif(! is_string($body)){
        $errors[]='body must be string';
    }

    //insert
    
   if(empty($errors)){
    $query="INSERT INTO posts (title,body, user_id) VALUES ('$title','$body',1)";
    $result= mysqli_query($conn,$query);

    if($result){
        echo json_encode("post added successfuly"); 
    }else{
        http_response_code(500);

        $message="faild to store post";
        echo $message;
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
