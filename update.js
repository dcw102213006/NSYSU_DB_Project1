$(document).ready(function (e){
    
     $("#edit_btn").on('click',(function(e){
        e.preventDefault();//阻止表單跳頁丟值
        
        $("#show_edit_modal").click();
    
    }));  
});
function edit_obj(edit_id){
    this.edit_id=edit_id;
    
}
function edit_request(){
    
  
    
     $.ajax({
        url: "update_obj.php",   //傳值到object_delete.php做SQL運算
        type: "POST",
        dataType:  "json",
        contentType: false,
        cache: false,
        processData:false,
        data:{"obj_dec":$("#obj_dec").val() ,"obj_name":$("#obj_name").val() ,"oid":edit_id},
        success: function(data){
            
            
            
           
        },
        error: function(data){
            
        } 	        
            
    });    
}