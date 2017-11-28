$(function(){
    var type=location.search;//取得HTTP Get: ?type=
    
    var locHref = location.href;

    if(!type)type="?type=1";//預設為1,搜尋資料表object 欄位cid=1的所有物品文章;
    
     $.ajax({
        url: "Select.php"+type,
        type: "GET",
       
        
        success: function(data){
            data=JSON.parse(data);
            
            
            
            for(var i=0;i<data.oid.length;i++){
                
                var content=`<div class="gallery"  id=gallery`+data.oid[i]+`>
                              
                                <img src=`+data.opic[i]+`  id=`+i+` ;  width: 1000px; height: 741px; >
                             
                              <div class="desc"><span class="glyphicon glyphicon-heart-empty" id=`+data.otime[i]+`
                              style="font-size:40px ;cursor:pointer" onclick="likefunction(`+data.otime[i]+`,`+data.oid[i]+`,`+data.mid[i]+`);"></span></div>
                            </div>`;
               
               
               
               $('#wall').append(content);//將文章輸出至index.php
               //$('#img_info').append(`<div id="delete_btn" style="float:right;margin:10px" >...</div>`);
               
            } 
            test();
            this.data=data;
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
				
				$('#img_info').css("height",$('img#img01.modal-content').prop("height"));//文章內容高度等於圖片呈現的高度
				$('#obj_cont').html(data.mname[this.id]+'<hr><span style="bold">物品名稱:</span>'+data.oname[this.id]+'</br><br>內容:<br>'+data.odec[this.id]  );
                var delete_id=data.oid[this.id];
                
                delete_obj(delete_id);
                
                var edit_id=data.oid[this.id];
                
                edit_obj(edit_id,data.mname[this.id]);
                
                //captionText.innerHTML = this.alt;
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
      

function test(){
        $.ajax({
         url: "checklike.php"+type,
         type: "GET",
        success: function(da){
            dat=da;
            for(var i=0;i<dat.otimestamp.length;i++){
                var x=dat.otimestamp[i];
                document.getElementById(x).style.color="red";
         
            }   
        },
        error: function(){
            
        }   
                
    
        });    	    
    }
});

