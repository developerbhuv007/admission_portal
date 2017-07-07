<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Students|Documents</title>
<?php echo $this->Html->css(array('gkv_common','check_docs','bootstrap.min')); ?>
<?php echo $this->Html->script(array('jquery.min','check_docs','gkv_common')); ?>
</head>
<body>
<?php echo $this->element('gkv_header')?>
<?php echo $this->fetch('content'); ?>
</body>
</html>