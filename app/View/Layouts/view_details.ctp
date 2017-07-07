<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Students|Details</title>
<?php echo $this->Html->css(array('gkv_common','view_details')); ?>
<?php echo $this->Html->script(array('jquery.min','gkv_common'));?>
</head>
<body>
<?php echo $this->element('gkv_header'); ?>
<?php echo $this->fetch('content'); ?>
</body>
</html>