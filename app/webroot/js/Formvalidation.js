//Javascript Document
function Validateinsertionform()
{
	var formElements = new Array();
$("#Detailform :input").each(function(){
    formElements.push($(this));
});

var b=$(".branchchoices").length;
for(var i=0;i<formElements.length-3;i++)
{ if(i==11){
   i=11+b;
  }

if(checkempty(formElements[i]))
return;
}

insertdata();
}

function Validateeditingform()
{var formElements = new Array();
$("#Detailform :input").each(function(){
    formElements.push($(this));
});

var b=$(".branchchoices").length;
for(var i=2;i<22;i++)
{ if(i==12){
   i=12+b;
  }

if(checkempty(formElements[i]))
return;
}


editdata();
}


function checkempty(content)
{ 
  if(content.val()==0||content.val()==null)
   {
    content.val('');
    content.css('backgroundColor','#eab1b1');
    content.css('border','thin solid #000000');
    content.focus();
	return true;		
   }
  else if(content.val()=='Default')
  {
    content.css('backgroundColor','#eab1b1');
    content.css('border','thin solid #000000');
    content.focus();
    return true;		
   }
   return false;
}


function Checkfiles()
{
var fup = document.getElementById('pic');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if((ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" )==false)
{
alert("Please Upload an Image File only");
fup.value = "";
fup.style.backgroundColor = "#eab1b1";
fup.style.border = "thin solid #000000";
fup.focus();
}
if(fup.files[0].size>2*1024*1024)
{alert("Image Size Should Be Less Than 2 MB!");
fup.value = "";
fup.style.backgroundColor = "#eab1b1";
fup.style.border = "thin solid #000000";
fup.focus();
}
}


function insertdata()
{document.getElementById('css').href="css/styles.css";
document.getElementById('premodal').innerHTML="<div id='modal'style='margin-top:-100px !important; position:fixed !important;'></div>";
document.getElementById('modal').style="margin-top: 652px !important";

var fileName = $('#pic').val();
var ext =  fileName.substring(fileName.lastIndexOf('.') + 1);

var fd = new FormData();
var formelem=Array("formno","fullname","fathersname","mothersname","dob","cat","allotcat","aieeeroll","air","ccbbranch","gkvbranch","stradd","city","state","pincode","mob","admdate","remarks","uploadpicname");
	       
		  
		  for(var i=0;i<=10;i++)
           {
			   fd.append(formelem[i], document.forms['Detailform'].elements[i].value);
		}
		
		var t=i;
		
		var b=$(".branchchoices").length;
		
		
		for(;i<t+b;i++)
           {    if(document.forms['Detailform'].elements[i].value!="")
			    fd.append("bchoices[]", document.forms['Detailform'].elements[i].value);
		   }
	  
		for(var j=t;i<t+b+8;i++)
           {
			   fd.append(formelem[j++], document.forms['Detailform'].elements[i].value);
		}
		
		for(var c=0;c<9;c++)
           {   
		       var chv=(document.forms['checklist_form'].elements[c].checked==true)?1:0;
			   fd.append("checklistelem[]", chv);
		   }
		   var rcc=ga=mc=2; // 2 is for not applicable documents mode
		   if(document.getElementById('rcc').checked)
		   {
			  if(document.getElementById('rcco').checked)
			  rcc=1;
			  else 
			  rcc=0;   
		   }
		    if(document.getElementById('ga').checked)
		   {
			  if(document.getElementById('gao').checked)
			  ga=1;
			  else 
			  ga=0;   
		   }
		    if(document.getElementById('mc').checked)
		   {
			  if(document.getElementById('mco').checked)
			  mc=1;
			  else 
			  mc=0;   
		   }
		   fd.append("checklistelem[]", mc);
		  fd.append("checklistelem[]", rcc);
		  fd.append("checklistelem[]", ga);
		  
		
		fd.append('ext',ext);
	
	$.ajax({
  url: "insertion.php",
  data: fd,
  processData: false,
  contentType: false,
  type: 'POST',
  success: function( data ) {
	  
	   $('#modal').html(data);
		  showmodal();
  }
});
	return;
            
}

function editdata()
{   document.getElementById('css').href="css/styles.css";

document.getElementById('premodal').innerHTML="<div id='modal' style='margin-top:-8% !important; position:fixed !important;'></div>";

    var fd = new FormData();
	
	var formelem=Array("candidateID","formno","fullname","fathersname","mothersname","dob","cat","allotcat","aieeeroll","air","ccbbranch","gkvbranch","stradd","city","state","pincode","mob","admdate","remarks");
	
	      for(var i=0;i<=11;i++)
           {
			   fd.append(formelem[i], document.forms['Detailform'].elements[i].value);
		}
		
		var t=i;
		
		var b=$(".branchchoices").length;
		
		for(;i<t+b;i++)
           {     if(document.forms['Detailform'].elements[i].value!="")
			    fd.append("bchoices[]", document.forms['Detailform'].elements[i].value);
		}
	 
		for(var j=t;i<t+b+7;i++)
           {   
			   fd.append(formelem[j++], document.forms['Detailform'].elements[i].value);
		}
		
		for(var c=0;c<9;c++)
           {   
		       var chv=(document.forms['checklist_form'].elements[c].checked==true)?1:0;
			   fd.append("checklistelem[]", chv);
		   }
		   var rcc=ga=mc=2; // 2 is for not applicable documents mode
		   if(document.getElementById('rcc').checked)
		   {
			  if(document.getElementById('rcco').checked)
			  rcc=1;
			  else 
			  rcc=0;   
		   }
		    if(document.getElementById('ga').checked)
		   {
			  if(document.getElementById('gao').checked)
			  ga=1;
			  else 
			  ga=0;   
		   }
		 
		  if(document.getElementById('mc').checked)
		   {
			  if(document.getElementById('mco').checked)
			  mc=1;
			  else 
			  mc=0;   
		   }
		   fd.append("checklistelem[]", mc);
		  fd.append("checklistelem[]", rcc);
		  fd.append("checklistelem[]", ga);
		  
            $.ajax({
  url: "editing.php",
  data: fd,
  processData: false,
  contentType: false,
  type: 'POST',
  success: function( data ) {
	   $('#modal').html(data);
		  showmodal();
  }
});
}

function showmodal()
{
	$('#modal').reveal({ // The item which will be opened with reveal
				  	animation: 'fade',                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick:false,              // if you click background will modal close?
					dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
				});
					
			return false;

}

