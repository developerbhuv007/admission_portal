
$(document).ready(function(){
	
	  
	  $('#search_q').live('keyup',function(e){
		 //alert("hello");
		 if(e.keyCode==40 || e.keyCode==38){

		 }else{
		  var str=$(this).val();
		 suggestions(str);
		 }	

		 if(e.keyCode==13){
		 	var value=$(this).val().split("").reverse().join("").substring(0,10);
		 	var link=value.split("").reverse().join("");
		 	window.location.href="/fetadmissions/view_details/"+link;
		 }	
		
	  })

	  
		
		 	/* switch (e.keyCode) {
        case 40:
		    //alert("working");
            //$('li:not(:last-child).selected').removeClass('selected').next().addClass('selected');
			$('li:first-child').addClass('selected');
            break;
        case 38:
            $('li:not(:first-child).selected').removeClass('selected').prev().addClass('selected');
            break;
          }
	  })*/
	
	 
   });
   
   function suggestions(sug){
	   //alert(sug);
	   $.ajax({
            url: "/fetadmissions/ajax_get_sugs/suggestions="+sug,
            type: "POST",
            dataType: "json",
            beforeSend: function(xhr) {
				
                     
            }
        }).done(function(data) {
			  
                var str='';
				
			$.each(data,function(i,v)
			{
				
			//alert(v.name);
			       str+='<option>'+v.name+'&nbsp&nbsp&nbsp&nbsp'+v.candidateID+'</option>';
						});
						
				 //str+='</ul>';
				if(str==''){
					 str='<div style="height:27px; line-height:27px; border-bottom:1px solid silver; text-indent:5px;margin-top:10px;color:black;">No records found!!</div>';
					 $('#drop_search').html(str);
				}
				else
				{

			    $('#drop_search').html(str);
			}
			
          
        }).fail(function() {
            alert('Something Went Wrong ! Please Try Again .. ');
        }).always(function() {
            ele.removeAttr('data-processing');
        });
   }
  
