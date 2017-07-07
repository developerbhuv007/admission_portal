
<div class="wrapper">
      <div class="withdrawalform">
      	 <table width="300" height="137" align="center">
			<?php echo $this->Form->create('withdraw');?>

		<tr>
		<td height="30" align="center">Reason: </td><td> 
		 <?php  echo $this->Form->input('withdraw_reason',array('label'=>false,'placeholder'=>'Enter any remark','type'=>'text','autofocus','class'=>'input form-control','required'));?>
		</td></tr>
		<tr>
		  <td></td><td height="24">
		  <?php echo $this->Form->end("Withdraw");?>
          </td>
      </tr>
</table>
      </div>
</div>