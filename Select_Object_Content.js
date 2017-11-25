$(function(){
    var type=location.search;//取得HTTP Get: ?type=
    
    var locHref = location.href;
    
    if(locHref=="http://localhost/Project/index.php")type="?type=1";//預設為1;
    
     $.ajax({
        url: "Select.php"+type,
        type: "GET",
       
        
        success: function(data){
            data=JSON.parse(data);
            for(var i=0;i<data.oid.length;i++){
                var content=`<div class="gallery">
                              
                                <img src=`+data.opic[i]+` width: 1000px; height: 741px; >
                             
                              <div class="desc"><span class="glyphicon glyphicon-heart-empty" style="font-size:40px"></span></div>
                            </div>`;
               
               
               
               $('#wall').append(content);//將文章輸出至index.php
            }   
            
            //使用者點擊圖片,彈出modal


            //show img modal
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById('img');
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            $('.gallery img').click(function(){
                
                modal.style.display = "block";
                $('#img01').attr("src",this.src);
                
                captionText.innerHTML = this.alt;
            });


            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() { 
                modal.style.display = "none";
            }            

            },
            error: function(){

            } 	        

            }); 
    

	    
});