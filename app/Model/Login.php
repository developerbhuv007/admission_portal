<?php
class Login extends AppModel {
	var $useTable="login";
	
	public $validate = array(
        'emailid' => array(
            'rule' => 'notEmpty'
        ),
        'password' => array(
            'rule' => 'notEmpty'
        )
		);
	
	public function authenticate($user,$password)
	{
		  $user=$this->findByemailid($user);
		   
		   $userinfo=array();
		   
		  
		   
				  if(!empty($user))
				  {
				  	   $userinfo['name']=$user['Login']['name'];
					   $userinfo['role']=$user['Login']['role'];
					   $userinfo['user']=false;
					   $userinfo['pass']=false;
				
					  $pass=$this->findBypassword($password);
					 
					 	$userinfo['user']=true;
					 
					  if(!empty($pass))
					  {
						$userinfo['pass']=true;
						
					  }
					  
				  
				  }
				
				  return $userinfo;
							  
}	
		
}
?>