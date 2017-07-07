<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GKV Login Portal</title>
<?php echo $this->Html->css(array('adminPanel_top','admin_panel','font-awesome.min')); ?>
<?php echo $this->Html->script(array('jquery.min','gkv_common'));?>
</head>
<body>
<?php echo $this->Session->flash();?>
<?php echo $this->fetch('content'); ?>
</body>
</html>