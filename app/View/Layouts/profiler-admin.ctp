<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Portal</title>
<?php echo $this->Html->css(array('common','bootstrap.min','profiler_admin')); ?>
<?php echo $this->Html->script(array('jquery.min','bootstrap.min','profiler_admin','common'));?>
</head>
<body>
<?php echo $this->element('profiler_header'); ?>
<?php echo $this->fetch('content'); ?>
</body>
</html>