<?php
class LoginController extends AppController {
	public $components = array('Session');
	public function index()
	{
		$this->layout='login';
		$this->loadModel('Login');
		  if ($this->Session->read('User.addmission'))
			{
			  
			
               if($this->Session->read('User.role')=="admin")						
          		 $this->redirect('/fetadmissions/admin_panel');
			 else if($this->Session->read('User.role')=="dataentry")
				 $this->redirect('/fetadmissions/data_entry');
			else if($this->Session->read('User.role')=="paymentgateway")
				$this->redirect('/fetadmissions/payment');	
				else{
				$this->redirect('/login');	
				}		                     
			   
			}
		   
				if(!empty ($this->data))
			       {
					  
		            $username=$this->data['email'];
		    		$password=$this->data['password'];
					
					$data=array();
				    $data=$this->Login->authenticate($username,$password);
												 
					
											  
				        				  
						if($data['user'])
						  {
						    if($data['pass'])
							 {
								$this->Session->write('User.addmission','1');
								$this->Session->write('User.email',$username);
								$this->Session->write('User.name',$data['name']);
								$this->Session->write('User.role',$data['role']);
							    //$this->Session->setFlash(__('Successfully logged in'));			
								/*if($data['role']=="admin")						
								 $this->redirect('/fetadmissions/admin_panel');
								 else if($data['role']=="dataentry")
								 $this->redirect('/fetadmissions/data_entry');
								 else
								  $this->redirect('/fetadmissions/payment');*/

								 if($data['role']=="admin")						
								 $this->redirect('/fet-profiler');
								 else if($data['role']=="faculty")
								 $this->redirect('/fet-profiler/faculty');
								 else
								  $this->redirect('/fet-profiler/student');					
								
							 }
							else
							 {
								 //echo "hello";exit();
								$this->Session->setFlash(__('Plese enter correct password'));
								 $this->redirect('/login');
							 }
						  }
						 else
						   {
							   //echo "hello";exit();
							  $this->Session->setFlash(__('Invalid userID'));
							  $this->redirect('/login');
						  }
												  
													 												  }
				}
		
		
	}

