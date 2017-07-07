
$(document).ready(function(){
	  
	  $('#status').change(function(){
		  //alert("working");
		  var status="status="+$(this).val();
		  var documents="document="+$('#docs').val();
		  docs_sorting(status,documents);
	  })
	  
	  $('#docs').change(function(){
		  var documents="document="+$(this).val();
		  var status="status="+$('#status').val();
		  docs_sorting(status,documents);
	  })
 
  });
  
   function docs_sorting(status,documents){
    //alert(value);exit();
    $.ajax({
            url: "ajax_get_docs/"+status+'/'+documents,
            type: "POST",
            dataType: "json",
            beforeSend: function(xhr) {
				
                     
            }
        }).done(function(data) {
			   var count=data.count;
			  
                var str='';
				var i=0;
			 str+='<div id="get_data"><table class="table table-bordered" style="margin:auto; font-size:18px;width:100%">'+
					'<tr>'+
					'<th>S No.</th>'+
					'<th>Slip No</th>'+
					'<th>Name</th>'+
					'<th>Alloted Branch</th>'+
					'<th>Documents Not Submitted</th>'+
					'<th>Admission Date</th>'+
					'<th>Contact No</th>'+
					'</tr>';
							
			$.each(data.personal,function(i,v)
			{
				var documents='';
				$.each(v.docs,function(key,val){
					
					if(val==0){
						documents+=key+' ';
					}
				});
			
				i++;
			//alert(v.name);exit();
			              str+='<tr>'+
						    '<td>'+i+'</td>'+
							'<td>'+v.off.candidateID+'</td>'+
						    '<td><a href="view_details/'+v.off.candidateID+'" style="text-decoration:none;color:rgba(0,102,255,0.8);">'+v.off.name+'</a></td>'+
							'<td>'+v.off.gkvbranch+'</td>'+
							'<td style="max-width:100px;">'+documents+'</td>'+
							'<td>'+v.off.admdate+'</td>'+
							'<td>'+v.data_entry.phone+'</td>'+
							'</tr>';
						});
						 str+='</table>'+
                          '</div>';
						  if(count==0){
							  $('#get_records').html("<div style='margin:auto;margin-top:150px;'>No records found!!</div>");
						  }
						  else{
			$('#get_records').html(str);}
			$('#count').html(count);
          
        }).fail(function() {
            alert('Something Went Wrong ! Please Try Again .. ');
        }).always(function() {
            ele.removeAttr('data-processing');
        });
   }
  
