<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GKV Login Portal</title>
<?php echo $this->Html->css(array('login','login_style','bootstrap.min')); ?>
<?php echo $this->Html->script(array('jquery.min','login')); ?>
</head>
<body>
<?php echo $this->Session->flash();?>
<?php echo $this->fetch('content'); ?>
</body>
</html>