

const postsDiv=document.querySelector('#posts');
const request=new XMLHttpRequest();
const url='http://localhost/blog/api/all-posts.php';
request.open('GET',url ,true);

request.onload=function(){

    if(this.status >=200 && this.status<300){
        const allPosts=JSON.parse( this.responseText) ;
        console.log(allPosts);

        let cartoona=`<ul>`;

        for(post of allPosts){
            cartoona +=`
            <div class="col-sm-6">
                    <h3>${post.title}</h3>
                    <p>${post.title}</p>
                </div>
            `;
        }
        cartoona +=`</ul>`;
    
        postsDiv.innerHTML += cartoona;
    
    }else{
        alert("error occurd");
        
    }
    
}


   
request.send();
