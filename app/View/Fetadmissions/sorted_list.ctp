<?php ?>

  <style type="text/css">
  .drop_down .left-margin{
      margin-left: 80px;
  }
  </style>
  
  <div id="strong">
  	<div id="strong_left">
    	<div class="drop_down" style="padding-right:80px">
        	  
            <?php echo $this->Form->input('branch', 
    array(
	   
        'options' => array('CSE' => 'CSE','ECE' => 'ECE', 'ME' => 'ME', 'EE' => 'EE'),
         'id'=>'branch',
        'empty' =>'Branch : All',
        'label' => false,
	    'class'=>'form-control left-margin',
    )
);?> 
        </div>
        
        <div class="drop_down" style="padding-left:55px">
        	  
            <?php echo $this->Form->input('category', 
    array(
        'options' => array( 'GEN' => 'GEN','OBC' => 'OBC', 'SC' => 'SC', 'ST' => 'ST', 'GEN-PH' => 'GEN-PH','OBC-PH' => 'OBC-PH', 'SC-PH' => 'SC-PH', 'ST-PH' => 'ST-PH', ),           
        'id'=>'cat',
		'empty' =>'Category : All',
        'label' => false,
        'class'=>'form-control',

	)
);?> 
        </div>
        <div class="drop_down">
        <!-- <form action="" method="post">            
                <select id="control_1" class="cat" name="control_1[]" multiple="multiple" size="5">
                   
                    <optgroup label="Select the fields">
                        <option value="Name" class="cat">Name</option>
                        <option value="option_4" class="cat">Slip No</option>
                        <option value="option_5">JEE Roll No</option>
                        <option value="option_6">JEE Rank</option>
                        
                    </optgroup>

                </select>
        </form> -->
        </div>
    </div>
    
    <div id="strong_right">
    	<div class="button">
        	<?php //echo $this->Form->button('Download in PDF',array('id'=>'pdf'));?>
          <input type="button" value="Download in Pdf" id="pdf" class="btn btn-primary">
        </div>
        
        <div class="button">
        	<?php //echo $this->Form->end('Download in Excel');?>
            <input type="button" value="Download in Excel" id="excel"  class="btn btn-success">
        </div>
        
        <div class="button">
        	<input type="button" value="Generate Report" id="report"  class="btn btn-info">
        </div>
    </div>
  </div>
  
  <div id="strong2">
    <div id="center" style="height:30px; width:12%; margin:auto;"> No of Records :<div id='count' style="height:30px;display:block; font-weight:bold;  float:right;"><?php echo $count;?></div></div>
  </div>
  
 <?php echo $this->element('sorted');?>
  
 
  
</div>

        <script type="text/javascript">
            
            $(document).ready( function() {
                
                // Default options
                $("#control_1, #control_3, #control_4, #control_5").multiSelect();
                
                // With callback
                $("#control_6").multiSelect( null, function(el) {
                    $("#callbackResult").show().fadeOut();
                });
                
                // Options displayed in comma-separated list
                $("#control_7").multiSelect({ oneOrMoreSelected: '*' });
                
                // 'Select All' text changed
                $("#control_8").multiSelect({ selectAllText: 'Pick &lsquo;em all!' });
                
                // Show test data
                $("FORM").submit( function() {
                    $.post('result.php', $(this).serialize(), function(r) {
                        alert(r);
                    });
                    return false;
                });
                
            });
            
        </script>

        <style type="text/css">
         #search_q{
            height: 30px !important;
            
         }

        </style>
        
