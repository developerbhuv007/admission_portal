<?php echo $this->element('gkv_header');?>

  
   <div id="tap">
  	<div class="tap_inside">
    	<div id="content">
        	Enter Slip No : FET<?php echo date('Y');?>
        </div>	
		<div id="text">
		    
        	<?php echo $this->Form->input('slipno',array('label'=>false,'type'=>'text','required','class'=>'label','id'=>'slipno','autofocus'));?>
        </div>
        
        <div id="button">
        	
        </div>
    </div>
	
	<div class="tap_inside">
    </div>
  </div>
  
  <div id="main_div" style="height:420px;width:85%;margin:auto;text-align:center;">
  <div id="center" style="text-align:center;margin:auto;margin-top:10%">
    Please Enter Slip No!!
  </div>
  </div>
  <div id="MainContainer_show">
        <div class="InsideMainContainer col-xs-12">
            <div class="heading col-xs-12" style="min-height:15px;"><span  style="float: right;margin-top: 5px;margin-right: 14px;text-align:center;"><img src="../img/close-round.png" width="15px;"></span></div>
            
            <div class="lowerBox">
            <div class="id_message"></div>
            <div class="print_text_button"></div>
            </div>
        </div>
    </div>