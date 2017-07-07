// JavaScript Document


function Checkfiles()
{
var fup = document.getElementById('pic');
var fileName = fup.value;
var flag=1;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if((ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" ||ext == "png" || ext=="PNG" )==false)
{
if(fup.value!="")	
{alert("Please Do Upload an Image File !");
fup.value = "";
fup.style.backgroundColor = "#eab1b1";
fup.style.border = "thin solid #000000";
fup.focus();
flag=0;
}
else
{
document.getElementById('uploadedpic').innerHTML="";
document.getElementById('picname').innerHTML="";
}
document.getElementById('button').disabled=false;
}
if(fup.files[0].size>2*1024*1024)
{alert("Image Size Should Be Less Than 2 MB !");
fup.value = "";
fup.style.backgroundColor = "#eab1b1";
fup.style.border = "thin solid #000000";
fup.focus();
flag=0;
document.getElementById('button').disabled=false;
}


if(flag==1)
{document.getElementById('progress').innerHTML="<div style='margin-top:-100px'><progress id='prog' ></progress><div id='progressNumber'></div></div>";
uploadFile();
}
}
      var XMLHttpRequestObject=false;
try
  {
  // Firefox, Opera 8.0+, Safari
  XMLHttpRequestObject=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    XMLHttpRequestObject=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      }
    }
  }
        function uploadFile() {
			document.getElementById('uploadedpic').innerHTML="";
			document.getElementById('picname').innerHTML="";
			var fileName = $('#pic').val();
             var ext =  fileName.substring(fileName.lastIndexOf('.') + 1);
			var fd = new FormData();
            fd.append("pic", document.getElementById('pic').files[0]);
			fd.append("ext",ext)
  
            XMLHttpRequestObject.upload.addEventListener("progress", uploadProgress, false);
            var x=XMLHttpRequestObject.addEventListener("load", uploadComplete, false);
            XMLHttpRequestObject.addEventListener("error", uploadFailed, false);
            XMLHttpRequestObject.addEventListener("abort", uploadCanceled, false);
            XMLHttpRequestObject.open("POST", "upload.php");
            XMLHttpRequestObject.send(fd);
        }

        function uploadProgress(evt) {
            if (evt.lengthComputable) {
                var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                document.getElementById('progressNumber').innerHTML = percentComplete.toString() + '%';
                document.getElementById('prog').value = percentComplete;
            }
            else {
                document.getElementById('progressNumber').innerHTML = 'unable to compute';
            }
        }

        function uploadComplete(evt) {
            /* This event is raised when the server send back a response */
			document.getElementById('progress').innerHTML="";
			
			if(XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200)
		{ document.getElementById('uploadedpic').innerHTML="<div style='margin-top:-45px;padding-left:280px;height:160px;width:160px;'><img  style='display:none;' onload=\"load_image();\" id='showuploadedpic' src='' width='160px' height='160px'></img></div>";
	    $('#loader_img').show();
		$('#showuploadedpic').attr('src',XMLHttpRequestObject.responseText);
		
		document.getElementById('btnicb').innerHTML="<div class='add'> </div>Change Photo...";
		var file = document.getElementById('pic').value;
        var fileName = file.split("\\");
        document.getElementById("picname").innerHTML = fileName[fileName.length-1];
		document.getElementById('button').disabled=false;
        }
		}

        function uploadFailed(evt) {
            alert("There was an error attempting to upload the file.");
        }

        function uploadCanceled(evt) {
            alert("The upload has been canceled by the user or the browser dropped the connection.");
        }