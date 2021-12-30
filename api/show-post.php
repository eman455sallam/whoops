<?php

$conn=mysqli_connect("localhost","root","","whoops");
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
 
    if(isset($_GET['id']) and $_GET['id'] !=''){
       
        $id=$_GET['id'];
        $query="SELECT * FROM POSTS WHERE id=$id";
        $result=mysqli_query($conn ,$query);

        if(mysqli_num_rows($result) != 0){
            $posts=mysqli_fetch_assoc($result );
            $postJson=json_encode($posts);
            
            
            echo $postJson;
        }else{
            http_response_code(404);

    
    $message="not found";
    echo $message;
        }
    } 
        
  
}else{
    http_response_code(405);

    
    $message="method not allowed";
    echo $message;
}

