$(document).ready(function(){

  $(".loadingImg").hide();

  var memberVal, yearVal, categoryVal, branchVal, deptVal;
  var smsArr = new Array();
  var emailArr = new Array();
  var emailSubject;
  var emailContent;
  var smsContent;
  $('#selection-bar .btn-group li').click(function(){
    $(this).parent().parent().find('.mainLabel span').text($(this).find('a').text());
    $(this).parent().parent().find('.mainLabel').attr('data-value',$(this).find('a').attr('data-'+$(this).find('a').attr('class')));
    memberVal = $('#studentLabel').attr('data-value');
    yearVal = $('#yearLabel').attr('data-value');
    categoryVal = $('#categoryLabel').attr('data-value');
    branchVal = $('#branchLabel').attr('data-value');
    if(memberVal == "student"){
      $('#records-table-staff').hide();
      $('#records-table').show();
      $('#year-selector, #branch-selector, #category-selector').show();
      $('#department-selector').hide();
      $('.smsStudent, .emailStudent').css('display','inline-block');
      $('.smsStaff, .emailStaff').css('display','none');
      $.ajax({
        url: "/fet-profiler/students?year="+yearVal+"&branch="+branchVal+"&category="+categoryVal,
        dataType: "json",
        beforeSend: function(xhr){

        },
        success: function(result){
          console.log(result);
          $('#records-table tbody').html('');
          var count = 0;
          var str = '';

          if(result.length == 0){
            str = "No Records Found!!";
          }

          $.each(result,function(i,v){
            count++;
            str += '<tr>'+
              '<td class="emailSmsStudent" data-email="'+v.data_entry.email+'" data-sms="'+v.data_entry.phone+'">'+ count +'</td>'+
              '<td><a href="/fet-profiler/students/'+v.data_entry.candidateID+'">'+v.data_entry.name+'</a></td>'+
              '<td>'+v.data_entry.year+'</td>'+
              '<td>'+v.off.gkvbranch+'</td>'+
              '<td>'+v.off.allotedcategory+'</td>'+
            '</tr>';
          });
          $('#records-table tbody').html(str);
        }
      });
    }
    else if(memberVal == "staff"){
      $('#records-table-staff').show();
      $('#records-table').hide();
      $('#year-selector, #branch-selector, #category-selector').hide();
      $('#department-selector').show();
      $('.smsStudent, .emailStudent').css('display','none');
      $('.smsStaff, .emailStaff').css('display','inline-block');
      deptVal = $('#departmentLabel').attr('data-value');
      $.ajax({
        url: "/fet-profiler/staff?department="+deptVal,
        dataType: "json",
        beforeSend: function(xhr){

        },
        success: function(result){
          
          $('#records-table-staff tbody').html('');
          var count = 0;
          var str = '';
          
          if(result.length == 0){
            str = "No Records Found!!";
          }

          $.each(result,function(i,v){
            count++;
            str += '<tr>'+
              '<td class="emailSmsStaff" data-email="'+v.staffregistration.emailid+'" data-sms="'+v.staffregistration.mobile+'">'+ count +'</td>'+
              '<td>'+v.staffregistration.name+'</td>'+
              '<td>'+v.staffregistration.department+'</td>'+
            '</tr>';
          });
          $('#records-table-staff tbody').html(str); 
        }
      });
    }
  });
  $('#smsStudent').click(function(){
    $('#smsSendBtn').attr('data-value','student');
  });
  $('#emailStudent').click(function(){
    $('#emailSendBtn').attr('data-value','student');
  });
  $('#smsStaff').click(function(){
    $('#smsSendBtn').attr('data-value','staff');
  });
  $('#emailStaff').click(function(){
    $('#emailSendBtn').attr('data-value','staff');
  });
  $('#emailSendBtn').click(function(){
    emailArr = [];
    if($(this).attr('data-value') == "student"){
      for(var i = 0;i < $('#records-table tbody tr').length; i++){
        emailArr.push($('#records-table tbody tr:eq('+i+') td:first-child').attr('data-email'));
      }
      //console.log(emailArr)
    }
    else if($(this).attr('data-value') == "staff"){
      for(var i = 0;i < $('#records-table-staff tbody tr').length; i++){
        emailArr.push($('#records-table-staff tbody tr:eq('+i+') td:first-child').attr('data-email'));
      }
      //console.log(emailArr)
    }
    emailSubject = $('#emailSubject').val();
    emailContent = $('#emailContent').val();
    var data = {
      'subject': emailSubject,
      'message': emailContent,
      'email' : emailArr
    };

    $.ajax({
      url: "/FetProfiler/sendemail",
      type: "POST",
      dataType: "json",
      data: data,
  
      beforeSend: function(xhr){
        console.log('sending');
        $(".loadingImg").show();
      },
      success: function ( result ) {
          $("#emailSubject").val("");
          $("#emailContent").val("");
          $(".loadingImg").hide();
          $('.close').click();

          if(result.code == 200){
            alert('Email sent successfully');
          }else{
            alert('Error sending email..');
          }
      },
      error: function(xhr,ajaxOptions,thrownError){
        $("#emailSubject").val("");
        $("#emailContent").val("");
        $(".loadingImg").hide();
        $('.close').click();
        alert('Error sending email..');
        console.log(xhr.status);
        console.log(thrownError);
      }
    });
  });
  $('#smsSendBtn').click(function(){
    smsArr = [];
    if($(this).attr('data-value') == "student"){
      for(var i = 0;i < $('#records-table tbody tr').length; i++){
        smsArr.push($('#records-table tbody tr:eq('+i+') td:first-child').attr('data-sms'));
      }
      //console.log(smsArr)
    }
    else if($(this).attr('data-value') == "staff"){
      for(var i = 0;i < $('#records-table-staff tbody tr').length; i++){
        smsArr.push($('#records-table-staff tbody tr:eq('+i+') td:first-child').attr('data-sms'));
      }
      //console.log(smsArr)
    }
    smsContent = $('#smsContent').val();
    var data = {
      'contacts': smsArr,
      'message': smsContent
    };

    $.ajax({
      url: "/FetProfiler/sendsms",
      type: "POST",
      dataType: "json",
      data: data,
  
      beforeSend: function(xhr){
        console.log('sending');
        $(".loadingImg").show();
      },
      success: function ( result ) {
          $("#smsContent").val("");
          $(".loadingImg").hide();
          $('.close').click();
          if(result == 200){
            alert('Sms sent successfully');
          }else{
            alert('Error sending sms..');
          }
      },
      error: function(xhr,ajaxOptions,thrownError){
        $("#smsContent").val("");
        $(".loadingImg").hide();
        $('.close').click();
        alert('Error sending sms..');
        console.log(xhr.status);
        console.log(thrownError);
      }
    });
  });
});