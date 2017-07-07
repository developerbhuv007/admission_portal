<?php ?>
<div id="slip_no_div"><?php foreach($off_info as $off):?>Slip No : <?php echo $off['candidateID'];?></div>
<div id="body">
 <div class="head"></div>
 <div id="payment_slip_div"><U><?php
							   echo "Admission Cum Payment Slip(".date('Y')."-".(date('Y')+1).")" ;?></U></div>
 <div id="both_div">
 	<div id="left">
    	<div class="one_line" style="margin:0 !important;">
        	<div class="label">Form no.</div>
            <div class="strong">:</div>
            <div class="text"><?php echo $off['formno']; endforeach;?></div>
        </div>
    	<div class="one_line">
        	<div class="label">Name of Candidate</div>
            <div class="strong">:</div>
            <div class="text"><?php foreach($per_info as $per): echo $per['name'];?></div>
        </div>
        
        <div class="one_line">
        	<div class="label">Father's Name</div>
            <div class="strong">:</div>
            <div class="text"><?php echo $per['fathersname'];?></div>
        </div>
        
        <div class="one_line">
        	<div class="label">D.O.B</div>
            <div class="strong">:</div>
            <div class="text"><?php echo $per['dob']; endforeach;?></div>
        </div>
        
        <div class="one_line">
        	<div class="label">Branch Alloted by JOSSA</div>
            <div class="strong">:</div>
            <div class="text"><?php foreach($off_info as $off): echo $off['ccbbranch'];?></div>
        </div>
        
        <div class="one_line">
        	<div class="label">JEE (Main) Roll No</div>
            <div class="strong">:</div>
            <div class="text"><?php echo $off['jeerollno'];?></div>
        </div>
        
        <div class="one_line">
        	<div class="label">JEE (Main) Rank</div>
            <div class="strong">:</div>
            <div class="text"><?php echo $off['jeerank'];?></div>
        </div>
        
        <div class="one_line">
        	<div class="label">Category</div>
            <div class="strong">:</div>
            <div class="text"><?php echo $off['category'];?></div>
        </div>
        
        <div class="one_line">
        	<div class="label">Alotted In Category</div>
            <div class="strong">:</div>
            <div class="text"><?php echo $off['allotedcategory']; endforeach;?></div>
        </div>
    </div>
    
    <div id="right" style="position:relative;">
    <?php if($this->Session->read('User.role')=='dataentry'){?>
    	<div id="document_list" style="position:absolute; display:block;">
        	<div id="tab">List of Documents Not Submitted</div>
           
            <?php $i=1;foreach($docs as $d): 
			              foreach($d as $k=>$v):?>
            <?php if($v==0) {  echo "<div class='oneline'>".$i++;}?>
            	<?php if($v==0){ echo "<div class='content'>".$k."</div></div>";}?>
          
            <?php endforeach;?>
            <?php endforeach;?>
        </div>
        <?php }  else{ ?>
    	<div id="fee_details" style="position:absolute; display:block;">
            <div class="one_line" style="margin-top:0 !important;">Fee Details</div>
            
            <div class="one_line2">
            	<div class="label">RC(Reporting Centre)</div>
                <div class="strong">:</div>
                <div class="text">Rs 40000</div>	
            </div>
            
            <div class="one_line2">
            	<div class="label">College Fees</div>
                <div class="strong">:</div>
                <div class="text"><?php 
                //print_r($payment);exit();
                foreach($payment as $pay): echo "Rs 63150";?></div>	
            </div>
            
            <div class="one_line2">
            	<div class="label">Hostel Fees</div>
                <div class="strong">:</div>
                <div class="text"><?php echo "Rs 21000";?></div>	
            </div>
            
            <div class="one_line2">
            	<div class="label">Total</div>
                <div class="strong">:</div>
                <div class="text"></div>	
            </div>
            
            <div class="one_line" style="margin-top:5px;">Payment Details</div>
        <?php if($pay['cashamount']!=''){
            echo "<div id='ddwithcash'>
            	<div class='fifity' style='font-weight:bold;'>Cash</div>	
                <div class='fifity' style='font-size:14px !important;'>Rs.".$pay['cashamount']."</div> </div>";}?>	
           
           <?php echo  "<div id='dd_plus_amount'>";?> 
          <?php if($pay['ddno']!=NULL){
			  echo  "<div class='fifty'>
                	<div class='dd_no common'>DD Number</div>";}
				foreach(json_decode($pay['ddno']) as $dd){	
                    echo "<div class='dd_no'>".$dd."</div>";}
					echo "</div>";?>
                   
                <?php if($pay['ddamount']!=NULL){
					
                echo "<div class='fifty'>
                	<div class='dd_amount  common'>DD Amount</div>";}
					foreach(json_decode($pay['ddamount']) as $amt){
                    echo "<div class='dd_amount'>".$amt."</div>";}
					echo  "</div>";?>
                   
               
            <?php echo "</div>"; endforeach;?>
                     
        </div>
       <?php }?>
    </div>
    
 </div>
 
 <div id="signature">
 	<div class="big_one">
    	<div class="three_div">Checked By</div>
        <div class="three_div">Convener</div>
        <div class="three_div">Dean</div>
    </div>
    <div class="big_one" style="margin-top:5px;">
    	<div class="three_div"></div>
        <div class="three_div">Admission Committe</div>
        <div class="three_div">FET</div>
    </div>
 </div>
 
 <div id="two_condition">
 	<div class="one_Line" style="margin-top:40px;">
    	<div class="noodcondtion">1.</div>
        <div class="content">
                If any information furnished by the candidate is found incorrect at any time during his stay in the  Vishwavidyalaya his admission will be cancelled without any prior information.
        </div>
    </div>
    
    <div class="one_Line" style="margin-top:9px;">
    	<div class="noodcondtion">2.</div>
        <div class="content">
        		Upgradation of branch is posible in accordance with rules made JOSSA New Delhi. Thos will be done through choices
mentioned in application form of FET.
        </div>
    </div>
 </div>
 
 <div id="div_horizontel_line"></div>
 <div id="head">Process of Fee Depostion and Configuration of Admission.</div>
 
 <div id="lower_first_condition">
 	<div id="ONE_left">1.</div>
    <div id="ONE_right">The Candidate will hand over the admission slip (in duplicate) at fee counter and get three copies of bank slip from there. After this the Candidate will deposit the fee at PNB,Singhdwar, Gurukul Kangri Vishwavidyalya. Haridwar or at in
admission cell.
	</div>
 </div>
 
 
	<div class="ONE_LINE">
    	<div class="LEFT">2.</div>
        <div class="RIGHT">The Bank will return two copies of deposit formss (clearly showing the receipt of fee). Out of these two copies, one copy should be submitted at fee counter and collect one copy of admission slip (Second copy there).
        </div>
    </div> 
    
    <div class="ONE_LINE">
    	<div class="LEFT">3.</div>
        <div class="RIGHT">The Candidate will return this admission slip and will show the remaining copy of bank receipt to the office undersigned. Otherwise his admission shall not be treated as confirmed.
        </div>
    </div> 
    
    <div class="ONE_LINE">
    	<div class="LEFT">4.</div>
        <div class="RIGHT">The candidate will also have to fill up the admission form , registration form , and examintion form (to be taken from the fee counter) and submit to the office of undersigned.
        </div>
    </div> 
    
    <div class="last_lower">
    	<div class="fifty" style="text-indent:100px;">Date:</div>
        <div class="fifty" style="text-indent:250px;">Dean</div>
    </div>
    
    <div id="last_lower2">
    	<div class="fifty"></div>
        <div class="fifty" style="text-indent:253px;">FET</div>
    </div>	
 
</div>