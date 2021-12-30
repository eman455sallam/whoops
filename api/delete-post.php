<?php


$conn=mysqli_connect("localhost","root","","whoops");
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id=$_POST['id'];

    $query="DELETE FROM  posts  WHERE id='$id'";
    $result= mysqli_query($conn,$query);

    if($result){
        echo json_encode("post deleted successfuly"); 
    }else{
        http_response_code(500);

        $message="faild to delete  post";
        echo $message;
    }
  


}else{
    http_response_code(405);

    $message="method not allowed";
    echo json_encode($message)  ;
}