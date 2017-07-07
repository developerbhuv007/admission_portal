<div id="wrapper">
	<div id="leftBar">
		<div id="studentImage">
			<div id="image">
				<img src="/app/webroot/img/user.png" alt="student name">
			</div>
			<div id="studentDetails" class="col-xs-12">
				<div class="username"><?php echo $studentRecord['data_entry']['name'];?></div>
			</div>
		</div>
		<div id="tabsStudent" class="col-xs-12">
			<div class="tabStudentInfo tabStudent" id="studentInfo">Basic Info</div>
			<!-- <div class="tabStudentInfo tabAttendance" id="studentAttentdance">Attendance</div> -->
		</div>
	</div>
	<div id="rightBar">
		<div class="tab-content basicInfo col-xs-12" id="studentInfobox">
			<div id="title" class="col-xs-12 text-left">
				About
				<div class="AboutunderLine"></div>
				<?php if($this->Session->read('User.role')!="student"){?>
				<div class="edit-btn buttons">
					<button class="btn btn-success">EDIT <i class="fa fa-pencil"></i></button>
				</div>
				<?php }else{?>
				<div class="student-edit-btn buttons">
					<button class="btn btn-success">EDIT <i class="fa fa-pencil"></i></button>
				</div>
				<?php }?>
				<div class="update-btn buttons">
					<button class="btn btn-warning" data-candidateID="<?php echo $studentRecord['data_entry']['candidateID'];?>" data-id="<?php echo $studentRecord['data_entry']['id'];?>">UPDATE <i class="fa fa-check"></i></button>
				</div>
				<div class="smsStudent">
					<button class="btn-primary" id="smsStudent" data-toggle="modal" data-target="#smsModal">Send SMS</button>
				</div>
				<div class="emailStudent">
					<button class="btn-danger" id="emailStudent" data-toggle="modal" data-target="#emailModal">Send Email</button>
				</div>
			</div>
			<div class="main-details col-xs-12">
				<div class="leftHalf col-xs-6">
					<div id="EnrollmentNo" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Enrollment number :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila col-xs-12"><?php echo $studentRecord['data_entry']['enrollmentnumber'];?></span>
						</div>	
					</div>
					<div id="nameStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Name :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['name'];?></span>
						</div>
					</div>
					<div id="nameFather" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Father's Name :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['fathersname'];?></span>
						</div>
					</div>
					<div id="nameMother" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Mother's Name :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['mothersname'];?></span>
						</div>
					</div>
					<div id="dob" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Date of Birth:</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['dob'];?></span>
						</div>
					</div>
					<div id="catergoryStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Category :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail col-xs-12"><?php echo $studentRecord['off']['allotedcategory'];?></span>
						</div>
					</div>
					<div id="contactStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Your Contact :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['phone'];?></span>
						</div>
					</div>
					<div id="emailStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Email :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['email'];?></span>
						</div>
					</div>
					<div id="addressStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Current Address :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['currentaddress'];?></span>
						</div>
					</div>
				</div>
				<div class="rightHalf col-xs-6">
					<div id="dateAdmission" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Admission Date :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail col-xs-12"><?php echo $studentRecord['off']['admdate'];?></span>
						</div>
					</div>
					<div id="currentYear" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Current Year :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail col-xs-12"><?php echo $studentRecord['data_entry']['year'];?></span>
						</div>
					</div>
					<div id="branchStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Branch :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['off']['gkvbranch'];?></span>
						</div>
					</div>
					<div id="contactFather" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Father's Contact :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">

							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['fatherscontact'];?></span>
						</div>
					</div>
					<div id="streetAddress" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">Street Address :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['streetaddress'];?></span>
						</div>
					</div>
					<div id="cityHome" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">City :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['city'];?></span>
						</div>
					</div>
					<div id="stateStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">State :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['state'];?></span>
						</div>
					</div>
					<div id="pinStudent" class="col-xs-12 details">
						<div class="InfoLabelDiv col-xs-6">
							<span class="titleLabel">ZIP :</span>
						</div>
						<div class="InfoTextDiv col-xs-6">
							<span class="contentDetail contentDetaila contentDetails col-xs-12"><?php echo $studentRecord['data_entry']['pincode'];?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="tab-content attendance col-xs-12" id="studentAttentdancebox">
			Attendance
		</div> -->
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