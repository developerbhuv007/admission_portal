<?php
class profilerlogin extends AppModel {
	var $useTable="profiler-login";
	
	public $validate = array(
        'emailid' => array(
            'rule' => 'notEmpty'
        ),
        'password' => array(
            'rule' => 'notEmpty'
        )
		);
	
	public function authenticate($user,$password){
		  
		$user=$this->findByemailid($user);
		$userinfo=array();
		
		if(!empty($user)){
	  	   $userinfo['name']=$user['profilerlogin']['name'];
		   $userinfo['role']=$user['profilerlogin']['role'];
		   $userinfo['user']=false;
		   $userinfo['pass']=false;
	       $pass=$this->findBypassword($password);
		   $userinfo['user']=true;
		 
		   if(!empty($pass)){
			 $userinfo['pass']=true;
			}		  
		}
				
		return $userinfo;						  
	}	
		
}
?>