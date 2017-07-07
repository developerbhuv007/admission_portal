<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profiler | Faculty</title>
<?php echo $this->Html->css(array('common','bootstrap.min')); ?>
<?php echo $this->Html->script(array('jquery.min','bootstrap.min','common'));?>
</head>
<body>
<?php echo $this->element('profiler_header'); ?>
<?php echo $this->fetch('content'); ?>
</body>
</html>