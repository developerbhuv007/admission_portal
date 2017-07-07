<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sorted List</title>
<?php echo $this->Html->css(array('gkv_common','payment')); ?>
<?php echo $this->Html->script(array('jquery.min','payment','gkv_common'));?>
</head>
<body>
<?php echo $this->Session->flash();?>
<?php  //echo $this->element('gkv_header')?>
<?php echo $this->fetch('content'); ?>

</body>
</html>         