$(document).ready(function(){

	$('#pdf').click(function(){
		 //alert("working");
		 //window.location='ajax_get_online_records/cat='+$('#cat').val()+'/1';
		 window.open('ajax_get_online_records/cat='+$('#cat').val()+'/1','_blank');
	 })

	$('#excel').click(function(){
		 //alert("working");
		 window.open('ajax_get_online_records/cat='+$('#cat').val()+'/2','_blank');
	 })

	$("#cat").change(function(){
		var cat='cat='+$(this).val();

        sorting(cat);
	})

});

function sorting(cat){
    //alert(value);exit();
    $.ajax({
            url: "ajax_get_online_records/"+cat,
            type: "POST",
            dataType: "json",
            beforeSend: function(xhr) {
				
                     
            }
        }).done(function(data) {
			   var count=data.count;
			  
                var str='';
				var i=0;
			 str+='<table border="1" width="95%">'+
			       '<tr>'+
				   '<th>GKV Rank</th>'+
				   '<th>JEE(Main) Roll No</th>'+
				   '<th>Name</th>'+
				   '<th>Fathers Name</th>'+
				   '<th>Category</th>'+
				   '<th>JEE(Main) Rank</th>'+
				   '<th>Click To Migrate</th>'+
				   '</tr>';
							
							
			$.each(data.records,function(i,v)
			{
			    //var json=$.parseJSON(v.bchoices);
               

				i++;
			//alert(v.name);exit();
			              str+='<tr>'+
						    '<td>'+i+'</td>'+
						    '<td>'+v.jeerollno+'</td>'+
                            '<td>'+v.name+'</td>'+
						    '<td>'+v.fathersname+'</td>'+
						    '<td>'+v.category+'</td>'+	
						    '<td>'+v.jeerank+'</td>'+
						    '<td><div class="migarte-btn"><a href="data_entry/'+v.uid+'"><button style="background-color: rgb(70, 11, 244);color: whitesmoke;width: 60px; border: 1px solid black;">Migrate</button></a></div></td>'+
						    '</tr>';
						});
						 str+='</table>';
						  if(count==0){
							  $('.tablediv').html("<div style='margin:auto;margin-top:2px;line-height:300px;text-align: center;'>No records found!!</div>");
						  }
						  else{
			$('.tablediv').html(str);}
			$('#count').html("Number of Records : "+count);
          
        }).fail(function() {
            alert('Something Went Wrong ! Please Try Again .. ');
        }).always(function() {
            ele.removeAttr('data-processing');
        });
   }
