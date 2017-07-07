$(document).ready(function(){

	if($(".message").val()!=null){
		$(".message").hide(10);
		$('#MainContainer_show').fadeIn('slow');
		var message="Payment Details Inserted Successfully";
		var str="print payment slip &nbsp <a href='/fetadmissions/admissionCumPaymentSlip/"+$(".message").text()+"' target='_blank'><button>Print Slip</button></a>";
		$('.id_message').html(message);
		$('.print_text_button').html(str);
	}

	$('#MainContainer_show span').click(function(){
		$('#MainContainer_show').fadeOut('slow');
	});

	var a=$("#no_ofdd").val();
			//alert(a);
			switch(a)
			{
				case '2':$('#DD_2').show();break;
				case '3':$('#DD_2').show();$('#DD_3').show();break;
				case '4':$('#DD_2').show();$('#DD_3').show();$('#DD_4').show();break;		
			}
	
	$('#slipno').keyup(function(e){
		//confirm('want to continue');
		
		if($(this).val().length==3)
		{
		
		window.location='/fetadmissions/payment/FET2015'+$(this).val(); 
		}
		else
		{
			
			$('#main_div').html('Please enter three digit number!!');
		}
		
	});
	
	$('#submit_pay').click(function(){
		
		var dd1='',dd2='',dd3='',dd4='',cash='';
		var status=true;
		if($("#cash").val()!=null){
			if(!($("#paymentCash").is(":checked"))){
              $("#paymentCash").prop("checked",true);
              $("#cash").removeAttr("disabled");
		      flag=1;
              //status=false;
			}
		}

		if($("#no_ofdd").val()!=null){
			if(!($("#nodd").is(":checked"))){
              $("#nodd").prop("checked",true);
              $(".DD_Payment").removeAttr("disabled");
              if($("#no_ofdd").val()==0){
                $("#no_ofdd").val('1')	
              }
		      ddAmt=1;
              //status=false;
			}
		}
		confirm("Please check again before final submit");
		//var college_fee=parseInt($('#paymentCollegefee').val());
		//alert(college_fee);
		//var hostel_fee=parseInt($('#paymentHostelfee').val());
		/*if($.isNumeric($('#cash').val()))
		     cash=parseInt($('#cash').val()); else parseInt('0');
		if($.isNumeric($('#ddamt_1').val()))
		     dd1=parseInt($('#ddamt_1').val()); else dd1=parseInt('0');
		if($.isNumeric($('#ddamt_2').val()))
		     dd2=parseInt($('#ddamt_2').val()); else dd2=parseInt('0');
		if($.isNumeric($('#ddamt_3').val()))
		     dd3=parseInt($('#ddamt_3').val()); else dd3=parseInt('0');
		if($.isNumeric($('#ddamt_4').val()))
		     dd4=parseInt($('#ddamt_4').val()); else dd4=parseInt('0');
		var dd_amount=dd1+dd2+dd3+dd4;
		//alert(dd_amount);
		var total=cash+dd_amount;
		if(total!=(college_fee+hostel_fee)){
			alert("!!!Data Not Inserted!!!   Submitted Amount is Not equal to the total Fee!!    Try again!!");
		}*/
		
		return status;
	})
	
	
		 $('#nodd').click(function(){
		 	if($('#no_ofdd').val()==null || $('#no_ofdd').val()==0)
			$('#no_ofdd').val('1');
		})
		$('#no_ofdd').keyup(function(){
			//alert($(this).val());
			var a=$(this).val();
			//alert(a);
			switch(a)
			{
				case '2':$('#DD_2').show();break;
				case '3':$('#DD_2').show();$('#DD_3').show();break;
				case '4':$('#DD_2').show();$('#DD_3').show();$('#DD_4').show();break;
				default:if(a>4)
						alert('Maximum DD Limits Reached!!');
						else{
							$('#DD_2').hide();$('#DD_3').hide();$('#DD_4').hide();
							}
						
						
			}
			
			})
		var flag=0;
		$('#paymentCash').click(function(){
			if(flag==0){
		      $("#cash").removeAttr("disabled");
		      flag=1;		
			}
		    else{
              $("#cash").attr("disabled","disabled");
              flag=0;
		    }

		})

		var ddAmt=0;

		$("#dd input").click(function(){
			if(ddAmt==0){
               $(".DD_Payment").removeAttr("disabled");
               ddAmt=1;
			}else{
				$(".DD_Payment").attr("disabled","disabled");
               ddAmt=0;
			}
		}); 
		
		

		
  
  
});

