<?php

	class ForgottenPassword extends Controller{
	
		function __construct(){
			
			parent::Controller();
		
		}
		
		function index(){
						
			$this->load->view("home/forgottenpassword");
		
		}

		function submit(){
		
			if(isset($_POST['submitButton'])) {
				$email = $_POST['emailAddress'];
				
					if($this->validation->valid_email($email)) {
						$check = $this->db->query("SELECT email FROM users WHERE email = '$email'")->row();
						if($check) {

							//Send the email
							
							$data['success'] = "Well Done";
							$this->load->view('home/forgottenpassword_success',$data);
							exit();
								
						} else {
							$data['fail'] = "The email address entered was not found in our system.";
						}										
					} else {
						$data['fail'] = "You must enter a valid email address.";
					}
				
				$this->load->view('home/forgottenpassword',$data);
								
			} else {
				$this->load->view("home/forgottenpassword");
			}	
		
		}
	
	}