<?php ?>
<div id="body">
  <div id="main_head">
     <div class="upper_three_Div" id="operater_name">
     	<?php echo $this->Session->read('User.name');?>
     </div>
     
     <div class="upper_three_Div">
     	
        <input type="text" id="search_q" placeholder="Search..." list="drop_search">
  	    <datalist id="drop_search"></datalist>
     </div>
     
     <div class="upper_three_Div">
     	<div class="button"><a href="/fetadmissions/logout" style="text-decoration:none;color:white">Logout</a></div>
        <div class="button">
        <a href="<?php if($this->Session->read('User.role')=="admin"){echo '/fetadmissions/admin_panel';}else if($this->Session->read('User.role')=='dataentry'){echo '/fetadmissions/data_entry';} else if($this->Session->read('User.role')=='paymentgateway') {echo '/fetadmissions/payment';} else{echo '/login';}?>" style="text-decoration:none;color:white">Home</a></div>
        <a href="/fet-profiler" style="padding-left: 20px"><img src="/img/admin.ico" style="height: 35px"></a>
     </div>
     
      
  </div>
  

  
  <div id="headr_pic">
  </div>
  
 
  
 
  
</div>