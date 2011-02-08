<?php

	class Index extends Controller{
	
		function __construct(){
			
			parent::Controller();
			$this->load->library('validation');
			$this->load->helper('form');
			$this->load->model('gamecore');
			$this->gamecore->loginchecker();

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
						$check = $this->db->query("SELECT id, email, password, username FROM users WHERE email = '$email'")->row();
						if($check) {
							if($check['password'] == $md5password) {
								$_SESSION['logincheck']=$check['id'];
														
								if($check['username']) {
									header("Location: ".$this->core->get_config_item('base_url')."home/logincheck");
								} else {
									header("Location: ".$this->core->get_config_item('base_url')."home/choosecharacter");
								}
														
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
				
				if(isset($data['fail'])) {
					$this->load->view('home/index',$data);
				}
								
			} else {
				$this->load->view("home/index");
			}	

		}
		
	}