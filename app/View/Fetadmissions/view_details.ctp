<?php ?>
<div id="topbar">	
</div>

<div id="main_div">
	<div id="about">ABOUT 
    <div id="button_slip"><?php foreach($official as $off_detail):?><a href="/fetadmissions/fee_slip/<?php echo $off_detail['candidateID']; ?>" target="_blank"><?php echo $this->Form->button('Fee Slip',array('id'=>'slip_print'));?></a>
    </div>
    <?php if(!($this->Session->read('User.role')=='dataentry')){?>
    <div id="admissionCumPaymentSlip" style="float: right;"><a href="/fetadmissions/admissionCumPaymentSlip/<?php echo $off_detail['candidateID']; ?>" target="_blank"><button id="admission_cum_payment_slip" type="submit">Payment Silp</button></a>
    </div>
    <?php }if(!($this->Session->read('User.role')=='paymentgateway')){?>

    <div id="admissionSlip" style="float: right;margin-right: 12px;"><a href="/fetadmissions/admission_slip/<?php echo $off_detail['candidateID']; ?>" target="_blank"><button id="admission_slip" type="submit">Admission Slip</button></a>
    </div>
    <div id="edit" style="float: right;margin-right: 30px;width: 20px;"><a href="/fetadmissions/editData/<?php echo $off_detail['candidateID']; ?>"><button id="edit_detail" type="submit">Edit</button></a>
    </div>
    <!-- <div id="withdraw" style="float: right;margin-right: 12px;"><a href="/fetadmissions/studentWithdrawal/<?php echo $off_detail['candidateID']; ?>" target="_blank"><button id="admission_slip" type="submit">Withdraw</button></a>
    </div> -->
    <?php } ?>
</div>
    <div class="undder_main">
    	<div class="unnder_upper">
        	<div id="pic_name">
            	<div id="pic"><img src="../../img/defaultphoto.gif"/></div>
                <div id="name"><?php echo $off_detail['name'];?></div>
            </div>
            
            <div id="gkv_info">
            	<div id="tab">GKV Information</div>
                <div class="one_line">
                	<div class="label">Slip No</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['candidateID']; ?></div>
                </div>
                
                <div class="one_line">
                	<div class="label">Form No</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['formno']; ?></div>
                </div>
                
                <div class="one_line">
                	<div class="label">Alloted Category</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['allotedcategory']; ?></div>
                </div>
                
                <div class="one_line">
                	<div class="label">Branch Alloted By GKV</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['gkvbranch']; ?></div>
                </div>                
                
                <div class="one_line">
                	<div class="label">Admission Date</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['admdate']; ?></div>
                </div>
            </div>
        </div>
        
        <div class="vertical_line">
        </div>
        
        <div class="unnder_lower">
            <div id="aieee_info">
            	<div id="tab">AIEEE Information</div>
                 <div class="one_line">
                	<div class="label">AIEEE Roll No</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['jeerollno']; ?></div>
                </div>
                
                <div class="one_line">
                	<div class="label">All India Rank</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['jeerank']; ?></div>
                </div>
                
                <div class="one_line">
                	<div class="label">Branch Alloted By CCB</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $off_detail['ccbbranch'];?></div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="div_line">
    </div>
    
    <div class="undder_main">
    	<div class="unnder_upper" id="right">
        	<div id="tab">Basic Information</div>
            <div class="one_line">
                	<div class="label">Name</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo $off_detail['name']; 
					                        endforeach;?></div>
            </div> 
            
            <div class="one_line">
                	<div class="label">Fathers Name</div>
                    <strong>:</strong>
                    <div class="get_text"><?php foreach($personal as $personal_detail): 
					                         echo  $personal_detail['fathersname']; ?></div>
            </div> 
            
            <div class="one_line">
                	<div class="label">Mothers Name</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo $personal_detail['mothersname']; ?></div>
            </div> 
            
            <div class="one_line">
                	<div class="label">Date of Birth</div>
                    <strong>:</strong>
                    <div class="get_text"><?php echo  $personal_detail['dob']; 
					                             endforeach;?></div>
            </div> 
            
            <div class="one_line">
                	<div class="label">Category</div>
                    <strong>:</strong>
                    <div class="get_text"><?php foreach($official as $off_detail):
					                             echo $off_detail['category'];
												 endforeach;?></div>
            </div>                  
        </div>
        
        <div class="vertical_line">
        </div>
        
        <div class="unnder_lower" id="right_lower">
        	<div id="tab">Contact Details</div>
            
            <div class="one_line">
                	<div class="label">Contact No</div>
                    <strong>:</strong>
                    <div class="get_text"><?php foreach($personal as $personal_detail):
					                           echo $personal_detail['phone'];?></div>                    
            </div>
            
            <div id="add">
            <div class="one_line">
                	<div class="label">Address</div>
                    <strong>:</strong>
                    <div class="get_text"><?php  echo $personal_detail['streetaddress'];?></div>                    
            </div>
            </div>
            
            <div class="one_line">
                	<div class="label">City</div>
                    <strong>:</strong>
                    <div class="get_text"><?php  echo $personal_detail['city'];?></div>                    
            </div>
            
            <div class="one_line">
                	<div class="label">State</div>
                    <strong>:</strong>
                    <div class="get_text"><?php  echo $personal_detail['state'];?></div>                    
            </div>
            
            <div class="one_line">
                	<div class="label">Pincode</div>
                    <strong>:</strong>
                    <div class="get_text"><?php  echo $personal_detail['pincode'];
					                              endforeach;?></div>                    
            </div> 
        </div>

    </div>
</div>
  
</div>

  
 