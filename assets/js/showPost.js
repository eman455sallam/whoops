

const postsDiv=document.querySelector('#showById');
const request=new XMLHttpRequest();
const url='http://localhost/blog/api/show-post.php?id=2';
request.open('GET',url ,true);

request.onload=function(){

    if(this.status >=200 && this.status<300){
        const allPosts=JSON.parse( this.responseText) ;
        console.log(allPosts);

        let cartoona=`<ul>`;

        for(post of allPosts){
            cartoona +=`
            <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div >
                    <h3>${post.title}}</h3>
                </div>
                <div>
                    <a href="profile.html" class="text-decoration-none">Back</a>
                </div>
            </div>
            <div>
                post body here
            </div>
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
