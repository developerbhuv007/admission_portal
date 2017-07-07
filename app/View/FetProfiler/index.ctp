<div id="wrapper">
	<div id="selection-bar" class="col-xs-12">
		<div id="student-teacher-selector" class="col-xs-2 text-center">
			<div class="btn-group">
			  <button type="button" class="btn btn-primary mainLabel" id="studentLabel" data-value="student"><span class="memberType">Student List</span></button>
			  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a href="#" class="member" data-member="student">Student List</a></li>
			    <li><a href="#" class="member" data-member="staff">Staff List</a></li>
			  </ul>
			</div>
		</div>
		<div id="department-selector" class="col-xs-4 text-center">
			<div class="btn-group">
			  <button type="button" class="btn btn-warning mainLabel" id="departmentLabel" data-value="all">Department : <span class="departmentName">All</span></button>
			  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a href="#" class="department" data-department="all">All</a></li>
			    <li><a href="#" class="department" data-department="cse">CSE</a></li>
			    <li><a href="#" class="department" data-department="ece">ECE</a></li>
			    <li><a href="#" class="department" data-department="ee">EE</a></li>
			    <li><a href="#" class="department" data-department="me">ME</a></li>
			    <li><a href="#" class="department" data-department="maths">Maths</a></li>
			    <li><a href="#" class="department" data-department="chemistry">Chemistry</a></li>
			    <li><a href="#" class="department" data-department="physics">Physics</a></li>
			    <li><a href="#" class="department" data-department="nonteachingstaff">Non Teaching Staff</a></li>
			  </ul>
			</div>
		</div>
		<div id="year-selector" class="col-xs-2 text-center">
			<div class="btn-group">
			  <button type="button" class="btn btn-warning mainLabel" id="yearLabel" data-value="all">Year : <span class="yearName">All</span></button>
			  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a href="#" class="year" data-year="all">All</a></li>
			    <li><a href="#" class="year" data-year="1">First</a></li>
			    <li><a href="#" class="year" data-year="2">Second</a></li>
			    <li><a href="#" class="year" data-year="3">Third</a></li>
			    <li><a href="#" class="year" data-year="4">fourth</a></li>
			    <li><a href="#" class="year" data-year="0">Alumni</a></li>
			  </ul>
			</div>
		</div>
		<div id="branch-selector" class="col-xs-2 text-center">
			<div class="btn-group">
			  <button type="button" class="btn btn-success mainLabel" id="branchLabel" data-value="all">Branch : <span class="branchName">All</span></button>
			  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a href="#" class="branch" data-branch="all">All</a></li>
			    <li><a href="#" class="branch" data-branch="CSE">CSE</a></li>
			    <li><a href="#" class="branch" data-branch="EE">EE</a></li>
			    <li><a href="#" class="branch" data-branch="ME">ME</a></li>
			    <li><a href="#" class="branch" data-branch="ECE">ECE</a></li>
			  </ul>
			</div>
		</div>
		<div id="category-selector" class="col-xs-3 text-center">
			<div class="btn-group">
			  <button type="button" class="btn btn-danger mainLabel" id="categoryLabel" data-value="all">Category : <span class="categoryName">All</span></button>
			  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a href="#" class="category" data-category="all">All</a></li>
			    <li><a href="#" class="category" data-category="GEN">GEN</a></li>
			    <li><a href="#" class="category" data-category="SC">SC</a></li>
			    <li><a href="#" class="category" data-category="OBC">OBC</a></li>
			    <li><a href="#" class="category" data-category="ST">ST</a></li>
			    <li><a href="#" class="category" data-category="GEN-PH">GEN-PH</a></li>
			    <li><a href="#" class="category" data-category="OBC-PH">OBC-PH</a></li>
			    <li><a href="#" class="category" data-category="SC-PH">SC-PH</a></li>
			    <li><a href="#" class="category" data-category="ST-PH">ST-PH</a></li>
			  </ul>
			</div>
		</div>
		<div class="smsStudent">
			<button class="btn-primary" id="smsStudent" data-toggle="modal" data-target="#smsModal">Send SMS
			</button>
		</div>
		<div class="emailStudent">
			<button class="btn-danger" id="emailStudent" data-toggle="modal" data-target="#emailModal">Send Email
			</button>
		</div>
		<div class="smsStaff">
			<button class="btn-primary" id="smsStaff" data-toggle="modal" data-target="#smsModal">Send SMS
			</button>
		</div>
		<div class="emailStaff">
			<button class="btn-danger" id="emailStaff" data-toggle="modal" data-target="#emailModal">Send Email
			</button>
		</div>
	</div>
	<div id="records-table" class="col-xs-12">
		<div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		        <th>S.No.</th>
		        <th>Name</th>
		        <th>Year</th>
		        <th>Branch</th>
		        <th>Category</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		      $i = 0;
		      foreach($studentData as $studentRecord):
		      $i++;
		    ?>
		      <tr>
		        <td class="emailSmsStudent" data-email="<?php echo $studentRecord['data_entry']['email'];?>" data-sms="<?php echo $studentRecord['data_entry']['phone'];?>"><?php echo $i;?></td>
		        <td><a href="/fet-profiler/students/<?php echo $studentRecord['data_entry']['candidateID'];?>"><?php echo $studentRecord['data_entry']['name'];?></a></td>
		        <td><?php echo $studentRecord['data_entry']['year'];?></td>
		        <td><?php echo $studentRecord['off']['gkvbranch'];?></td>
		        <td><?php echo $studentRecord['off']['allotedcategory'];?></td>
		      </tr>
		     <?php endforeach;?>
		    </tbody>
		  </table>
		  </div>
	</div>
	<div id="records-table-staff" class="col-xs-12">
		<div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		        <th>S.No.</th>
		        <th>Name</th>
		        <th>Department</th>
		      </tr>
		    </thead>
		    <tbody>
		     
		    </tbody>
		  </table>
		  </div>
	</div>
</div>

<div class="modal fade" id="smsModal" role="dialog">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Send SMS</h4>
	    </div>
	    <div class="modal-body">
	      	<div class="form-group">
			  <label for="smsContent">SMS Content</label>
			  <textarea class="form-control" rows="5" id="smsContent"></textarea>
			</div>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-value="student" id="smsSendBtn">Send SMS
	      <span class="loadingImg"><img src="/img/loading.gif" height="25px" width="25px"></span>
	      </button>
	    </div>
	  </div>
	</div>
</div>
<div class="modal fade" id="emailModal" role="dialog">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Send Email</h4>
	    </div>
	    <div class="modal-body">
	    	<div class="form-group">
			  <label for="emailSubject">Email Subject</label>
			  <input type="text" class="form-control" id="emailSubject">
			</div>
	      	<div class="form-group">
			  <label for="emailContent">Email Body</label>
			  <textarea class="form-control" rows="5" id="emailContent"></textarea>
			</div>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-value="student" id="emailSendBtn">Send Email
	      <span class="loadingImg"><img src="/img/loading.gif" height="25px" width="25px"></span>
		  </button>
	    </div>
	  </div>
	</div>
</div>