$(document).ready(function (e){
    
	
	//show image on web
	$("#fileToUpload").change(function(){
	  
      readImage( this );
	  $("#img_area").show();
    });
    //讀取上傳的圖片,顯示在網頁上
	
    function readImage(input) {
        if ( input.files && input.files[0] ) {
            var FR= new FileReader();
            FR.onload = function(e) {
            //e.target.result = base64 format picture
			
			    img_title=document.getElementById("fileToUpload").files[0].name; //取得檔名
				
				$("#next_btn").show();
				
                $('#img').attr( "src", e.target.result );
		        $('#img').attr( "width", '100px' );
		        $('#img').attr( "height", '100px' );
		    
            }; 
       	    $('#img').hover(function(){
                $(this).css("width", "150px");
    		    $(this).css("height", "150px");
            },
		    function(){
                $(this).css("width", "100px");
		        $(this).css("height", "100px");
            });	
            FR.readAsDataURL( input.files[0] );
        }
    }
	
	//使用者點擊圖片,彈出modal


    //show img modal
	// Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('img');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
	
	
	//upload img 
	$("#uploadForm").on('submit',(function(e){
        e.preventDefault();

        $.ajax({
        url: "upload.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
			data=JSON.parse(data);
            alert(data.upload_status);//輸出上傳情形
			img_title=data.img_title;//取得上傳到站上的圖片的檔案名稱
			
            if(data.uploadOk){
                Po();//call 發文系統 //插入文章到資料庫
            }
		},
        error: function(){} 	        
        
		});
    }));
	
	function Po(){
	//ajax Post戳Insert.php
    var obj_name=$("#obj_name").val();
    var obj_dec=$("#obj_dec").val();
	$.ajax({
        url: "Insert.php",
        type: "POST",
        data:{"obj_dec":$("#obj_dec").val() ,"obj_name":$("#obj_name").val() ,"img_title":img_title,"obj_category":$("#obj_category").val()},
        
        success: function(data){
			alert(data);
            var content=`<div class="gallery"  id=gallery`+data.oid+`>
                              
                                <img src=`+img_title+`  id=`+data.index+` ;  width: 1000px; height: 741px; >
                             
                              <div class="desc"><span class="glyphicon glyphicon-heart-empty" 
                              style="font-size:40px ;cursor:pointer");"></span></div>
                            </div>`;
                            
            $('#wall').append(content);//將文章輸出至index.php
            $('.gallery img').click(function(){
                
                modal.style.display = "block";
                $('#img01').attr("src",this.src);
				
				$('#img_info').css("height",$('img#img01.modal-content').prop("height"));//文章內容高度等於圖片呈現的高度
				$('#obj_cont').html('<hr><span style="bold">物品名稱:</span>'+obj_name+'</br><br>內容:<br>'+obj_dec  );
                var delete_id=data.oid;
                
                delete_obj(delete_id);
                
                var edit_id=data.oid;
                
                edit_obj(edit_id,"");
                
                //captionText.innerHTML = this.alt;
            }); 
			$("#obj_dec").val('');
			$("#obj_name").val('');
            $("#fileToUpload").val('');
			$("#modal_fo").hide();
		
			$("#img_area").hide();
            $("#mes").show();
            $("#Po_cancel_btn").click();//將上傳系統的modal畫面關掉
		},
        error: function(){
			
		} 	        
        
	});  
	}
});
