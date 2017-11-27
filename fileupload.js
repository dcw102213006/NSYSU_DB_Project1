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
			
            if(data.uploadOk)Po();//call 發文系統 //插入文章到資料庫
		},
        error: function(){} 	        
        
		});
    }));
	
	function Po(){
	//ajax Post戳Insert.php
	$.ajax({
        url: "Insert.php",
        type: "POST",
        data:{"obj_dec":$("#obj_dec").val() ,"obj_name":$("#obj_name").val() ,"img_title":img_title,"obj_category":$("#obj_category").val()},
        
        success: function(data){
			alert(data);
			$("#obj_dec").val('');
			$("#obj_name").val('');
            $("#fileToUpload").val('');
			$("#modal_fo").hide();
		
			$("#img_area").hide();
            $("#mes").show();
            $("#Po_cancel_btn").click();
		},
        error: function(){
			
		} 	        
        
	});  
	}
});
