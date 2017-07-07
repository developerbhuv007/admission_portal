<?php ?>

<div id="fet_line">FET Admission Portal <strong>- Operators Registration</strong></div>
<div id="main_div">
    <div id="form_div">
    	<?php echo $this->Form->create('operator_registration');?>
    	<div class="one_line">
        	<div class="label">Name</div>
            <div class="strong">:</div>
            <div class="text">
            	<?php echo $this->Form->input('name',array('label'=>false,'type'=>'text'));?>	
            </div>
        </div>
        
        <div class="one_line">
        	<div class="label">Username<strong>*</strong></div>
            <div class="strong">:</div>
            <div class="text">
            	<?php echo $this->Form->input('emailid',array('label'=>false,'required','type'=>'text'));?>	
            </div>
        </div>
        
        <div class="one_line">
        	<div class="label">Password<strong>*</strong></div>
            <div class="strong">:</div>
            <div class="text">
            	<?php echo $this->Form->input('password',array('label'=>false,'required','type'=>'password'));?>	
            </div>
        </div>
        
        <div class="one_line">
        	<div class="label">Confirm Password<strong>*</strong></div>
            <div class="strong">:</div>
            <div class="text">
            	<?php echo $this->Form->input('confirm_password',array('label'=>false,'required','type'=>'password'));?>	
            </div>
        </div>
        
        <div class="one_line">
        	<div class="label">Role<strong>*</strong></div>
            <div class="strong">:</div>
            <div class="text">
            	<?php echo $this->Form->input('role', 
    array(
        'options' => array('admin' => 'admin', 'dataentry' => 'Data entry Operator','paymentgateway' => 'Payment Gateway Operator'),           
        'empty' =>'Select Role',
        'label' => false,
	)
);?>	
            </div>
        </div>
        
        <div id="submit">
        	<?php
			 $option=array('value'=>'Submit','id'=>'submit_form'); echo $this->Form->end($option);?>
        </div>

    </div>
</div>