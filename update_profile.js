$(document).ready(function (e){
    
     $("#p_edit_btn").on('click',(function(e){
        e.preventDefault();//阻止表單跳頁丟值
        
        $("#show_profile_modal").click();
       
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
        
        data:{"username":$("#username").val() ,"email":$("#email").val(),"profile":$("#profile").val() },
       
        
        success: function(data){//after updating 
            //alert(data);
            
            $('#p_name').html($("#username").val());
            $('#p_mail').html('Email:'+$("#email").val());
            $('#p_profile').html('Profile:'+$("#profile").val());
            $('#p_edit_suc').click();
            
            
           
        },
        error: function(data){
            
        } 	        
            
    });    
}