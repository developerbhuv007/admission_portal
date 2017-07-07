<?php ?>
<div id="body">
  <div id="main_head">
     <div class="upper_three_Div" id="operater_name">
     	<?php echo $this->Session->read('User.name');?>
      <button type="button" id="updateyear" class="btn btn-success" style="margin-left: 20px">Update Records</button>
     </div>
     <?php 
     if ($this->Session->read('User.role') != "student"){ ?>
       <div class="upper_three_Div">	
          <input type="text" id="search_q" placeholder="Search..." list="drop_search">
    	    <datalist id="drop_search"></datalist>
       </div>
     
     <div class="upper_three_Div rightDiv">
      <button type="button" id="RegistrationModelBtn" class="btn btn-success"  data-toggle="modal" data-target="#myModal">Add Staff Member</button>

      <a href="/fetadmissions/admin_panel" style="padding-left: 20px"><img src="/img/admin.ico" style="height: 35px"></a>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add New Member</h4>
            </div>
            <form>
              <div class="modal-body addMemberFormDiv col-xs-offset-1 col-xs-10">                
                  <div class="form-group">
                    <input type="text" name="name" id="nameText" class="form-control" placeholder="Enter The Name">
                  </div>
                  <div class="col-xs-12 errorDiv">
                    <span class="ErrMsgSpan" id="AddMemberName">Please fill this</span>
                  </div>                  
                  <div class="form-group">
                    <select class="form-control" id="departmentText">
                      <option value="">--Select Department--</option>
                      <option value="cse">CSE</option>
                      <option value="ecs">ECS</option>
                      <option value="eee">EEE</option>
                      <option value="eme">EME</option>
                      <option value="math">Math</option>
                      <option value="chemistry">Chemistry</option>
                      <option value="physics">Physics</option>
                      <option value="management">Management</option>
                      <option value="nonteachingstaff">Non Teaching Staff</option>
                    </select>
                  </div>
                  <div class="col-xs-12 errorDiv">
                    <span class="ErrMsgSpan" id="AddMemberDepartment">Please select</span>
                  </div>
                  <div class="form-group">
                    <input type="email" id="emailText" name="email" class="form-control" placeholder="Enter The Email">
                  </div>
                  <div class="col-xs-12 errorDiv">
                    <span class="ErrMsgSpan" id="AddMemberEmail">Please Enter Correct Email </span>
                  </div>
                  <div class="form-group">
                    <input type="text" id="contactText" name="phone" class="form-control" placeholder="Enter The Contact Number">
                  </div> 
                  <div class="col-xs-12 errorDiv">
                    
                  </div>             
              </div>
              <div class="modal-footer">
                <button type="button" id="addMemberClose" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="addMemberSubmit" class="btn btn-worning">
                  ADD <span class="loadingImg"><img src="/img/loading.gif" height="25px" width="25px"></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
     	<div class="button"><a href="/fet-profiler/logout" style="text-decoration:none;color:white">Logout</a></div>
        <div class="button">
        <a href="<?php if($this->Session->read('User.role')=="admin"){echo '/fet-profiler';}else if($this->Session->read('User.role')=='student'){echo '/fet-profiler/student';} else if($this->Session->read('User.role')=='faculty') {echo '/fet-profiler/faculty';} else{echo '/';}?>" style="text-decoration:none;color:white">Home</a></div>
     </div>
     
      
  </div>
  

  
  <div id="headr_pic">
  </div>
  
 
  
 
  
</div>