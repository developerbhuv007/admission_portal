
$(document).ready(function(){
     
	 
	  
	 $('#pdf').click(function(){
		 //alert("working");
		 window.location='ajax_get_records/name/branch='+$('#branch').val()+'/category='+$('#cat').val()+'/1';
	 })

	 $('#report').click(function(){
		 //alert("working");
		 window.location='ajax_get_records/name/branch='+$('#branch').val()+'/category='+$('#cat').val()+'/1';
	 })

	 $('#excel').click(function(){
		 //alert("working");
		 window.open('ajax_get_records/name/branch='+$('#branch').val()+'/category='+$('#cat').val()+'/2','_blank');
	 })
 // var loc=window.location;
  $('#name').live('click',function(){
	   //alert("working");
  var str='name';
  var branch='branch='+$('#branch').val();
  var cat='category='+$('#cat').val();
   sorting(str,branch,cat);
  
  })
  $('#slipno').live('click',function(){
  var str='candidateID';
   var branch='branch='+$('#branch').val();
  var cat='category='+$('#cat').val();
   sorting(str,branch,cat);
  })
  
  $('#branch').change(function(){
  var str='branch='+$(this).val();
   var cat='category='+$('#cat').val();
  sorting('name',str,cat);
  })
  
  $('#cat').change(function(){
	  
	  var str='category='+$(this).val();
	 var branch='branch='+$('#branch').val();
	 
	  sorting('name',branch,str)
  })
  
  });
  
   function sorting(value,branch,cat){
    //alert(value);exit();
    $.ajax({
            url: "ajax_get_records/"+value+'/'+branch+'/'+cat,
            type: "POST",
            dataType: "json",
            beforeSend: function(xhr) {
				
                     
            }
        }).done(function(data) {
			   var count=data.count;
			  
                var str='';
				var i=0;
			 str+='<div id="get_data"><table class="table table-bordered" style="margin:auto;width:95%"><tr>'+
						'<th>S No.</th>'+
						'<th><span id="slipno" style="text-decoration:underline;cursor:pointer">Slip No</span></th>'+
						'<th>Addmission Date</th>'+
						'<th>Form No</th>'+
						'<th><span id="name" style="text-decoration:underline;cursor:pointer">Name</span></th>'+
						'<th><span id="fname">Father\'s Name</span></th>'+
						'<th>JEE(Main)RollNo</th>'+
						'<th>JEE(Main)Rank</th>'+
						'<th>Branch From JOSSA</th>'+
						'<th>Category</th>'+
						'<th>Alloted Category</th>'+
						'<th>Branch Alloted by GKV</th>'+
						/*'<th>Ch 1</th>'+
						'<th>Ch 2</th>'+
						'<th>Ch 3</th>'+
						'<th>Ch 4</th>'+*/
						'</tr>';
							
			console.log(str)		
			$.each(data.records,function(i,v)
			{
			    /*var json=$.parseJSON(v.bchoices);*/
               

				i++;
			//alert(v.name);exit();
			              str+='<tr>'+
						    '<td>'+i+'</td>'+
						    '<td>'+v.candidateID+'</td>'+
                            '<td>'+v.admdate+'</td>'+
						    '<td>'+v.formno+'</td>'+
						    '<td><a href="view_details/'+v.candidateID+'" style="color:rgba(0,102,255,0.8);text-decoration:none">'+v.name+'</a></td>'+
							'<td>'+v.fathersname+'</td>'+
							'<td>'+v.jeerollno+'</td>'+
							'<td>'+v.jeerank+'</td>'+
							'<td>'+v.ccbbranch+'</td>'+
							'<td>'+v.category+'</td>'+
							'<td>'+v.allotedcategory+'</td>'+
							'<td>'+v.gkvbranch+'</td>';
                            /*$.each(json,function(index,val){
                	         str+='<td>'+val+'</td>';
                            });*/
                           
							str+='</tr>';
						});
						 str+='</table>'+
                          '</div>';

						  if(count==0){
							  $('#get_records').html("<div style='margin:auto;margin-top:2px;line-height:300px;'>No records found!!</div>");
						  }
						  else{
			$('#get_records').html(str);}
			$('#count').html(count);
          
        }).fail(function() {
            alert('Something Went Wrong ! Please Try Again .. ');
        }).always(function() {
            
        });
   }
  
