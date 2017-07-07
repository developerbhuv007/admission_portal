<?php echo $this->element('gkv_header');?>

  
  <div id="tap">
  	<div class="tap_inside">
    	<div id="content">
        	Enter Slip No : FET<?php echo date('Y');?> 
        </div>	
        
        <div id="text">
		  <?php foreach($off_details as $d):?>
        	<?php echo $this->Form->input('slipno',array('label'=>false,'required','type'=>'text','id'=>'slipno','value'=>substr($d['candidateID'],'7'),'autofocus')); ?>
        </div>
        
        
    </div>
    
    <!-- <div class="tap_inside">
    </div> -->
  </div>
  
  <div id="main_div">
  	<div class="both">
    	<div id="photo_name">
        	<div id="left">
            	<div id="photo"></div>
            </div>
            
            <div id="right">
			
            <?php  echo $d['name'];?>
            </div>
        </div>
        
        <div id="bar">
        	Basic Details
        </div>
        
        <div id="basic_details">
        	<div class="one">
            	<div class="lable">
                	Slip No
                </div>
                <strong>:</strong>
                
                <div class="content_fetch">
                	<?php echo $d['candidateID'];?>
                </div>
            </div>
            
            <div class="one">
            	<div class="lable">
                	Form No
                </div>
                <strong>:</strong>
                
                <div class="content_fetch">
                	<?php echo $d['formno'];?>
                </div>
            </div>
            
            <div class="one">
            	<div class="lable">
                	Branch Alloted By JOSSA
                </div>
                <strong>:</strong>
                
                <div class="content_fetch">
                <?php echo $d['gkvbranch'];?>
                </div>
            </div>
             <?php endforeach;?>
            <div class="one" style="height:70px;">
            	<div class="lable" style="height:70px;">
                	Address
                </div>
                <strong style="height:70px;">:</strong>
               
                <?php foreach($per_details as $p):?>
                	<div id="add" style="height:70px; width:56.5%; background-color:white;font-family: arial; font-size:15px; float:right;"><?php echo $p['streetaddress'];?></div>
                
            </div>
            
            <div class="one">
            	<div class="lable">
                	Contact No
                </div>
                <strong>:</strong>
                
                <div class="content_fetch">
                	<?php echo $p['phone'];?>
					 <?php endforeach;?>
                </div>
            </div>
            
            <div class="one">
            	<div class="lable">
                	Admission Date
                </div>
                <strong>:</strong>
                
                <div class="content_fetch">
				<?php foreach($off_details as $d):?>
                	<?php echo $d['admdate'];?>
                </div>
            </div>
            
            <div class="one">
            	<div class="lable">
                	Remarks
                </div>
                <strong>:</strong>
                
                <div class="content_fetch">
                	<?php echo $d['remarks'];?>
					
                </div>
            </div>
        </div>
    </div>
    
    <div id="middle_border"></div>
    
    <div class="both next">
    	<div id="bar">
        	Payment Details
        </div>
        
        <div id="payment_detail">
        	<div class="one">
            	<div class="lable">
				<?php echo $this->Form->create('payment');?>
                	Receipt Number 
                </div>
                <strong>:</strong>
                
                <div class="pay_detailEntry">
                	<?php echo $this->Form->input('slipno',array('label'=>false,'required','type'=>'text','value'=>(!empty($payment_details[0]['slipno'])?$payment_details[0]['slipno']:'0')));?>
                </div>
            </div>
            
            <div class="one">
            	<div class="lable">
                	Date 
                </div>
                <strong>:</strong>
                
                <div class="pay_detailEntry">
                	<?php echo $this->Form->input('paydate',array('label'=>false,'required','type'=>'text','placeholder'=>'DD-MM-YYYY','value'=>date('d-m-Y')));?>
                </div>
            </div>
            
            <div class="one">
            	<div class="lable">
                	College Fees 
                </div>
                <strong>:</strong>
                
                <div class="pay_detailEntry">
                	<?php echo $this->Form->input('collegefee',array('label'=>false,'required','type'=>'number','value'=>'63150'));?>
                </div>
            </div>
            
            <div class="one">
            	<div class="lable">
                	Hostel Fees 
                </div>
                <strong>:</strong>
                
                <div class="pay_detailEntry">
                	<?php echo $this->Form->input('hostelfee',array('label'=>false,'required','type'=>'number','value'=>'21000'));?>
                </div>
            </div>
        </div>
        
         <div id="payMode">Payment Mode
        </div>
        
    	
        <div id="cash_panel">
        	<div class="oneline">
            	<div id="cashcheck">Cash
                	<div id="check"><?php echo $this->Form->input('cash',array('label'=>false,'type'=>'checkbox'));?></div>
                </div>
            </div>
            
            <div class="oneline" style="margin-top:15px;">
            	<div class="fifty_fifty" id="cash_text">
                	Amount 
                </div>
                
                <div class="fifty_fifty" id="enter_amount">
                	<div id="cash_amount">
                    	<?php        
                        echo $this->Form->input('cashamt',array('label'=>false,'type'=>'number','id'=>'cash','value'=>(isset($payment_details[0]['cashamount'])?$payment_details[0]['cashamount']:''),'disabled'));?>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="amount_divline">
        </div>
        <?php 
        $counter=0;
        $ddno=array();
        $ddamount=array();
        if(isset($payment_details[0]['ddno'])){
            
            $ddno=json_decode($payment_details[0]['ddno'],true);
            foreach ($ddno as $key => $value) {
                if($value!=null){
                    $counter++;
                }
            }
        }

        if(isset($payment_details[0]['ddamount'])){
            
            $ddamount=json_decode($payment_details[0]['ddamount'],true);
        }
        ?>
        <div id="dd_panel">
        	<div class="oneline">
            	<div id="no_of_dd">
                	<div id="no_dd"><?php echo $this->Form->input('no_of_dd',array('label'=>false,'type'=>'number','id'=>'no_ofdd','disabled','class'=>'DD_Payment','value'=>$counter));?>
               		</div>
                </div>
                
                <div id="dd_work">
                	D.D No 
					<div id="dd"><?php echo $this->Form->input('dd',array('label'=>false,'type'=>'checkbox','id'=>'nodd'));?>
                	</div>
                </div>
            </div>
            
            <div class="single_line" id="DD_1">
            	<div class="fifty_fifty dd">
                	<div class="left">
                    	DD No
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput 1">
                        	<?php echo $this->Form->input('dd1',array('label'=>false,'type'=>'number','id'=>'ddno_1','disabled','class'=>'DD_Payment','value'=>(!empty($ddno)?$ddno['ddno1']:'')));?>
                        </div>
                    </div>
                </div>
                
                <div class="fifty_fifty dd">
                	<div class="left">
                    	Amount
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput 1">
                        	<?php echo $this->Form->input('dd1_amount',array('label'=>false,'type'=>'number','id'=>'ddamt_1','disabled','class'=>'DD_Payment','value'=>(!empty($ddamount)?$ddamount['dd1']:'')));?>
                        </div>
                    </div>	
                </div>
            </div>  
            
            <div class="single_line" id="DD_2">
            	<div class="fifty_fifty dd">
                	<div class="left">
                    	DD No
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput">
                        	<?php echo $this->Form->input('dd2',array('label'=>false,'type'=>'number','id'=>'ddno_2','disabled','class'=>'DD_Payment','value'=>(!empty($ddno)?$ddno['ddno2']:'')));?>
                        </div>
                    </div>
                </div>
                
                <div class="fifty_fifty dd">
                	<div class="left">
                    	Amount
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput">
                        	<?php echo $this->Form->input('dd2_amount',array('label'=>false,'type'=>'number','id'=>'ddamt_2','disabled','class'=>'DD_Payment','value'=>(!empty($ddamount)?$ddamount['dd2']:'')));?>
                        </div>
                    </div>	
                </div>	
            </div>  
            
            <div class="single_line" id="DD_3">
            	<div class="fifty_fifty dd">
                	<div class="left">
                    	DD No
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput">
                        	<?php echo $this->Form->input('dd3',array('label'=>false,'type'=>'number','id'=>'ddno_3','disabled','class'=>'DD_Payment','value'=>(!empty($ddno)?$ddno['ddno3']:'')));?>
                        </div>
                    </div>
                </div>
                
                <div class="fifty_fifty dd">
                	<div class="left">
                    	Amount
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput">
                        	<?php echo $this->Form->input('dd3_amount',array('label'=>false,'type'=>'number','id'=>'ddamt_3','disabled','class'=>'DD_Payment','value'=>(!empty($ddamount)?$ddamount['dd3']:'')));?>
                        </div>
                    </div>	
                </div>
            </div>  
            
            <div class="single_line" id="DD_4">
            	<div class="fifty_fifty dd">
                	<div class="left">
                    	DD No
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput">
                        	<?php echo $this->Form->input('dd4',array('label'=>false,'type'=>'number','id'=>'ddno_4','disabled','class'=>'DD_Payment','value'=>(!empty($ddno)?$ddno['ddno4']:'')));?>
                        </div>
                    </div>
                </div>
                
                <div class="fifty_fifty dd">
                	<div class="left">
                    	Amount
                    </div>	
                    
                    <div class="right">
                    	<div class="ddinput">
                        	<?php echo $this->Form->input('dd4_amount',array('label'=>false,'type'=>'number','id'=>'ddamt_4','disabled','class'=>'DD_Payment','value'=>(!empty($ddamount)?$ddamount['dd4']:'')));?>
                        </div>
                    </div>	
                </div>
            </div>           
            
        </div>
        
        
         <div id="submit">   
            <?php echo $this->Form->input('candidateID',array('label'=>false,'type'=>'hidden','value'=>$d['candidateID']));?> 
            <?php echo $this->Form->input('name',array('label'=>false,'type'=>'hidden','value'=>$d['name']));?> 			
          	<div id="Subm"><?php 
			 $option=array('value'=>'Submit','id'=>'submit_pay');echo $this->Form->end($option);?></div>
			 <?php endforeach;?>
        </div> 
        
    </div>
  </div>
 
  
</div>

