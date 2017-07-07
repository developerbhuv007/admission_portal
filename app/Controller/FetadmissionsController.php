
<?php
ini_set('max_execution_time',-1);
ini_set('memory_limit', -1);
class FetadmissionsController extends AppController {
	
	public $components = array('RequestHandler','PhpExcel','Session');
	
    public $helpers = array('PhpExcel');

    public function admin_panel() {
		
		if (!($this->Session->read('User.profiler')))
	       {
			  $this->Session->setFlash(__('You have to login first!!'));
			  $this->redirect('/login');
	    	}	
		else if($this->Session->read('User.role')!='admin'){
			$this->Session->setFlash(__('Don\'t have permission to access this page!!'));
			  $this->redirect('/login');
		}
		$this->layout="admin_panel";

	}
	
	public function ajax_get_sugs($suggestion){
		
		$this->loadModel('data_entry_official');
		$sug=explode('=',$suggestion);
		
		$sug=$sug[1];
		
		$names=Set::extract('/data_entry_official/.',$this->data_entry_official->find('all',array('fields'=>array('name','candidateID'),'conditions'=>array('OR'=>array('name LIKE'=>
		$sug.'%','candidateID LIKE'=>$sug.'%'),'status'=>1))));
		
		//print_r($names);exit();
		echo json_encode($names);
		$this->autoRender=false;
		
	}
	
	public function data_entry($id=null) {
		
		if($this->Session->read('User.role')=='paymentgateway'){
			$this->Session->setFlash(__('Don\'t have permission to access this page!!'));
			  $this->redirect('/login');
		}

		$studentInfo=array();
		if(isset($id)){
			$this->loadModel("migrationList");
			$studentInfo=Set::extract('/migrationList/.',$this->migrationList->find("first",array("conditions"=>array("uid"=>$id,'status'=>1))));
			
		    $this->set("studentDetails",$studentInfo);
		}

		$this->layout="data_entry";
		$this->loadModel('data_entry');
		$this->loadModel('data_entry_official');
		$this->loadModel('data_entry_checkdocs');
        $this->loadModel("payment");

		if(!empty($this->data))
		{
		  $data=$this->data;
		  $data=$data['data_entry'];
		  $personal=array();
		  $sql=$this->data_entry_official->find('count');
		  $sql=$sql+16;
		  if($sql<9){
			 $personal['candidateID']="FET".date('Y')."00".($sql+1); 
		  }else if($sql<99){
			  $personal['candidateID']="FET".date('Y')."0".($sql+1); 
		  }else{
			  $personal['candidateID']="FET".date('Y').($sql+1); 
		  }
		  
		  $personal['name']=$data['name'];
		  $personal['fathersname']=$data['father_name'];
		  $personal['mothersname']=$data['mother_name'];
		  $personal['grandfathersname']=$data['grandfather_name'];
		  $personal['dob']=$data['dob'];
		  $personal['streetaddress']=$data['streetaddress'];
		  $personal['city']=$data['city'];
		  $personal['state']=$data['state'];
		  $personal['pincode']=$data['pincode'];
		  $personal['phone']=$data['phone'];
		  $personal['status']='1';
		  
		 // print_r($personal);exit();
		  $official=array();
		  $branches=array();
		  $branches['1']=$data['choice1'];
		  $branches['2']=$data['choice2'];
		  $branches['3']=$data['choice3'];
		  $branches['4']=$data['choice4'];
		  $branches=json_encode($branches);
		 // print_r($branches);exit();
		  $official['candidateID']=$personal['candidateID'];
		  $official['formno']=$data['formno'];
		  $official['name']=$personal['name'];
		  $official['category']=$data['category'];
		  $official['allotedcategory']=$data['allotedcategory'];
		  $official['jeerollno']=$data['aieeerollno'];
		  $official['jeerank']=$data['aieeerank'];
		  $official['ccbbranch']=$data['ccbbranch'];
		  $official['gkvbranch']=$data['gkvbranch'];
		  $official['bchoices']=$branches;
		  $official['admdate']=$data['admdate'];
		  $official['remarks']=$data['remarks'];
		  $official['status']='1';
		  $official['insertedby']=$this->Session->read('User.name');
		  date_default_timezone_set('Asia/Kolkata');
		  $official['insertedOn']= date ( 'Y-m-d H:i:s' );
		  $checkdocs=array();
		  $checkdocs['candidateID']=$personal['candidateID'];
		  $checkdocs['x_marksheet']=$data['checkbox1'];
		  $checkdocs['x_certificate']=$data['checkbox2'];
		  $checkdocs['xii_marksheet']=$data['checkbox3'];
		  $checkdocs['xii_certificate']=$data['checkbox4'];
		  $checkdocs['tc']=$data['checkbox5'];
		  $checkdocs['character_certificate']=$data['checkbox6'];
		  $checkdocs['jee_scorecard']=$data['checkbox7'];
		  $checkdocs['jee_admitcard']=$data['checkbox8'];
		  $checkdocs['prov_adm_letter']=$data['checkbox9'];
		  $checkdocs['migration_certificate']=$data['checkbox10'];
		  $checkdocs['reservation_category']=$data['checkbox11'];
		  $checkdocs['gap_affidavit']=$data['checkbox12'];
		   $checkdocs['status']='1';
	      $docs=array('x_marksheet','x_certificate','xii_marksheet','xii_certificate','tc','character_certificate','jee_scorecard','jee_admitcard','prov_adm_letter','migration_certificate','reservation_category','gap_affidavit');	 
	
		  foreach($docs as $k=>$v){
			  if($checkdocs[$v]==0){
				  $checkdocs['status']=0;
				  break;
			  }
		  }

		    $payment['name']=$data['name'];
		    $payment['candidateID']=$personal['candidateID'];
		    $ddno=array();
			$ddno['ddno1']='';
			$ddno['ddno2']='';
			$ddno['ddno3']='';
			$ddno['ddno4']='';
			$ddno=json_encode($ddno);
			$dd_amount=array();
			$dd_amount['dd1']='';
			$dd_amount['dd2']='';
			$dd_amount['dd3']='';
			$dd_amount['dd4']='';
			$dd_amount=json_encode($dd_amount);

		    $payment['ddno']=$ddno;
		    $payment['ddamount']=$dd_amount;

		    //print_r($checkdocs);exit();
		  if($this->data_entry_official->save($official) && $this->data_entry->save($personal) && $this->data_entry_checkdocs->save($checkdocs) && $this->payment->save($payment)){
               if(isset($id)){
			  	   $updateStatus['migrationList']=$studentInfo[0];
			  	   $updateStatus['migrationList']['status']=0;
			  	   $this->migrationList->save($updateStatus);
			  	}
              $this->Session->setFlash(__($personal['candidateID']));
		      $this->redirect('data_entry');
		  } 
		  else{
		  	  $this->Session->setFlash(__("Something error occured please try again!!"));
		  }
		}
	}

	public function editData($id=null) {
		
		if($this->Session->read('User.role')=='paymentgateway'){
			$this->Session->setFlash(__('Don\'t have permission to access this page!!'));
			  $this->redirect('/login');
		}

		$this->layout="data_entry";
		$this->loadModel('data_entry');
		$this->loadModel('data_entry_official');
		$this->loadModel('data_entry_checkdocs');

		$student_per_info=Set::extract('/data_entry/.',$this->data_entry->find("first",array("conditions"=>array("candidateID"=>$id,'status'=>1))));
		$student_off_info=Set::extract('/data_entry_official/.',$this->data_entry_official->find("first",array("conditions"=>array("candidateID"=>$id,'status'=>1))));
		$student_docs=Set::extract('/data_entry_checkdocs/.',$this->data_entry_checkdocs->find("first",array("conditions"=>array("candidateID"=>$id))));
		$studentInfo=array_merge($student_per_info[0],$student_off_info[0]);
		if(!empty($student_docs)){
			$studentInfo=array_merge($studentInfo,$student_docs[0]);
	    }
        
	    $this->set("studentDetails",$studentInfo);


		if(!empty($this->data))
		{
		 //print_r($this->data);exit();
		  $data=$this->data;
		  $data=$data['data_entry'];
		  $personal=array();
 	
		  $personal['id']=$studentInfo['id'];
		  $personal['candidateID']=$id;
		  $personal['name']=$data['name'];
		  $personal['fathersname']=$data['father_name'];
		  $personal['mothersname']=$data['mother_name'];
		  $personal['grandfathersname']=$data['grandfather_name'];
		  $personal['dob']=$data['dob'];
		  $personal['streetaddress']=$data['streetaddress'];
		  $personal['city']=$data['city'];
		  $personal['state']=$data['state'];
		  $personal['pincode']=$data['pincode'];
		  $personal['phone']=$data['phone'];
		  $personal['status']='1';
		  
		  //print_r($personal);exit();
		  $official=array();
		  $branches=array();
		  $branches['1']=$data['choice1'];
		  $branches['2']=$data['choice2'];
		  $branches['3']=$data['choice3'];
		  $branches['4']=$data['choice4'];
		  $branches=json_encode($branches);
		 // print_r($branches);exit();
		  $official['id']=$personal['id'];
		  $official['candidateID']=$personal['candidateID'];
		  $official['formno']=$data['formno'];
		  $official['name']=$personal['name'];
		  $official['category']=$data['category'];
		  $official['allotedcategory']=$data['allotedcategory'];
		  $official['jeerollno']=$data['aieeerollno'];
		  $official['jeerank']=$data['aieeerank'];
		  $official['ccbbranch']=$data['ccbbranch'];
		  $official['gkvbranch']=$data['gkvbranch'];
		  $official['bchoices']=$branches;
		  $official['admdate']=$data['admdate'];
		  $official['remarks']=$data['remarks'];
		  $official['status']='1';
		  $official['insertedby']=$this->Session->read('User.name');
		  date_default_timezone_set('Asia/Kolkata');
		  $official['insertedOn']= date ( 'Y-m-d H:i:s' );
		  $checkdocs=array();
		  $checkdocs['id']=$personal['id'];
		  $checkdocs['candidateID']=$personal['candidateID'];
		  $checkdocs['x_marksheet']=$data['checkbox1'];
		  $checkdocs['x_certificate']=$data['checkbox2'];
		  $checkdocs['xii_marksheet']=$data['checkbox3'];
		  $checkdocs['xii_certificate']=$data['checkbox4'];
		  $checkdocs['tc']=$data['checkbox5'];
		  $checkdocs['character_certificate']=$data['checkbox6'];
		  $checkdocs['jee_scorecard']=$data['checkbox7'];
		  $checkdocs['jee_admitcard']=$data['checkbox8'];
		  $checkdocs['prov_adm_letter']=$data['checkbox9'];
		  $checkdocs['migration_certificate']=$data['checkbox10'];
		  $checkdocs['reservation_category']=$data['checkbox11'];
		  $checkdocs['gap_affidavit']=$data['checkbox12'];
		   $checkdocs['status']='1';
	      $docs=array('x_marksheet','xii_marksheet','xii_certificate','tc','character_certificate','jee_scorecard','jee_admitcard','prov_adm_letter','migration_certificate','reservation_category','gap_affidavit');	 
	
		  foreach($docs as $k=>$v){
			  if($checkdocs[$v]==0){
				  $checkdocs['status']=0;
				  break;
			  }
		  }
		 
		  //print_r($checkdocs);exit();
		  $per['data_entry']=$personal;
		  $off['data_entry_official']=$official;
		  $check['data_entry_checkdocs']=$checkdocs;
		  //print_r($per);exit();
		  if($this->data_entry_official->save($off) && $this->data_entry->save($per) && $this->data_entry_checkdocs->save($check)){
              $this->Session->setFlash(__($personal['candidateID']));
		      $this->redirect('data_entry');
		  } 
		  else{
		  	  $this->Session->setFlash(__("Some error occured please try again!!"));
		  }
		}
	}


	
	public function operator_registration() {
	 if($this->Session->read('User.role')!='admin'){
			$this->Session->setFlash(__('Don\'t have permission to access this page!!'));
			  $this->redirect('/login');
		}
		$this->layout="operator_registration";
		$this->loadModel('operator_registration');
		
		if(!empty($this->data)){
			
			$data=array();
			$data=$this->data;
			$data=$data['operator_registration'];
			$data['status']=1;
			//print_r($this->data);exit();
			if($data['password']==$data['confirm_password']){
				$this->operator_registration->save($data);
				$this->Session->setFlash(__("Account created Successfully"));
				$this->redirect('admin_panel');
				$this->data=NULL;
			}
			
		}
	}

	public function admission_slip($id){
       
       $this->layout="admissionSlip";
		$this->loadModel('data_entry_official');
		$this->loadModel('data_entry');
		$this->loadModel('payment');
		$this->loadModel('data_entry_checkdocs');
		if($id==NULL){
			$this->Session->setFlash(__("Record Not found!!"));
		}
		else{
			$this->getStudentDetails($id,"admission_slip");
		}
	}

	public function admissionCumPaymentSlip($id){

		$this->layout="admissionCumPaymentSlip";

		$this->loadModel('data_entry_official');
		$this->loadModel('data_entry');
		$this->loadModel('payment');
		$this->loadModel('data_entry_checkdocs');
		if($id==NULL){
			$this->Session->setFlash(__("Record Not found!!"));
		}
		else{
			$this->getStudentDetails($id);
		}
	}
	
	public function fee_slip($id=NULL) {
		
		$this->layout="fee_slip";
		$this->loadModel('data_entry_official');
		$this->loadModel('data_entry');
		$this->loadModel('payment');
		$this->loadModel('data_entry_checkdocs');
		if($id==NULL){
			$this->Session->setFlash(__("Record Not found!!"));
		}
		else{
			$this->getStudentDetails($id);
		}
		
		
	}

	function getStudentDetails($id,$flag=null){

		$personal=$this->data_entry->find('all',array('fields'=>array('name','fathersname','dob','phone','streetaddress','city','state','pincode'),'conditions'=>array('candidateID'=>$id,'status'=>1)));
			$official=$this->data_entry_official->find('all',array('fields'=>array('candidateID','formno','ccbbranch','gkvbranch','jeerollno','jeerank','category','allotedcategory','admdate'),'conditions'=>array('candidateID'=>$id,'status'=>1)));
			$payment=$this->payment->find('all',array('fields'=>array('status','slipno','collegefee','hostelfee','ddno','ddamount','cashamount'),'conditions'=>array('candidateID'=>$id,'status'=>1)));
			$docs=array('x_marksheet','x_certificate','xii_marksheet','xii_certificate','tc','character_certificate','jee_scorecard','jee_admitcard','prov_adm_letter');
			$documents=Set::extract('/data_entry_checkdocs/.',$this->data_entry_checkdocs->find('all',array('fields'=>$docs,'conditions'=>array('candidateID'=>$id))));
			
			$personal=Hash::extract($personal,'{n}.data_entry');
			$official=Hash::extract($official,'{n}.data_entry_official');
			$payment=Hash::extract($payment,'{n}.payment');
			
			if($payment[0]['slipno']==0 && !isset($flag)){
				echo "Fee is not Submitted!! Please submit your fees";
				exit();
			}
			//$documents=Hash::extract($documents,'{n}.data_entry_checkdocs');
		    //print_r($official);exit();
		    $this->set('per_info',$personal);
			$this->set('off_info',$official);

		  if($this->Session->read('User.role')=='admin'){
			  $this->set('payment',$payment);
              $this->set('docs',$documents);
		  }
		  elseif($this->Session->read('User.role')=='dataentry'){
			  $this->set('docs',$documents);
		  }
		  else{
              $this->set('payment',$payment);
		  }
		 
	}
	
	
	public function sorted_list() {
		
		if($this->Session->read('User.role')!='admin'){
			$this->Session->setFlash(__('Don\'t have permission to access this page!!'));
			  $this->redirect('/login');
		}
          // echo $value;
		$this->layout="sorted_list";
		$this->loadModel('sorted_list');
		$this->loadModel('data_entry');
		//if($value==null && $branch==null && $cat==null){
		$count=$this->sorted_list->find('count',array('conditions'=>array('status'=>1)));
		
		$record=$this->sorted_list->find('all',array('conditions'=>array('status'=>1)));
							
		$record=Hash::extract($record,'{n}.sorted_list');
        $i=0;
		foreach ($record as $studentRecord) {
			
		   $fname=$this->data_entry->find('first',array('fields'=>array('fathersname'),'conditions'=>array('candidateId'=>$studentRecord['candidateID'],'status'=>1)));
		   if(!empty($fname)){
            $record[$i]['fathersname']=$fname['data_entry']['fathersname'];
           }
           $i++;
           	}
		
		//print_r($record);exit();					
		$this->set('records',$record);					 
		$this->set('count',$count);
		}	

		public function view_excel($records,$branch,$cat)
		 {
		  // create new empty worksheet and set default font
		 	if(empty($records)){
            echo "Sorry no record found!!";
		 	}else{
			$this->PhpExcel->createWorksheet()
			    ->setDefaultFont('Calibri', 12);

			// define table cells
			$table = array(
			    array('label' => __('S No.'), 'filter' => true),
			    array('label' => __('Name'), 'filter' => true),
			    array('label' => __('Slip No')),
			    array('label' => __('JEE(Main)RollNo')),
			    array('label' => __('JEE(Main)Rank')),
			    array('label' => __('Alloted Category')),
			    array('label' => __('Branch Alloted by GKV')),
			    array('label' => __('Addmission Date'))
			);

			// add heading with different font and bold text
			$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

			// add data
			$i=0;
			foreach ($records as $record) {
				$i++;
			    $this->PhpExcel->addTableRow(array(
			    	$i,
			    	$record['name'],
			    	$record['candidateID'],
			    	$record['jeerollno'],
			    	$record['jeerank'],
			    	$record['allotedcategory'],
			    	$record['gkvbranch'],
			    	$record['admdate']
			        ));
			}
			if($branch==""){
				$branch="Complete";
			}
			$filename=$branch."-".$cat." Students List.xlsx";
           
			// close table and output
			$this->PhpExcel->addTableFooter()
			    ->output($filename);
		  }
		 }
			
      		   			
						
						
		public function view_pdf($records) {
			    //$this->Post->id = $id;
				//print_r($records);exit();
				  $view=new View($this,false);
				 
				  $view->viewPath='Elements';  // Directory inside view directory to search for .ctp files
			      $view->layout=false; // if you want to disable layout
			      $view->set('records',$records); // set your variables for view here
			      $html=$view->render('sorted');
				  //print_r($html);exit(); 
			    
				
			    // increase memory limit in PHP 
			    ini_set('memory_limit', '2500M');
				require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php'); 
			    spl_autoload_register('DOMPDF_autoload'); 
			    $dompdf = new DOMPDF(); 
			    $dompdf->set_paper = 'A4';
			    $dompdf->load_html($html, Configure::read('App.encoding'));
			    $dompdf->render();

			    $canvas = $dompdf->get_canvas();
			    $font = Font_Metrics::get_font("helvetica", "bold");
			    $canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
			    //$dompdf->stream("sample.pdf",array("Attachment"=>0));
			    $dompdf->stream("Students.pdf");

			   // $this->set('post',$id);
     }
		public function ajax_get_records($value,$branch=null,$cat=null,$pdf=null){
			
			$this->loadModel('sorted_list');
			$this->loadModel('data_entry');
			$branch=explode('=',$branch);
			$branch=$branch[1];
            $cat=explode('=',$cat);
			$cat=$cat[1];

			
			if($branch=='' && $cat=='')
			  {
				  
			  $count=$this->sorted_list->find('count',array('conditions'=>array('status'=>1)));
		
		$record=Set::extract('/sorted_list/.',$this->sorted_list->find('all',array(
			                                     'conditions'=>array('status'=>1),
											     'order'=>array($value.' ASC')
													)));
			             
				$i=0;
				foreach ($record as $studentRecord) {
					
				   $fname=$this->data_entry->find('first',array('fields'=>array('fathersname'),'conditions'=>array('candidateId'=>$studentRecord['candidateID'],'status'=>1)));
				   if(!empty($fname)){
		           $record[$i]['fathersname']=$fname['data_entry']['fathersname'];
		           }
		           $i++;
		           	}			
		
			   }
			   else if($branch!='' && $cat=='')
			  {
				  
				  
			  $count=$this->sorted_list->find('count',array('conditions'=>array('gkvbranch'=>$branch,'status'=>1)));
		
		$record=Set::extract('/sorted_list/.',$this->sorted_list->find('all',array(
											     'conditions'=>array('gkvbranch'=>$branch,'status'=>1),
												 'order'=>array($value.' ASC')
													)));
			  $i=0;
				foreach ($record as $studentRecord) {
					
				   $fname=$this->data_entry->find('first',array('fields'=>array('fathersname'),'conditions'=>array('candidateId'=>$studentRecord['candidateID'],'status'=>1)));
		           if(!empty($fname)){
		           $record[$i]['fathersname']=$fname['data_entry']['fathersname'];
		           }
		           $i++;
		           	}            					
		
			   }
			   
			    else if($branch=='' && $cat!='')
			  {
			  $count=$this->sorted_list->find('count',array('conditions'=>array('allotedcategory'=>$cat,'status'=>1)));
		
		$record=Set::extract('/sorted_list/.',$this->sorted_list->find('all',array(
		                                       
											     'conditions'=>array('allotedcategory'=>$cat,'status'=>1),
												 'order'=>array($value.' ASC')
													)));
			   $i=0;
				foreach ($record as $studentRecord) {
					
				   $fname=$this->data_entry->find('first',array('fields'=>array('fathersname'),'conditions'=>array('candidateId'=>$studentRecord['candidateID'],'status'=>1)));
		           if(!empty($fname)){
		           $record[$i]['fathersname']=$fname['data_entry']['fathersname'];
		           }
		           $i++;
		           	}              
						
							
		
			   }
			   
			   
			
			   
			   else if($branch!='' && $cat!=''){
				  
				    $count=$this->sorted_list->find('count',array('conditions'=>array('gkvbranch'=>$branch,'allotedcategory'=>$cat,'status'=>1)));
		
		$record=Set::extract('/sorted_list/.',$this->sorted_list->find('all',array(
		                                       
												 'conditions'=>array('gkvbranch'=>$branch,'allotedcategory'=>$cat,'status'=>1),
											     'order'=>array($value.' ASC')
													)));
			    $i=0;
				foreach ($record as $studentRecord) {
					
				   $fname=$this->data_entry->find('first',array('fields'=>array('fathersname'),'conditions'=>array('candidateId'=>$studentRecord['candidateID'],'status'=>1)));
		           if(!empty($fname)){
		           $record[$i]['fathersname']=$fname['data_entry']['fathersname'];
		           }
		           $i++;
		           	}             
							
		
			   }
			   
			if(empty($record))
						{
							 $json['status']=false;
					         $json['msg']='No records...';
						}
						if($pdf==1){
							$this->view_pdf($record);
							
						}
						if($pdf==2){
							$this->view_excel($record,$branch,$cat);
						}
						else{
						$json['status']=true;
						$json['msg']="records fetched successfully!!";
						$json['message']=$record;
						//print_r($json);
						//exit();
						$data=array();
						$data['records']=$record;
						$data['count']=$count;
						
						echo json_encode($data);
						}
			$this->autoRender=false;
		}

	public function ajax_get_online_records($category,$pdf=null){
        
        $category=explode('=',$category);
	    $category=$category[1];

        $this->loadModel("migrationList");
        $conditions=array();

        if(!empty($category)){
         $conditions=array(
                         'status'=>1,
                         'category'=>$category
         				);
        }else{
        	$conditions=array(
                         'status'=>1
         				);
        }
         
        $studentCount=$this->migrationList->find('count',array('conditions'=>$conditions));
        $studentInfo=Set::extract('/migrationList/.',$this->migrationList->find("all",array('fields'=>array('jeerollno','name','fathersname','category','jeerank','uid'),'conditions'=>$conditions,'order'=>array('jeerank'))));
                      
        $data['count']=$studentCount;
        $data['records']=$studentInfo;

        if($pdf==1){
        	$this->view_pdf_onlineRecords($data,$category);
        }
        if($pdf==2){
        	$this->view_excel_onlineRecords($data,$category);
        }
        else{
        	echo json_encode($data);
        }
        
        $this->autoRender=false;
        
	}

	public function view_pdf_onlineRecords($online_records,$cat) {
			    
			    if(empty($online_records['records'])){
		            echo "Sorry no record found!!";exit();
				 	}else{
					      $view=new View($this,false);
				  
						  $view->viewPath='Elements';  // Directory inside view directory to search for .ctp files
					      $view->layout=false; // if you want to disable layout
					      $view->set('records',$online_records); // set your variables for view here
					      $html=$view->render('onlineRecords');
						  //print_r($html);exit();
					    // increase memory limit in PHP 
					    ini_set('memory_limit', '2500M');
						require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php'); 
					    spl_autoload_register('DOMPDF_autoload'); 
					    $dompdf = new DOMPDF(); 
					    $dompdf->set_paper = 'A4';
					    $dompdf->load_html($html, Configure::read('App.encoding'));
					    $dompdf->render();

					    $canvas = $dompdf->get_canvas();
					    $font = Font_Metrics::get_font("helvetica", "bold");
					    $canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
					    //$dompdf->stream("sample.pdf",array("Attachment"=>0));
					    $dompdf->stream("$cat OnlineRecords.pdf");

					   // $this->set('post',$id);
					}
     }

     public function view_excel_onlineRecords($onlineRecords,$cat)
		 {
		 	
		  // create new empty worksheet and set default font
		 	if(empty($onlineRecords['records'])){
            echo "Sorry no record found!!";
		 	}else{
			$this->PhpExcel->createWorksheet()
			    ->setDefaultFont('Calibri', 12);

			// define table cells
			$table = array(
			    array('label' => __('GKV Rank'), 'filter' => true),
			    array('label' => __('JEE(Main)RollNo')), 
			    array('label' => __('Name')),
			    array('label' => __('Father\'s Name')),
			    array('label' => __('Alloted Category')),
			    array('label' => __('JEE(Main)Rank'))
			   );

			// add heading with different font and bold text
			$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

			// add data
			$i=0;
			foreach ($onlineRecords['records'] as $record) {
				$i++;
			    $this->PhpExcel->addTableRow(array(
			    	$i,
			    	$record['jeerollno'],
			    	$record['name'],
			    	$record['fathersname'],
			    	$record['category'],
			    	$record['jeerank']
			    	));
			}
			
			$filename="$cat Online Students List.xlsx";
           
			// close table and output
			$this->PhpExcel->addTableFooter()
			    ->output($filename);
		  }
		 }
							
	public function check_docs() {
		
		if($this->Session->read('User.role')!='admin'){
			$this->Session->setFlash(__('Don\'t have permission to access this page!!'));
			  $this->redirect('/login');
		}
		$this->layout='check_docs';
		$this->loadModel('data_entry_checkdocs');
		$this->loadModel('data_entry');
		$this->loadModel('data_entry_official');
		
		$doc=array('off.candidateID','off.name','off.gkvbranch','off.admdate','phone','docs.x_certificate','docs.x_marksheet','docs.xii_marksheet','docs.xii_certificate','docs.tc','docs.character_certificate','docs.jee_scorecard','docs.jee_admitcard','docs.prov_adm_letter','docs.migration_certificate','docs.reservation_category','docs.gap_affidavit');
		
		//print_r($doc);exit();
		$count=$this->data_entry_checkdocs->find('count',array('conditions'=>array('withdrawStatus'=>0)));
		$data=$this->data_entry->find('all', array('joins' => array(
    array(
        'table' => 'official',
        'alias' => 'off',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('off.candidateID =data_entry.candidateID')
    ),
    array(
        'table' => 'checkdocs',
        'alias' => 'docs',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('docs.candidateID = off.candidateID')
        )
    ), 'fields'=>$doc,'conditions'=>array('withdrawStatus'=>0),'order'=>array('off.name ASC')));
	
	$personal=Hash::extract($data,'{n}');
	
    $this->set('per_info',$personal);
	$this->set('count',$count);
	}
	
	function ajax_get_docs($status=null,$document=null){
		
		$this->loadModel('data_entry_checkdocs');
		$this->loadModel('data_entry');
		$this->loadModel('data_entry_official');
		
		$status=explode('=',$status);
		$status=$status[1];
		
		$document=explode('=',$document);
		$document=$document[1];
		
		
		$doc=array('off.candidateID','off.name','off.gkvbranch','off.admdate','phone','docs.x_certificate','docs.x_marksheet','docs.xii_marksheet','docs.xii_certificate','docs.tc','docs.character_certificate','docs.jee_scorecard','docs.jee_admitcard','docs.prov_adm_letter','docs.migration_certificate','docs.reservation_category','docs.gap_affidavit');
		
		if ($status=='' && $document==''){
			
		 $count=$this->data_entry_checkdocs->find('count',array('conditions'=>array('withdrawStatus'=>0)));
		$data=$this->data_entry->find('all', array('joins' => array(
    array(
        'table' => 'official',
        'alias' => 'off',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('off.candidateID =data_entry.candidateID')
    ),
    array(
        'table' => 'checkdocs',
        'alias' => 'docs',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('docs.candidateID = off.candidateID')
        )
    ), 'fields'=>$doc,'conditions'=>array('withdrawStatus'=>0),'order'=>array('off.name ASC')));
		}
		
		else if($status=='1'){
		   	 $count=$this->data_entry_checkdocs->find('count',array('conditions'=>array('status'=>'1','withdrawStatus'=>0)));
		$data=$this->data_entry->find('all', array('joins' => array(
    array(
        'table' => 'official',
        'alias' => 'off',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('off.candidateID =data_entry.candidateID')
    ),
    array(
        'table' => 'checkdocs',
        'alias' => 'docs',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('docs.candidateID = off.candidateID')
        )
    ), 'fields'=>$doc,'conditions'=>array('docs.status'=>$status,'withdrawStatus'=>0),'order'=>array('off.name ASC')));
		}
		
		else if($status!='' && $document==''){
			
			 $count=$this->data_entry_checkdocs->find('count',array('conditions'=>array('status'=>$status,'withdrawStatus'=>0)));
		$data=$this->data_entry->find('all', array('joins' => array(
    array(
        'table' => 'official',
        'alias' => 'off',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('off.candidateID =data_entry.candidateID')
    ),
    array(
        'table' => 'checkdocs',
        'alias' => 'docs',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('docs.candidateID = off.candidateID')
        )
    ), 'fields'=>$doc,'conditions'=>array('docs.status'=>$status,'withdrawStatus'=>0),'order'=>array('off.name ASC')));
		}
		
		else if($status=='' && $document!=''){
			 $count=$this->data_entry_checkdocs->find('count',array('conditions'=>array('OR'=>array('status'=>'1',$document=>'0'),'withdrawStatus'=>0)));
		$data=$this->data_entry->find('all', array('joins' => array(
    array(
        'table' => 'official',
        'alias' => 'off',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('off.candidateID =data_entry.candidateID')
    ),
    array(
        'table' => 'checkdocs',
        'alias' => 'docs',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('docs.candidateID = off.candidateID')
        )
    ), 'fields'=>$doc,'conditions'=>array('OR'=>array('docs.status'=>'1','docs.'.$document=>'0'),'withdrawStatus'=>0),'order'=>array('off.name ASC')));
		}
		
		else if($status!='' && $document!=''){
			 $count=$this->data_entry_checkdocs->find('count',array('conditions'=>array('status'=>$status,$document=>'0','withdrawStatus'=>1)));
		$data=$this->data_entry->find('all', array('joins' => array(
    array(
        'table' => 'official',
        'alias' => 'off',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('off.candidateID =data_entry.candidateID')
    ),
    array(
        'table' => 'checkdocs',
        'alias' => 'docs',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('docs.candidateID = off.candidateID')
        )
    ), 'fields'=>$doc,'conditions'=>array('docs.status'=>$status,'docs.'.$document=>'0','docs.withdrawStatus'=>0),'order'=>array('off.name ASC')));
		}
		
		$personal=Hash::extract($data,'{n}');
		
		$record['personal']=$personal;
		$record['count']=$count;
		//print_r($data);exit();
		echo json_encode($record);
		$this->autoRender=false;
	}
	
	
	public function payment($slipno=NULL) {
		
		if($this->Session->read('User.role')=='dataentry'){
			$this->Session->setFlash(__('Don\'t have permission to access this page!!'));
			  $this->redirect('/login');
		}
	$this->loadModel('data_entry_official');
	$this->loadModel('data_entry');
	$this->loadModel('payment');
	$this->layout="payment";
	 
	 
			//echo $slipno;
	 if($slipno==NULL){
	     
	  $this->render('indexpayment');
		}
	
		else{
			//echo $slipno;exit();
			$count=$this->data_entry->find('count',array('conditions'=>array('candidateID'=>$slipno,'status'=>1)));
			if($count==0)
			{
				//$this->Session->setFlash(__("NO records found!!"));
				$this->redirect('payment');
			}
			 $official_details=$this->data_entry_official->find('all',array(
	                                                'fields'=>array('id','name','candidateID','formno','gkvbranch','admdate','remarks'),
													 'conditions'=>array('candidateID'=>$slipno,'status'=>1)));
													 
		     $personal_details=$this->data_entry->find('all',array('fields'=>array('streetaddress','phone'),
	                                                       'conditions'=>array('candidateID'=>$slipno,'status'=>1)));

            $payment=$this->payment->find('all',array('fields'=>array('id','collegefee','hostelfee','ddno','ddamount','cashamount','slipno'),'conditions'=>array('candidateID'=>$slipno,'status'=>1)));
														   
			$official_details=Hash::extract($official_details,'{n}.data_entry_official');
			$personal_details=Hash::extract($personal_details,'{n}.data_entry');
			$payment_details=Hash::extract($payment,'{n}.payment');
			//print_r($payment_details);exit();
			
			$this->set('slip',substr($slipno,'7'));
			$this->set('off_details',$official_details);
			$this->set('per_details',$personal_details);
			$this->set('payment_details',$payment_details);
										
		}

		if(!empty($this->data))
	 {
		
	    $data=$this->data;
		$data=$data['payment'];
		
		$data['total']=$data['collegefee']+$data['hostelfee'];
		$total_fee=$data['cashamt']+$data['dd1_amount']+$data['dd2_amount']+$data['dd3_amount']+$data['dd4_amount'];
		$ddno=array();
		$ddno['ddno1']=$data['dd1'];
		$ddno['ddno2']=$data['dd2'];
		$ddno['ddno3']=$data['dd3'];
		$ddno['ddno4']=$data['dd4'];
		$ddno=json_encode($ddno);
		$dd_amount=array();
		$dd_amount['dd1']=$data['dd1_amount'];
		$dd_amount['dd2']=$data['dd2_amount'];
		$dd_amount['dd3']=$data['dd3_amount'];
		$dd_amount['dd4']=$data['dd4_amount'];
		$dd_amount=json_encode($dd_amount);
		$data['ddno']=$ddno;
		$data['ddamount']=$dd_amount;
		$data['cashamount']=$data['cashamt'];
		$data['insertedby']=$this->Session->read('User.name');
		 date_default_timezone_set('Asia/Kolkata');
		$data['submitOn']=date('Y-m-d H-i-s');
        $data['status']='1';
        $data['id']=$payment_details[0]['id'];
        //print_r($data);exit();
		  if($this->payment->save($data)){
		   $this->Session->setFlash(__($slipno)); 
           $this->redirect("/Fetadmissions/payment");		  	
		  }
		  
		}
	}
	
	public function view_details($id) {
		$this->layout="view_details";
		$this->loadModel('data_entry_official');
	    $this->loadModel('data_entry');
	
		$official=$this->data_entry_official->find('all',array(
		                                                   'fields'=>array(
														                   'name','candidateID','formno','allotedcategory','gkvbranch','ccbbranch',                                                                            'jeerollno','jeerank','admdate','category'),
															'conditions'=>array('candidateID'=>$id,'status'=>1)
																		   ));
		$official=Hash::extract($official,'{n}.data_entry_official');
		
		$personal=$this->data_entry->find('all',array(
		                                              'fields'=>array('fathersname','mothersname','dob','phone','streetaddress','city','state',                                                                       'pincode'),
													    'conditions'=>array('candidateID'=>$id,'status'=>1)));
	    $personal=Hash::extract($personal,'{n}.data_entry');
		
		$this->set('official',$official);
		$this->set('personal',$personal);
		//print_r($personal);exit();
	}

	public function migrationList() {
                   
                   $this->layout="migrationList";
                   $this->loadModel("migrationList");
                   $studentInfo=Set::extract('/migrationList/.',$this->migrationList->find("all",array('fields'=>array('jeerollno','name','fathersname','category','jeerank','uid'),'conditions'=>array('status'=>1),'order'=>array('jeerank'))));
                   $studentCount=$this->migrationList->find('count',array('conditions'=>array('status'=>1)));
                   $this->set("studentDetails",$studentInfo);
                   $this->set("count",$studentCount);
	}

	public function studentWithdrawal($id){
                   
                    $this->layout="student_withdrawal";
                    $this->loadModel('data_entry');
					$this->loadModel('data_entry_official');
					$this->loadModel('data_entry_checkdocs');
			        $this->loadModel("withdraw");

			        if(!empty($this->data)){
                       $personal_data=$this->data_entry->find('first',array('conditions'=>array('candidateID'=>$id)));
                       $personal_data['data_entry']['status']=0;

                       $official_data=$this->data_entry_official->find('first',array('conditions'=>array('candidateID'=>$id)));
                       $official_data['data_entry_official']['status']=0;

                       $docs_data=$this->data_entry_checkdocs->find('first',array('conditions'=>array('candidateID'=>$id)));
                       $docs_data['data_entry_checkdocs']['withdrawStatus']=1;

                       $withdraw=array_merge($personal_data['data_entry'],$official_data['data_entry_official']);
                       
                       $withdraw['withdraw_reason']=$this->data['withdraw']['withdraw_reason'];
                       $withdraw_data['withdraw']=$withdraw;
                       
                       $this->data_entry->save($personal_data);
                       $this->data_entry_official->save($official_data);
                       $this->data_entry_checkdocs->save($docs_data);
                       $this->withdraw->save($withdraw_data);
                       $this->redirect("/Fetadmissions/admin_panel");
			        }


	}

	 public function logout() 
				   {
					  $this->Session->destroy();
					  //$this->Cookie->delete('user');
					  $this->redirect('/login');
				   }


}
