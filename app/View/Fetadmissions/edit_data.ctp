<?php

  $choices=array('CSE' => 'Computer Science & Engineering (CSE)', 'ECE' => 'Electronics & Communication Engineering (ECE)','ME' => 'Mechanical Engineering (ME)', 'EE' => 'Electrical Engineering (EE)' );

  if(isset($studentDetails)){
     
    $choice2=$choice3=$choice4=array();
      $arr=json_decode($studentDetails["bchoices"],true);
      //print_r($arr);exit();
      foreach ($choices as $key => $value) {
        if($key!=$arr[1]){
         $choice2[$key]=$value;
        }
      }
      foreach ($choice2 as $key => $value) {
        if($key!=$arr[2]){
           $choice3[$key]=$value;
        }
      }
      foreach ($choice3 as $key => $value) {
        if($key!=$arr[3]){
           $choice4[$key]=$value;
        }
      }
      
  }
 ?>

  
  <div id="strong"><strong>Update the Student Details</strong>
  </div>
 <div id="main_div"> 
  <div class="EntryDiv">
      <?php echo $this->Form->create('data_entry');?>  
        <div class="field">
        	<div class="label">Form No.<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('formno',array('label'=>false,'required','type'=>'text','value'=>(isset($studentDetails)?$studentDetails["formno"]:"")));?></div>        </div> 
            
        <div class="field field_gap">
        	<div class="label">Name<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('name',array('label'=>false,'required','type'=>'text','value'=>(isset($studentDetails)?$studentDetails["name"]:"")));?></div>        </div> 
            
        <div class="field field_gap">
        	<div class="label">Father's Name<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('father_name',array('label'=>false,'required','type'=>'text','value'=>(isset($studentDetails)?$studentDetails["fathersname"]:"")));?></div>        </div>
            
        <div class="field field_gap">
        	<div class="label">Mother's Name<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('mother_name',array('label'=>false,'required','type'=>'text','value'=>(isset($studentDetails)?$studentDetails["mothersname"]:"")));?></div>        </div>
            
             
        <div class="field field_gap">
        	<div class="label">GrandFather's Name<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('grandfather_name',array('label'=>false,'required','type'=>'text','value'=>(isset($studentDetails)?$studentDetails["grandfathersname"]:"")));?></div>        </div>
            
        <div class="field field_gap">
        	<div class="label">Date of Birth<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('dob',array('label'=>false,'required','type'=>'text','placeholder'=>'DD-MM-YYYY','value'=>(isset($studentDetails)?$studentDetails["dob"]:"")));?></div>        
         </div> 
         
         
         <div class="field field_gap">
        	<div class="label">Category<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('category', 
    array(
        'options' => array('GEN' => 'GEN', 'OBC' => 'OBC','SC' => 'SC', 'ST' => 'ST', 'GEN-PH' => 'GEN-PH', 'OBC-PH' => 'OBC-PH','SC-PH' => 'SC-PH', 'ST-PH' => 'ST-PH', ),           
        'empty' =>'Select Category','required',
        'value' =>(isset($studentDetails)?$studentDetails["category"]:""),
        'label' => false,
	)
);?></div>        
         </div>     
         
         
         <div class="field field_gap">
        	<div class="label">Alloted Category<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('allotedcategory', 
    array(
        'options' => array('GEN' => 'GEN', 'OBC' => 'OBC','SC' => 'SC', 'ST' => 'ST', 'GEN-PH' => 'GEN-PH', 'OBC-PH' => 'OBC-PH','SC-PH' => 'SC-PH', 'ST-PH' => 'ST-PH', ),           
        'empty' =>'Select Category','required',
        'label' => false,
        'value' => (isset($studentDetails)?$studentDetails["allotedcategory"]:""),
	)
);?></div>        
         </div> 
         
         
         <div class="field field_gap">
        	<div class="label">JEE(Mains) Roll No<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('aieeerollno',array('label'=>false,'required','type'=>'number','value'=>(isset($studentDetails)?$studentDetails["jeerollno"]:"")));?></div>        
         </div>
         
         <div class="field field_gap">
        	<div class="label">All India Rank(AIR)<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('aieeerank',array('label'=>false,'required','type'=>'number','value'=>(isset($studentDetails)?$studentDetails["jeerank"]:"")));?></div>        
         </div> 
         
         <div class="field field_gap">
        	<div class="label">Branch Alloted By CCB<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('ccbbranch', 
    array(
        'options' => array('CSE' => 'Computer Science & Engineering (CSE)', 'ECE' => 'Electronics & Communication Engineering (ECE)','ME' => 'Mechanical Engineering (ME)', 'EE' => 'Electrical Engineering (EE)'),           
        'empty' =>'Select','required',
        'label' => false,
        'value' => (isset($studentDetails)?$studentDetails["ccbbranch"]:""),
	)
);?></div>        
         </div> 
         
         <div class="field field_gap">
        	<div class="label">Branch Alloted By GKV<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('gkvbranch', 
    array(
        'options' => array('CSE' => 'Computer Science & Engineering (CSE)', 'ECE' => 'Electronics & Communication Engineering (ECE)','ME' => 'Mechanical Engineering (ME)', 'EE' => 'Electrical Engineering (EE)' ),           
        'empty' =>'Select','required',
        'label' => false,
        'value' => (isset($studentDetails)?$studentDetails["gkvbranch"]:""),
	)
);?></div>        
         </div> 
         
         <div class="field field_gap">
        	<div class="label">Choices For Branch<strong></strong></div> 
         </div>     

		 <div class="field field_gap" style="margin-top:0px;">
        	<div class="label label_text_center">Choice 1<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('choice1', 
    array(
        'options' => $choices,
		'id'=>'choice_1',           
        'empty' =>'None',
        'value'=>(isset($studentDetails)?$arr[1]:""),
        'label' => false,
	)
);?></div>         
         </div>  
         
         <div class="field field_gap" style="margin-top:5px;">
        	<div class="label label_text_center">Choice 2<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('choice2', 
    array(
        'options' => (isset($studentDetails)?$choice2:array()),   
		'id'=>'choice_2',        
        'empty' =>'None',
        'value'=>(isset($studentDetails)?$arr[2]:""),
        'label' => false
	)
);?></div>         
         </div> 
         
         <div class="field field_gap" style="margin-top:5px;">
        	<div class="label label_text_center">Choice 3<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('choice3', 
    array(
        'options' => (isset($studentDetails)?$choice3:array()), 
		'id'=>'choice_3',          
        'empty' =>'None',
        'value'=>(isset($studentDetails)?$arr[3]:""),
        'label' => false,
	)
);?></div>         
         </div>
         
         <div class="field field_gap" style="margin-top:5px;">
        	<div class="label label_text_center">Choice 4<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('choice4', 
    array(
        'options' => (isset($studentDetails)?$choice4:array()),           
        'empty' =>'None',
        'value'=>(isset($studentDetails)?$arr[4]:""),
		'id'=>'choice_4',
        'label' => false,
	)
);?></div>         
         </div>
         
         <div class="field" style="height:95px; margin-top:10px;">
        	<div class="label" style="height:95px;">Street Address<strong style="line-height:80px">:</strong></div> 
            <div class="input" style="height:95px;"><?php echo $this->Form->input('streetaddress',array('label'=>false,'required','type'=>'textarea','value'=>(isset($studentDetails)?$studentDetails["streetaddress"]:"")));?></div>       
        </div>
        
        <div class="field field_gap">
        	<div class="label">City<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('city',array('label'=>false,'required','type'=>'text','value'=>(isset($studentDetails)?$studentDetails["city"]:"")));?></div>        </div>  
            
         <div class="field field_gap" style="margin-top:15px;">
        	<div class="label ">State<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('state', 
    array(
        'options' => array('Andaman and Nicobar Islands'=>'Andaman and Nicobar Islands', 'Andhra Pradesh'=>'Andhra Pradesh', 'Arunachal Pradesh'=>'Arunachal Pradesh', 'Assam'=>'Assam', 'Bihar'=>'Bihar', 'Chandigarh'=>'Chandigarh', 'Chhattisgarh'=>'Chhattisgarh', 'Dadra and Nagar Haveli'=>'Dadra and Nagar Haveli', 'Daman and Diu'=>'Daman and Diu', 'Delhi'=>'Delhi', 'Goa'=>'Goa', 'Gujarat'=>'Gujarat', 'Haryana'=>'Haryana', 'Himachal Pradesh'=>'Himachal Pradesh', 'Jammu and Kashmir'=>'Jammu and Kashmir', 'Jharkhand'=>'Jharkhand', 'Karnataka'=>'Karnataka', 'Kerala'=>'Kerala', 'Lakshadweep'=>'Lakshadweep', 'Madhya Pradesh'=>'Madhya Pradesh', 'Maharashtra'=>'Maharashtra', 'Manipur'=>'Manipur', 'Meghalaya'=>'Meghalaya', 'Mizoram'=>'Mizoram', 'Nagaland'=>'Nagaland', 'Orissa'=>'Orissa', 'Pondicherry'=>'Pondicherry', 'Punjab'=>'Punjab', 'Rajasthan'=>'Rajasthan', 'Sikkim'=>'Sikkim', 'Tamil Nadu', 'Tripura'=>'Tripura', 'Uttaranchal'=>'Uttaranchal', 'Uttar Pradesh'=>'Uttar Pradesh', 'West Bengal'=>'West Bengal'),           
        'empty' =>'Select a State','required',
        'value'=>(isset($studentDetails)?$studentDetails["state"]:""),
        'label' => false,
	)
);?></div>         
         </div>   

  </div>
  
  <div class="EntryDiv" style="background-color:white;">           
       
        <div class="field">
        	<div class="label">Pin Code<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('pincode',array('label'=>false,'required','type'=>'number','value'=>(isset($studentDetails)?$studentDetails["pincode"]:"")));?></div>        </div>
            
        <div class="field field_gap">
        	<div class="label">Home Phone<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('phone',array('label'=>false,'required','type'=>'number','value'=>(isset($studentDetails)?$studentDetails["phone"]:"")));?></div>        </div> 
            
        <div class="field field_gap">
        	<div class="label">Admission Date<strong>:</strong></div> 
            <div class="input"><?php echo $this->Form->input('admdate',array('label'=>false,'required','type'=>'text','placeholder'=>'DD-MM-YYYY','value'=>(isset($studentDetails)?$studentDetails["admdate"]:"")));?></div>      
        </div> 
        
        <div class="field" style="height:95px; margin-top:10px;">
        	<div class="label" style="height:95px;">Remarks<strong style="line-height:80px">:</strong></div> 
            <div class="input" style="height:95px;"><?php echo $this->Form->input('remarks',array('label'=>false,'type'=>'textarea','value'=>(isset($studentDetails)?$studentDetails["remarks"]:"")));?></div>       
        </div>  
        
        <div class="field field_gap" style="height:40px;">
        	<div class="label" style="height:40px;">Upload the Photo<strong>:</strong></div> 
            <div class="input" id="Upload"><?php echo $this->Form->upload('Upload Photo',array('type'=>'file'));?></div>        
        </div>  

		<div id="main">
        	<div id="all_one"><div id="Left"><strong>Checklist </strong> Check All</div><div id="Right"><?php echo $this->Form->input('checklist',array('label'=>false,'type'=>'checkbox','id'=>'selectall'));?></div></div>
            
             <div id="check">
            	<div class="one_line">X Marksheet</div><div class="CHBOX"><?php echo $this->Form->input('checkbox1',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["x_marksheet"]?'checked':'')));?></div>
                <div class="one_line">X Certificate</div><div class="CHBOX"><?php echo $this->Form->input('checkbox2',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["x_certificate"]?'checked':'')));?></div>
                <div class="one_line">XII Marksheet</div><div class="CHBOX"><?php echo $this->Form->input('checkbox3',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["xii_marksheet"]?'checked':'')));?></div>
                <div class="one_line">XII Certificate</div><div class="CHBOX"><?php echo $this->Form->input('checkbox4',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["xii_certificate"]?'checked':'')));?></div>
                <div class="one_line">Transfer Certificate (TC)</div><div class="CHBOX"><?php echo $this->Form->input('checkbox5',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["tc"]?'checked':'')));?></div>
                <div class="one_line">Character Certificate</div><div class="CHBOX"><?php echo $this->Form->input('checkbox6',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["character_certificate"]?'checked':'')));?></div>
                <div class="one_line">Score Card (JEE 2014)</div><div class="CHBOX"><?php echo $this->Form->input('checkbox7',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["jee_scorecard"]?'checked':'')));?></div>
                <div class="one_line">Admit Card (JEE 2014)</div><div class="CHBOX"><?php echo $this->Form->input('checkbox8',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["jee_admitcard"]?'checked':'')));?></div>
                <div class="one_line">Provisional Admission Letter</div><div class="CHBOX"><?php echo $this->Form->input('checkbox9',array('label'=>false,'type'=>'checkbox','class'=>'chbox',($studentDetails["prov_adm_letter"]?'checked':'')));?></div>
                <div style="height:84px; width:100%; border-left:1px solid black; border-right:1px solid black; margin-left:-1px;"><div class="one_line LRB">Migration Certificate ( If Applicable )</div><div class="CHBOX"><?php echo $this->Form->input('checkbox10',array('label'=>false,'type'=>'checkbox','class'=>'chbox_other',($studentDetails["migration_certificate"]?'checked':'')));?></div> 
                <div class="one_line">Reservation Category Certificate ( If Applicable )</div><div class="CHBOX"><?php echo $this->Form->input('checkbox11',array('label'=>false,'type'=>'checkbox','class'=>'chbox_other',($studentDetails["reservation_category"]?'checked':'')));?></div> 
                <div class="one_line">Gap Affidavit ( If Applicable )</div><div class="CHBOX"><?php echo $this->Form->input('checkbox12',array('label'=>false,'type'=>'checkbox','class'=>'chbox_other',($studentDetails["gap_affidavit"]?'checked':'')));?></div></div>                
            </div>
            
            
           
        </div>
        
        <div id="submit">            
          	<div id="Subm"><?php echo $this->Form->end('Submit');?></div>
        </div>  
         
        
        <script type="text/javascript">
		$('#selectall').click(function(){
			$(this.form.elements).filter(':checkbox').filter('.chbox').prop('checked',this.checked);
		});
		</script>
         
  </div>
 </div>
  
</div>