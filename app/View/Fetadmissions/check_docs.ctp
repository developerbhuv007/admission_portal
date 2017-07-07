<?php ?>

  
  
  <div id="dropboxes">
  		<div class="threeparts">
        	<div class="content">Document Status &nbsp&nbsp</div>
            <div class="dropdown">
            	 <?php echo $this->Form->create('data_entry');?>  
            <?php echo $this->Form->input('document_status', 
    array(
        'options' => array('1' => 'Complete','0' => 'Incomplete'),
		'id'=>'status',           
        'empty' =>'ALL',
        'label' => false,
        'class'=>'form-control',
	)
);?> 
            </div>
        </div>
        
        <div class="threeparts">
        	<div class="content" style="width:40%;">Document &nbsp&nbsp</div>
            <div class="dropdown" style="width:60% !important;">            	
            <?php echo $this->Form->input('document_status', 
    array(
        'options' => array('x_marksheet' => 'X Marksheet', 'x_certificate' => 'X Certificate','xii_marksheet' => 'XII Marksheet','xii_certificate' => 'XII Certificate', 'tc' => 'Transfer Certificate (TC)','character_certificate' => 'Character Certificate','jee_scorecard' => 'Score Card (JEE 2014)', 'jee_admitcard' => 'Admit Card (JEE 2014)','prov_adm_letter' => 'Provisional Admission Letter','migration_certificate' => 'Migration Certificate', 'reservation_category' => 'Reservation Category Certificate','gap_affidavit' => 'Gap Affidavit'),
		'id'=>'docs',           
        'empty' =>'ALL',
        'label' => false,
        'class'=>'form-control',
	)
);?> 
            </div>
        </div>
        
        <!-- <div class="threeparts" style="text-align:center; line-height:30px;">
        	<?php echo $this->Form->button('Download in PDF',array('class'=>'btn btn-primary'));?>
        </div> -->


  </div>
  
  <div id="strong2">
    <div id="center" style="height:30px; width:12%; margin:auto;"> No of Records :<div id='count' style="height:30px;display:block; font-weight:bold;  float:right;"><?php echo $count;?></div></div>
  </div>
  
  
 
  <div id="get_records">
  <table class="table table-bordered" style="margin:auto; font-size:18px;width:100%">
<tr>
<th>S No.</th>
<th>Slip No</th>
<th>Name</th>
<th>Alloted Branch</th>
<th>Documents Not Submitted</th>
<th>Admission Date</th>
<th>Contact No</th>
</tr>
 
<?php
$i=1;
 foreach($per_info as $data):?>
 <tr>
<td><?php echo $i++; ?></td>
<td><?php echo $data['off']['candidateID'];?></td>
<td><a href="view_details/<?php echo $data['off']['candidateID']?>" style="color:rgba(0,102,255,0.8);text-decoration:none"><?php echo $data['off']['name'];?></a></td>
<td><?php echo $data['off']['gkvbranch'];?></td>
<td style=" max-width:100px;"><?php foreach($data['docs'] as $k=>$v){
	if($v==0) 
	echo $k.' ';
	}?></td>
<td><?php echo $data['off']['admdate']; ?></td>
<td><?php echo $data['data_entry']['phone']; endforeach;?></td>
</tr>




</table>
  </div>
  
 
  
</div>

