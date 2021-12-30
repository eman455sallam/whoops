
const postsDiv=document.querySelector('#allUserPosts');
const request=new XMLHttpRequest();
const url='http://localhost/blog/api/all_posts_by_user_id.php?id=1';
request.open('GET',url ,true);

request.onload=function(){

    if(this.status >=200 && this.status<300){
        const allPosts=JSON.parse( this.responseText) ;
        console.log(allPosts);

        let cartoona=`<ul>`;

        for(post of allPosts){
            cartoona +=` 
            <tr>
            <td>${post.title}</td>
            <td>${post.body}</td>
            <td>
                            <a href="show-post.html" class="btn btn-sm btn-primary">Show</a>
                            <a href="edit-post.php" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="delete-post.php" class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete post?')">Delete</a>
                        </td>
            </tr>
            `;
        }
        cartoona +=`</ul>`;
    
        postsDiv.innerHTML += cartoona;
    
    }else{
        alert("error occurd");
        
    }
    
}


   
request.send();
