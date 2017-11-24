$(document).ready(function (e){
$("#deleteForm").on('submit',(function(e){
        e.preventDefault();//阻止表單跳頁丟值

        $.ajax({
        url: "object_delete.php?src="+ $('#imgsrc').val(),   //傳值到object_delete.php做SQL運算
        type: "GET",
        dataType:  "json",
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            alert(data.delete_status);//輸出刪除情形
		},
        error: function(){
        } 	        
            
		});
    }));
});