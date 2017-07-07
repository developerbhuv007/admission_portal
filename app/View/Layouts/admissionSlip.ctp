<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admission Slip</title>
<?php echo $this->Html->css(array('admission_slip')); ?>
<?php echo $this->Html->script(array('jquery.min')); ?>
<script>
$(document).ready(function(){
window.onload=window.print() ;
});
</script>
</head>
<body>
<?php echo $this->fetch('content'); ?>
</body>
</html>