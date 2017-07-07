<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fee Slip</title>
<?php echo $this->Html->css(array('fee_slip')); ?>
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