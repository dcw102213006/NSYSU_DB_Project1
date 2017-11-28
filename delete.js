$(document).ready(function (e){
    
     $("#delete_btn").on('click',(function(e){
        e.preventDefault();//阻止表單跳頁丟值
        
        $("#show_delete_modal").click();//跳出對話視窗詢問是否刪除
    
    }));  
});
function delete_obj(delete_id){
    this.delete_id=delete_id;
}
function delete_quest(){
    
    
    
    $.ajax({
        url: "object_delete.php?oid="+ delete_id,   //傳值到object_delete.php做SQL運算
        type: "GET",
        dataType:  "json",
        
        success: function(data){
            //alert(data);
            
            setTimeout(function(){ $("#delete_suc").click(); }, 2000);
            $("#close").click();
            $("#gallery"+delete_id).remove();
        },
        error: function(){
        } 	        
            
    });  
}