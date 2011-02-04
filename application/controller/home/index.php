<?php

	class Index extends Controller{
	
		function __construct(){
			
			parent::Controller();
		
		}
		
		function index(){
						
			$this->load->view("home/index");
			
		}
	
		function submit(){
		
			if(isset($_POST['submitButton'])) {
				$email = $_POST['emailAddress'];
				$password = $_POST['password'];
				$md5password = md5($password);
				
				if($this->validation->valid_email($email)) {
					if($password) {
						
						//Check the email address and password match
						$check = $this->db->query("SELECT email, password FROM users WHERE email = '$email'")->row();
						if($check) {
							if($check['password'] == $md5password) {							
							
								$this->load->view('home/loginchecker');
								exit();
						
							} else {
								$data['fail'] = "The password you entered was incorrect.";
							}
						} else {
							$data['fail'] = "Email address not found in our system.";
						}												
					} else {
						$data['fail'] = "You must enter a password.";
					}
				} else {
					$data['fail'] = "You must enter a valid email address.";
				}
				
				$this->load->view('home/index',$data);
								
			} else {
				$this->load->view("home/index");
			}	

		}
		
	}