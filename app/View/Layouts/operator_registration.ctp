<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sorted List</title>
<?php echo $this->Html->css(array('gkv_common','operator_registration')); ?>
<?php echo $this->Html->script(array('jquery.min','gkv_common')); ?>
<script>
$(document).ready(function(){
$('#submit_form').click(function(){
var pass=$('#operator_registrationPassword').val();
var con_pass=$('#operator_registrationConfirmPassword').val();
//alert(pass + '' +con_pass);
if(pass!=con_pass)
{
	alert("Password doesn't match!! Please enter correct password!!");
}
 })
});
</script>
</head>
<body>
<?php echo $this->Session->flash();?> 
<?php echo $this->element('gkv_header'); ?>
<?php echo $this->fetch('content'); ?>
</body>
</html>