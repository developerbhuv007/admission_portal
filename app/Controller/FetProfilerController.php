
<?php

ini_set('max_execution_time',-1);
ini_set('memory_limit', -1);

App::uses('CakeEmail', 'Network/Email');
App::uses('HttpSocket', 'Network/Http');

class FetProfilerController extends AppController {
	
	public $components = array('RequestHandler','Session');

    public function login(){
        $this->layout = 'profiler-login';
        $this->loadModel('profilerlogin');
        
        if ($this->Session->read('User.profiler')){
            if($this->Session->read('User.role')=="admin")                       
                 $this->redirect('/fet-profiler');
            else if($this->Session->read('User.role')=="student")
                 $this->redirect('/fet-profiler/student');
            else if($this->Session->read('User.role')=="faculty")
                $this->redirect('/fet-profiler/faculty');  
            else{
                $this->redirect('/');  
            }                            
        }
        $dataFound = $this->data;
        if(!empty($dataFound)){  
            
            $username=$this->data['email'];
            $password=$this->data['password'];
            
            $data=array();
            $data=$this->profilerlogin->authenticate($username,$password);
                                  
            if($data['user']){
                if($data['pass']){
                    $this->Session->write('User.profiler','1');
                    $this->Session->write('User.email',$username);
                    $this->Session->write('User.name',$data['name']);
                    $this->Session->write('User.role',$data['role']);
                    
                    if($data['role']=="admin")                     
                      $this->redirect('/fet-profiler');
                    else if($data['role']=="faculty")
                      $this->redirect('/fet-profiler/faculty');
                    else
                      $this->redirect('/fet-profiler/student');                 
                }
                else{
                    $this->Session->setFlash(__('Plese enter correct password'));
                    $this->redirect('/');
                }
            }else{
                $this->Session->setFlash(__('Invalid userID'));
                $this->redirect('/');
            }
        }
    }
	
    public function index(){
        
        $this->checkSession();

        if($this->Session->read('User.role')!="admin"){
            $this->redirect_user();
        }
    	$this->layout = "profiler-admin";
        $studentData = $this->get_student_data();
        $this->set('studentData',$studentData);
    }

    public function faculty(){
        if($this->Session->read('User.role')=="student"){
            $this->redirect_user();
        }
    	$this->layout = "profiler-faculty";
    }

    public function student($id = null){
        $this->checkSession();
    	$this->layout = "profiler-student";
        if($id != null){
            if($this->Session->read('User.role')=="student"){
            $this->redirect_user();
            }
            $data = $this->get_student_data(null,$id);  
        }else if($this->Session->read('User.role')=="student"){
            $candidateID = $this->Session->read('User.email');
            $data = $this->get_student_data(null,$candidateID);
        }
        $this->set('studentRecord',$data[0]);
    }

    public function getData(){

        if($this->Session->read('User.role')=="student"){
            $this->redirect_user();
        }
        $paramCheck = $this->params->query;
        if(empty($paramCheck)){
            $this->redirect("/fet-profiler/error-page");
        }
        $filter = array();
        if ($this->params->query['year']!="all"){
            $filter['year'] = $this->params->query['year'];
        }
        if ($this->params->query['branch']!="all"){
            $filter['gkvbranch'] = $this->params->query['branch'];
        }        
        if ($this->params->query['category']!="all"){
            $filter['allotedcategory'] = $this->params->query['category'];
        }
    
        $studentrecords = $this->get_student_data($filter); 
        echo json_encode($studentrecords);
        $this->autoRender = false;
    }

    public function getStaffData(){
        $paramCheck = $this->params->query;
        if(empty($paramCheck)){
            $this->redirect("/fet-profiler/error-page");
        }

        $this->loadModel('staffregistration');
        $filter = array();
        
        if ($this->params->query['department']!="all"){
            $filter['department'] = $this->params->query['department'];
        }        
        $filter['status'] = 1;
        $staffData = $this->staffregistration->find('all',array('conditions'=>$filter));
        
        echo json_encode($staffData);
        $this->autoRender = false;
    }


    function get_student_data($filter = null , $id = null){

        $this->loadModel('data_entry');
        $this->loadModel('data_entry_official');
        $filter['data_entry.status'] = 1;
        if($id != null){
            $filter['data_entry.candidateID'] = $id;
        }
        $projection = array(
                'data_entry.id',
                'data_entry.candidateID',
                'data_entry.name',
                'data_entry.year',
                'data_entry.fathersname',
                'data_entry.mothersname',
                'data_entry.dob',
                'data_entry.streetaddress',
                'data_entry.city',
                'data_entry.state',
                'data_entry.pincode',
                'data_entry.phone',
                'data_entry.photo',
                'data_entry.enrollmentnumber',
                'data_entry.email',
                'data_entry.fatherscontact',
                'data_entry.currentaddress',
                'off.allotedcategory',
                'off.gkvbranch',
                'off.admdate'
            );
        $data = $this->data_entry->find('all', array('joins' => array(
                        array(
                            'table' => 'official',
                            'alias' => 'off',
                            'type' => 'inner',
                            'foreignKey' => false,
                            'conditions' => array('off.candidateID = data_entry.candidateID')
                        )),'fields' => $projection,'conditions' => $filter,'order' => array('off.name ASC')));
        
        return $data;
    }

    public function ajax_get_sugs($suggestion){
        
        $this->loadModel('data_entry_official');
        $sug=explode('=',$suggestion);
        
        $sug=$sug[1];
        
        $names=Set::extract('/data_entry_official/.',$this->data_entry_official->find('all',array('fields'=>array('name','candidateID'),'conditions'=>array('OR'=>array('name LIKE'=>
        $sug.'%','candidateID LIKE'=>$sug.'%'),'status'=>1))));
       
        echo json_encode($names);
        $this->autoRender=false;
        
    }

    public function ajax_update_student_record(){
        
        $this->loadModel('data_entry');
        $data['data_entry'] = $this->request->data;
        $jsonResponse['status'] = false;
        $jsonResponse['code'] = 500;
        if($this->data_entry->save($data)){
            $jsonResponse['status'] = true;
            $jsonResponse['msg'] = "data updated successfully";
            $jsonResponse['code'] = 200;
        }
        echo json_encode($jsonResponse);
        $this->autoRender=false;
        
    }

    public function ajax_register_staff(){
        
        $this->loadModel('profilerlogin');
        $this->loadModel('staffregistration');
        $facultyData = $this->request->data;

        $loginentry['profilerlogin']['name'] = $facultyData['name'];
        if($facultyData['department']!="nonteachingstaff"){
            $loginentry['profilerlogin']['role'] = "faculty";    
        }else{
            $loginentry['profilerlogin']['role'] = $facultyData['department'];
        }
        $loginentry['profilerlogin']['emailid'] = $facultyData['email'];
        $password = rand()."-".date('YmHis');
        $loginentry['profilerlogin']['password'] = $password;

        $staffentry['staffregistration'] = array(
                'name'          =>      $facultyData['name'],
                'department'    =>      $facultyData['department'],
                'emailid'       =>      $facultyData['email'],
                'mobile'        =>      isset($facultyData['contact'])?$facultyData['contact']:'',
                'edited_on'     =>      date('Y-m-d H:i:s')
        );
        $jsonResponse['status'] = false;
        $jsonResponse['code']   = 500;
        $jsonResponse['msg']    = '';

        $emailExistence = $this->checkForEmailExistence($facultyData['email'],'profilerlogin');
        
        if($emailExistence){
            $jsonResponse['msg'] = 'Email id already exists';    
        }else{
            if($this->profilerlogin->save($loginentry)){
                if($this->staffregistration->save($staffentry)){
                    $this->sendemail($facultyData['email'],'sendcredentials','Credentials For GKV-Profiler',$password);
                    $jsonResponse['status'] = true;
                    $jsonResponse['code']   = 200;
                    $jsonResponse['msg']    = "Staff registered successfully";
                }else{
                    $this->profilerlogin->deleteAll(array('emailid'=>$facultyData['email']),false);
                    $jsonResponse['msg']    = 'Error registering staff';
                }
            }else{
                $jsonResponse['msg'] = 'Error in loginentry of staff';
            }    
        }

        echo json_encode($jsonResponse);
        $this->autoRender=false;
        
    }

    public function checkForEmailExistence($email = null, $model = null){
        $this->loadModel($model);
        $checkingEmail = $this->$model->findByemailid($email);
        if(!empty($checkingEmail)){
            return true;
        }else{
            return false;
        }
    }

    public function sendemail($email = null, $template = null, $subject=null, $message = null){
        $dataCheck = $this->request->data;
        if(!empty($dataCheck)){
            $email = $this->request->data['email'];
            /*$email = array(
                    'developerbhuv@gmail.com',
                    'bhuvthebest@gmail.com',
                    'vikas.swastik@gmail.com'
                );*/
            $subject = $this->request->data['subject'];
            $message = $this->request->data['message'];
            $template = 'emailtemplate';
        }
        $viewVars = array();
        if ($template == 'sendcredentials'){
            $viewVars = array(
                    'id' => $email,
                    'pass'=> $message
                );
        }else if($template == 'emailtemplate'){
            $viewVars = array(
                    'name' => $this->Session->read('User.name'),
                    'msg'=> $message
                );
        }
        $Email = new CakeEmail('gmail');
        $Email->template($template)
              ->from('bhuvnesh@transporter.city')
              ->emailFormat("html")
              ->viewVars($viewVars)
              ->to($email)
              ->subject($subject);

        $jsonResponse['status'] = false;
        $jsonResponse['code']   = 500;

        if($Email->send()){
            $jsonResponse['status'] = true;
            $jsonResponse['code']   = 200;
        }
        echo json_encode($jsonResponse);
        $this->autoRender = false;
    }

    public function sendsms($contactarray = null, $message = null){
        $dataCheck = $this->request->data;
        if(!empty($dataCheck)){
            foreach ($this->request->data['contacts'] as $key => $value) {
                $contactarray .= $value.','; 
            }
            $contactarray = rtrim($contactarray,",");
            //$contactarray = '9557932744,7055474498,9557827050';
            $message = $this->request->data['message'];
        }
        $http = new HttpSocket();
        $query = array(
                'user' => '8979798008',
                'pass' => '598abc4',
                'sender'=> 'TESTTO',
                'phone' =>  $contactarray,
                'text'  =>  $message,
                'priority'=> 'ndnd',
                'stype'   => 'normal'
            );
        $response = $http->get('http://bhashsms.com/api/sendmsg.php',$query);
        echo $response->code;
        $this->autoRender = false;
    }

    public function ajax_update_year(){
        $this->loadModel('data_entry');
        $this->loadModel('data_entry_official');
        $month = (int)date('m');

        if ($month >= 7){
            $projection = array(
                'data_entry.id',
                'data_entry.candidateID',
                'data_entry.year',
                'off.admdate'
            );
            $filter['data_entry.status'] = 1;
            $students = $this->data_entry->find('all', array('joins' => array(
                                        array(
                                            'table' => 'official',
                                            'alias' => 'off',
                                            'type' => 'inner',
                                            'foreignKey' => false,
                                            'conditions' => array('off.candidateID = data_entry.candidateID')
                                        )),'fields' => $projection,'conditions' => $filter));

            foreach ($students as $student) {
                $yearofadmission = explode('/', $student['off']['admdate']);
                $yearofadmission = (int)$yearofadmission[2];
                $currentyear = (int)date('Y');
                $yeardiff = $currentyear - $yearofadmission;
                
                if($yeardiff >= 4){
                    $student['data_entry']['year'] = 0;
                }elseif($yeardiff == 3){
                    $student['data_entry']['year'] = 4;
                }elseif($yeardiff == 2){
                    $student['data_entry']['year'] = 3;
                }elseif($yeardiff == 1){
                    $student['data_entry']['year'] = 2;
                }else{
                    $student['data_entry']['year'] = 1;
                }

                $this->data_entry->save($student['data_entry']);
            }
        }
        $this->autoRender = false;
    }

    public function checkSession(){
        if(!$this->Session->check('User.profiler')){
            $this->logout();
        }
    }

    public function redirect_user(){
        if($this->Session->read('User.role')=="student"){
            $this->redirect('/fet-profiler/student');
        }else{
            $this->redirect('/fet-profiler/faculty');
        }
    }

    public function errorpage(){
        $this->layout = "profiler-errorpage";
    }

    public function logout() 
	   {
		  $this->Session->destroy();
		  //$this->Cookie->delete('user');
		  $this->redirect('/');
	   }


}
