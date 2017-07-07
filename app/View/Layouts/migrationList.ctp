<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Migration List</title>
<?php echo $this->Html->css(array('gkv_common','migrationlist','bootstrap.min')); ?>
<?php echo $this->Html->script(array('jquery-1.8.3.min','jquery-ui-1.9.2.button.custom.min','gkv_common','migration'));?>
</head>
<body>
<?php echo $this->Session->flash();?>
<?php echo $this->element('gkv_header')?>
<?php echo $this->fetch('content'); ?>
</body>
</html>