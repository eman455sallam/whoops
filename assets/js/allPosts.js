let allPosts=[];

async   function getAllPosts(){
    let apiResponse= await fetch(`http://localhost/blog/api/all-posts.php`);
    allPosts= await apiResponse.json();
    console.log(allPosts);
}

getAllPosts();