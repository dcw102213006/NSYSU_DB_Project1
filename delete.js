$(document).ready(function (e){
    
    $("#delete_btn").on('click',(function(e){
        e.preventDefault();//阻止表單跳頁丟值

        $.ajax({
        url: "object_delete.php?oid="+ delete_id,   //傳值到object_delete.php做SQL運算
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
function delete_obj(delete_id){
    this.delete_id=delete_id;
}