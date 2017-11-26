$(document).ready(function (e){
$("#updateForm").on('submit',(function(e){
        
        e.preventDefault();//阻止表單跳頁丟值

        $.ajax({
        url: "update.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data.success){
                alert(data.success);
                document.getElementById('name').innerHTML=data.name;
                document.getElementById('mail').innerHTML=data.email;
                document.getElementById('pfile').innerHTML=data.profile;
            }
		},
        error: function(){
        } 	        
            
		});
    }));
});