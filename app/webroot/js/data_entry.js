
$(document).ready(function(){



	if($(".message").val()!=null){
		$(".message").hide(10);
		$('#MainContainer_show').fadeIn('slow');
		var message="Your admission Id is "+$(".message").text();
		var str="print admission slip &nbsp <a href='/fetadmissions/admission_slip/"+$(".message").text()+"' target='_blank'><button>Print Slip</button></a>";
		$('.id_message').html(message);
		$('.print_text_button').html(str);
	}

	$('#MainContainer_show span').click(function(){
		$('#MainContainer_show').fadeOut('slow');
	});

	var branch_array=['Computer Science & Engineering (CSE)','Electronics & Communication Engineering (ECE)','Mechanical Engineering (ME)','Electrical Engineering (EE)'];
	var branch_short=['CSE','ECE','ME','EE'];
	  $('#choice_1').change(function(){
		 
		  var str=$(this).val();
		  var branch='<option value="">None</option>';
		  for(var i=0;i<=3;i++){
			  if(branch_short[i]!=str)
			  branch+='<option value="'+branch_short[i]+'">'+branch_array[i]+'</option>';
		  }
		  $('#choice_2').html(branch);
	  })
	  
	  $('#choice_2').change(function(){
		
		  var str=$(this).val();
		  var choice1=$('#choice_1').val();
		  var branch='<option value="">None</option>';
		  for(var i=0;i<=3;i++){
			  if(branch_short[i]!=str && branch_short[i]!=choice1)
			  branch+='<option value="'+branch_short[i]+'">'+branch_array[i]+'</option>';
		  }
		  $('#choice_3').html(branch);
	  })
	  
	   $('#choice_3').change(function(){
		
		  var str=$(this).val();
		  var choice1=$('#choice_1').val();
		  var choice2=$('#choice_2').val();
		  var branch='<option value="">None</option>';
		  for(var i=0;i<=3;i++){
			  if(branch_short[i]!=str && branch_short[i]!=choice1 && branch_short[i]!=choice2)
			  branch+='<option value="'+branch_short[i]+'">'+branch_array[i]+'</option>';
		  }
		  $('#choice_4').html(branch);
	  })
	
  });
  
  