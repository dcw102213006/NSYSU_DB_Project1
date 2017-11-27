$(document).ready(function (e){
    
     $("#edit_btn").on('click',(function(e){
        e.preventDefault();//阻止表單跳頁丟值
        
        $("#show_edit_modal").click();
    
    }));  
});
function edit_obj(edit_id,editor){
    this.edit_id=edit_id;
    this.editor=editor;
}
function edit_request(){
    
  
     
     $.ajax({
        url: "update_obj.php",
        type: "POST",
        
        data:{"obj_dec":$("#obj_dec_edit").val() ,"obj_name":$("#obj_name_edit").val() ,"oid":edit_id},
       
        
        success: function(data){//after updating 
            //alert(data);
            
            $('#obj_cont').html(editor+'<hr><span style="bold">物品名稱:</span>'+$("#obj_name_edit").val()+'</br><br>內容:<br>'+$("#obj_dec_edit").val() );
            $('#edit_suc').click();
            
            
           
        },
        error: function(data){
            
        } 	        
            
    });    
}