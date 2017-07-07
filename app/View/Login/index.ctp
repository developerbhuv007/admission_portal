
	<div id="gkv_header"></div>
<div id='modal'>
<div id='heading'><h1 align="center">Login Form </h1></div>
<div id='content'>

<table width="300" height="137" align="center">
	<?php echo $this->Form->create('login',array('name'=>'login'));?>

<tr>
<td height="30" align="center">LOGIN ID</td><td> 
 <?php  echo $this->Form->input('emailid',array('label'=>false,'placeholder'=>'','type'=>'text','name'=>'email','autofocus','autocomplete'=>'off','class'=>'input form-control'));?>
</td></tr>
<tr>
  <td height="30" align="center">PASSWORD</td><td >
   <?php  echo $this->Form->input('password',array('label'=>false,'placeholder'=>'','type'=>'password','name'=>'password','autofocus','autocomplete'=>'off','class'=>'input form-control'));?>
</td></tr>
<tr>
  <td></td><td height="24"  >
  <?php echo $this->Form->end("Login");?>

</table>
<?php 

/*if(isset($_SESSION['LOG_ERR']))
{echo "<h3 align='center' style='color:#F00;text-decoration:blink;'>".$_SESSION['LOG_ERR']."</h3>";
unset($_SESSION['LOG_ERR']); 
}*/


?>
</div>
</div>
