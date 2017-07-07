<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Students|List</title>
<?php echo $this->Html->css(array('gkv_common','sorted_list','jquery.multiSelect','bootstrap.min')); ?>
<?php echo $this->Html->script(array('jquery.min','sorted_list','gkv_common','jquery.multiSelect'));?>
</head>
<body>
<?php echo $this->element('gkv_header')?>
<?php echo $this->fetch('content'); ?>
<?php echo $this->Session->flash();?>
</body>
</html>