<?php  ?>
 <div class="middle"> 
 <div  class='topupper'>
   <table>
   
   <tr>
    <td style="margin-left:-210px;width:400px;text-align:left;"><a href="operator_registration">Register New Operator</a></td>
    <td style="margin-left:80px;width:400px;text-align:center;"><?php echo $this->Session->read('User.name');?></td>
    
    <td ><a href="/fet-profiler" style="padding-left: 20px;float: left;"><img src="/img/admin.ico" style="margin-top: -8px;height: 28px;"></a><a href="logout" style="float: right;margin-top: -26px;">Logout</a></td>
    </tr>
   </table>
 
 </div>
 

 <div class='view_head'></div>

<div id="main_div">
	<div id="tab">
    	<div class="admin_search">
        	<input type="text" id="search_q" list="drop_search" placeholder="Search..." name="searchval" autofocus x-webkit-speech /input>
            
            <datalist id="drop_search">
            </datalist>
        </div>
    </div>
    
    <div id="buttons_div">
    	<div class="button_tab">
        	<a href="data_entry"><?php echo $this->Form->button('<span class="btn-icon"><i class="fa fa-pencil-square-o"></i></span><br><span class="btn-text">Data Entry</span>',array('label'=>false,'id'=>'data_enty'));?></a>
        </div>
        
        <!-- <div class="button_tab">
        	<a href="payment"><?php echo $this->Form->button('<span class="btn-icon"><i class="fa fa-cc-mastercard"></i></span><br><span class="btn-text">Payment Gateway</span>',array('label'=>false,'id'=>''));?></a>
        </div> -->
        
        <div class="button_tab">
        	<a href="sorted_list"><?php echo $this->Form->button('<span class="btn-icon"><i class="fa fa-sort-alpha-asc"></i></span><br><span class="btn-text">Sorted List</span>',array('label'=>false,'id'=>'srtd_list'));?></a>
        </div>
        
        <div class="button_tab">
        	<a href="check_docs"><?php echo $this->Form->button('<span class="btn-icon"><i class="fa fa-newspaper-o"></i></span><br><span class="btn-text">Document Check List</span>',array('label'=>false,'id'=>''));?></a>
        </div>
        
        <!-- <div class="button_tab">
        	<?php echo $this->Form->button('<span class="btn-icon"><i class="fa fa-database"></i></span><br><span class="btn-text">Database Backup</span>',array('label'=>false,'id'=>'db_backup'));?>
        </div> -->
        
        <!-- <div class="button_tab">
        	<a href="migrationList"><?php echo $this->Form->button('<span class="btn-icon"><i class="fa fa-paper-plane"></i></span><br><span class="btn-text">Migration List</span>',array('label'=>false,'id'=>''));?></a>
        </div> -->
    </div>
</div>