$(function(){
     $.ajax({
        url: "top.php",
        type: "POST",
       
        success: function(data){
            data=JSON.parse(data);
            	
            });


            
            error: function(){

            } 	        

            }); 
      

            
});
    


