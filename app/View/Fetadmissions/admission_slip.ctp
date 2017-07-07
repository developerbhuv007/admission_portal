<?php ?>
<div id="slip_no_div"><?php foreach($off_info as $off):?>Slip No : <?php echo $off['candidateID'];?></div>
<div id="body">
 <div class="head"></div>
 <div id="payment_slip_div"><U><?php
							   echo "Admission Slip(".date('Y')."-".(date('Y')+1).")" ;?></U></div>
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
    <?php if($this->Session->read('User.role')=='dataentry' || $this->Session->read('User.role')=='admin'){?>
      <?php
      $check=0;
      foreach ($docs[0] as $key => $value) {
           if($value==0){
            $check++;
           }
       } 
      if($check!=0){?>
    	<div id="document_list" style="position:absolute; display:block;">
        	<div class="content_documentNot">
                <div id="tab">List of Documents Not Submitted</div>
           
                        <?php $i=1;foreach($docs as $d): 
                                      foreach($d as $k=>$v):?>
                        <?php if($v==0) {  echo "<div class='oneline'>".$i++;}?>
                            <?php if($v==0){ echo "<div class='content'>".$k."</div></div>";}?>
                      
                        <?php endforeach;?>
                        <?php endforeach;?>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
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
                If any information furnished by the candidate is found incorrect at any time duuring his stay in the  Vishwavidyalaya his admission will be cancelled without any prior information.
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








<div id="Second_body">
 <div class="head"></div>
    <div class="bothdiv col-xs-12">
       <div class="left">
            <div class="studentName">Dear Mr. <span class="span_Name"><?php echo $per_info[0]['name'];?></span></div>
            <div class="studentName">S/o Shri. <span class="span_Name"><?php echo $per_info[0]['fathersname'];?></span></div>
            <div class="studentName"><span class="span_add"><?php echo $per_info[0]['streetaddress'];?></span></div>
            <div class="studentName"><span class="span_add"><?php echo $per_info[0]['city'];?></span></div>
            <div class="studentName"><span class="span_add"><?php echo $per_info[0]['state'];?></span></div>
            <div class="studentName">Pin <?php echo $per_info[0]['pincode'];?></div>
            <div class="studentName">Phone <?php echo $per_info[0]['phone'];?></div>
       </div>
       <div class="right">
            Date : &nbsp <span><?php echo $off_info[0]['admdate'];?></span>
       </div>
    </div>
 
    <div class="conrg">Congratulation on being a student of one of the historical institution of the country.</div>

    <div class="firstText">
        This admission letter for admission to B.Tech. First year is issued to you after completing all the formalities of admission in faculty and Technology, Gurukula Kangri Vishwavidyalaya, Haridwar. The details of annual fee applicable to you is as follows:
    </div>

    <div class="branch"><strong>Branch: </strong><?php echo $off_info[0]['gkvbranch'];?></div>
    <div class="yeardiv">
        <div class="whichYear">First Year</div> <div class="yearText">at the time of admission</div> <div class="yearFees">Rs 63150/-</div>
    </div>
    <div class="yeardiv">
        <div class="whichYear">Second Year</div> <div class="yearText">upto 20 July of that year</div> <div class="yearFees">Rs 59150/-</div>
    </div>
    <div class="yeardiv">
        <div class="whichYear">Third Year</div> <div class="yearText">upto 20 July of that year</div> <div class="yearFees">Rs 59150/-</div>
    </div>
    <div class="yeardiv">
        <div class="whichYear">Fourth Year</div> <div class="yearText">upto 20 July of that year</div> <div class="yearFees">Rs 59150/-</div>
    </div>

    <div class="seconfText">
        This fee detail does not include hostel and mess expenses.
    </div>

    <div class="thirdText">
        You have to report in proper uniform on July 27, <?php echo date('Y');?> at 10:00 AM at Faculty Of Engineering And Technology, 10 km Haridwar-Delhi Marg, near Shanidev Mandir,Shraddhanandpuram, Bahadrabad.<br>
        Also bring original Character Certificate from the Head of Institution last attended, Transfer Certificate,
        Migration Certificate [if applicable] at the time of reporting for attending the class.
    </div>

    <div class="signaturediv">
        <div class="convener"><strong>Convener</strong></div>
        <div class="convener1"><strong>Admission Committee-FET</strong></div>
    </div>
</div>