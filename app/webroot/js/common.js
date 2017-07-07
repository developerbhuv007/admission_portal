
$(document).ready(function(){
	/*$('#addMemberSubmit').click(function(){
    console.log("I am Clicked");
    $('.addMemberFormDiv .errorDiv span.ErrMsgSpan').hide();
    var MemberName;
    var MemberEmail;
    var MemberDepartment;
    var MemberContact;
    MemberName = $('#nameText').val();
    MemberEmail = $('#emailText').val();
    MemberDepartment = $('#departmentText').val();
    MemberContact = $('#contactText').val();
    console.log(MemberName, MemberEmail, MemberDepartment, MemberContact);
    var unfilter = /^[a-zA-Z\s]+$/;
    var status; 
    if (!unfilter.test(MemberName)) {
      $('span#AddMemberName').show();
        status = 1;
    }          
    var atposition=MemberEmail.indexOf("@");  
    var dotposition=MemberEmail.lastIndexOf(".");
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=MemberEmail.length){  
      $('span#AddMemberEmail').show(); 
      status = 1;
    }
    if(MemberDepartment == ""){
      $('span#AddMemberDepartment').show(); 
      status = 1;
    }
    if(status == 1){
      return false;
    }
    else{
      return true;
    }
    var MemberData = {
      name:MemberName,
      email:MemberEmail,
      department:MemberDepartment,
      contact:MemberContact
    };
    $.ajax({
      url: "/FetProfiler/ajax_register_staff",
        type: 'POST',
        dataType: 'json',
        data: MemberData,
      beforeSend: function(xhr){
      	$('#addMemberSubmit span.loadingImg').css({'display':'block'});
        console.log("Loading...");
      },
      success: function(result){
      	$('#addMemberSubmit span.loadingImg').css({'display':'none'});
      	$('#myModal').css({'display':'none'});
        //console.log(result);
        console.log(result.msg);        
      }
    });
  });*/
	
	  $('#search_q').live('keyup',function(e){
		 
		 if(e.keyCode==40 || e.keyCode==38){

		 }else{
		  var str=$(this).val();
		  suggestions(str);
		 }	

		 if(e.keyCode==13){
		 	var value=$(this).val().split("").reverse().join("").substring(0,10);
		 	var link=value.split("").reverse().join("");
		 	window.location.href="/fet-profiler/students/"+link;
		 }	
		
	  })
	  $('#RegistrationModelBtn').click(function(){
	  	$('#nameText').val("");
	  	$('#emailText').val("");
	  	$('#departmentText').val("");
	  	$('#contactText').val("");
	  });
	  $('#addMemberSubmit').click(function(){
	    $('.addMemberFormDiv .errorDiv span.ErrMsgSpan').hide();
	    var MemberName;
	    var MemberEmail;
	    var MemberDepartment;
	    var MemberContact;
	    MemberName = $('#nameText').val();
	    MemberEmail = $('#emailText').val();
	    MemberDepartment = $('#departmentText').val();
	    MemberContact = $('#contactText').val();
	    
	    var unfilter = /^[a-zA-Z\s]+$/;
	    var status; 
	    if (!unfilter.test(MemberName)) {
	      $('span#AddMemberName').show();
	        status = 1;
	    }          
	    var atposition=MemberEmail.indexOf("@");  
	    var dotposition=MemberEmail.lastIndexOf(".");
	    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=MemberEmail.length){  
	      $('span#AddMemberEmail').show(); 
	      status = 1;
	    }
	    if(MemberDepartment == ""){
	      $('span#AddMemberDepartment').show(); 
	      status = 1;
	    }
	    if(status == 1){
	      return false;
	    }
	    var MemberData = {
	      name:MemberName,
	      email:MemberEmail,
	      department:MemberDepartment,
	      contact:MemberContact
	    };
	   
	    $.ajax({
	      	url: "/FetProfiler/ajax_register_staff",
	        type: 'POST',
	        dataType: 'json',
	        data: MemberData,
	      beforeSend: function(xhr){
	        $('#addMemberSubmit span.loadingImg').css({'display':'block','float':'right'});
        	console.log("Loading...");
	      },
	      success: function(result){
	      	$('#addMemberSubmit span.loadingImg').css({'display':'none'});
	      	//$('#myModal').css({'display':'none'});
	        console.log(result);
	        var msg = result.msg;
	    	var status; 
	        if(msg == "Email id already exists")
	        {	        	
	        	
	        	$('span#AddMemberEmail').show().html("This Email id already exists");
			    status = 1;
	        }
	        if(status == 1){
		      return false;
		    }  
		    $("#addMemberClose").click();   
	      }
	    });    
	  });

	  $("#updateyear").click(function(){

	  		$.ajax({
	      	url: "/FetProfiler/ajax_update_year",
	        dataType: 'json',
	      beforeSend: function(xhr){
	        console.log("Loading...");
	      },
	      success: function(result){
	      	   
	      }
	    });	
	  });
   });
   
   function suggestions(sug){
	   
	   $.ajax({
            url: "/FetProfiler/ajax_get_sugs/suggestions="+sug,
            type: "POST",
            dataType: "json",
            beforeSend: function(xhr) {
			         
            }
        }).done(function(data) {
			  
            var str='';
			$.each(data,function(i,v){
				str+='<option>'+v.name+'&nbsp&nbsp&nbsp&nbsp'+v.candidateID+'</option>';
			});
						
			if(str==''){
				 str='<div style="height:27px; line-height:27px; border-bottom:1px solid silver; text-indent:5px;margin-top:10px;color:black;">No records found!!</div>';
				 $('#drop_search').html(str);
			}else{
		    $('#drop_search').html(str);
			}
          
        }).fail(function() {
            alert('Something Went Wrong ! Please Try Again .. ');
        }).always(function() {
            ele.removeAttr('data-processing');
        });
   }
  
