$(document).ready(function (e){
    
     $("#p_edit_btn").on('click',(function(e){
        e.preventDefault();//阻止表單跳頁丟值
        
        $("#show_edit_modal").click();
    
    }));  
});
function edit_profile(edit_id,editor){
    this.edit_id=edit_id;
    this.editor=editor;
}
function p_edit_request(){
    
  
   
     $.ajax({
        url: "update_profile.php",
        type: "POST",
        
        data:{"username":$("#username").val() ,"email":$("#email").val(),"profile":$("#profile").val() ,"uid":edit_id},
       
        
        success: function(data){//after updating 
            //alert(data);
            
            $('#desc-text').html(editor+'<hr><span style="bold">帳號名稱:</span>'+$("#username").val()+'<br><br>Email:'+$("#email").val()+'</br><br>個人簡介:<br>'+$("#profile").val() );
            $('#p_edit_suc').click();
            
            
           
        },
        error: function(data){
            
        } 	        
            
    });    
}