<?php
 header('Access-Control-Allow-Origin: *'); 
$conn=mysqli_connect("localhost","root","","whoops");
header('Content-Type: application/json');
$user_id=$_GET['id'];
if($_SERVER['REQUEST_METHOD'] == 'GET'){
     
    
    if(isset($_GET['id']) and $_GET['id'] !=''){
       
    $query="SELECT * FROM POSTS WHERE user_id=$user_id";
    $result=mysqli_query($conn ,$query);
    $posts=mysqli_fetch_all($result ,MYSQLI_ASSOC);
    $postsJson=json_encode($posts);
    
    
    echo $postsJson;
    }else{
        http_response_code(404);


        $message="not found";
        echo $message;
    }


}else{
    http_response_code(405);

    
    $message="method not allowed";
    echo $message;
}