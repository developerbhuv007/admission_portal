<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profiler | Student</title>
<?php echo $this->Html->css(array('common','bootstrap.min','font-awesome.min','profiler_student')); ?>
<?php echo $this->Html->script(array('jquery.min','bootstrap.min','profiler_student','common'));?>
</head>
<body>
<?php echo $this->element('profiler_header'); ?>
<?php echo $this->fetch('content'); ?>
</body>
</html>	