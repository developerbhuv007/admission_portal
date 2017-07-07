$(document).ready(function(){

  $(".loadingImg").hide();

  $('.tabStudentInfo').click(function(){
    $('.tabStudentInfo').css({'background-color': 'rgba(49, 112, 143, 0.23)', 'color': '#000'});
    $(this).css({'background-color': '#31708f', 'color': '#fff'});
    var id = $(this).attr('id');
    $('.tab-content').css('display','none');
    $('#'+id+"box").css('display','block');

  });

  $('.edit-btn').click(function(){
    $('.InfoTextDiv .contentDetaila').attr('contenteditable','true').addClass('border-edit-box');
    $(this).css('display','none');
    $('.update-btn').css('display','inline-block');
  });
  $('.student-edit-btn').click(function(){
    $('.InfoTextDiv .contentDetails').attr('contenteditable','true').addClass('border-edit-box');
    $(this).css('display','none');
    $('.update-btn').css('display','inline-block');
  });
  $('.update-btn').click(function(){
    var updatebtn = $(this);
    var data = {
        id : $( '.update-btn button' ).attr('data-id'),
        candidateID : $( '.update-btn button' ).attr('data-candidateID'),
        enrollmentnumber : $( '#EnrollmentNo .contentDetail' ).text(),
        name : $( '#nameStudent .contentDetail' ).text(),
        fathersname : $( '#nameFather .contentDetail' ).text(),
        mothersname : $( '#nameMother .contentDetail' ).text(),
        dob : $( '#dob .contentDetail' ).text(),
        phone : $( '#contactStudent .contentDetail' ).text(),
        email : $( '#emailStudent .contentDetail' ).text(),
        currentaddress : $( '#addressStudent .contentDetail' ).text(),
        gkvbranch : $( '#branchStudent .contentDetail' ).text(),
        fatherscontact : $( '#contactFather .contentDetail' ).text(),
        streetaddress : $( '#streetAddress .contentDetail' ).text(),
        city : $( '#cityHome .contentDetail' ).text(),
        state : $( '#stateStudent .contentDetail' ).text(),
        pincode : $( '#pinStudent .contentDetail' ).text()
    };

    $.ajax({
      url: "/FetProfiler/ajax_update_student_record",
      type: "POST",
      dataType: "json",
      data: data,
  
      beforeSend: function(xhr){
        console.log('sending');
      },
      success: function ( result ) {
        $('.InfoTextDiv .contentDetail').attr('contenteditable','false').removeClass('border-edit-box');
        $('.edit-btn').css('display','inline-block');
        updatebtn.css('display','none');
      },
      error: function(xhr,ajaxOptions,thrownError){
        console.log(xhr.status);
        console.log(thrownError);
      }
    });
  });
  $('#emailSendBtn').click(function(){
    var studentEmail = $('#emailStudent .contentDetail').text();
    var emailSubject = $('#emailSubject').val();
    var emailContent = $('#emailContent').val();
    console.log(studentEmail)

    var data = {
      'subject': emailSubject,
      'message': emailContent,
      'email' : studentEmail
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
        alert('Error sending Email..');
        console.log(xhr.status);
        console.log(thrownError);
      }
    });
  });
  $('#smsSendBtn').click(function(){
    var studentSms = $('#contactStudent .contentDetail').text();
    var smsContent = $('#smsContent').val();
    console.log(studentSms)
    sms = []
    sms.push(studentSms);
    var data = {
      'contacts': sms,
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