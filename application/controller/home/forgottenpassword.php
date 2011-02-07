<?php

	class ForgottenPassword extends Controller{
	
		function __construct(){
			
			parent::Controller();
			$this->load->library('validation');
			$this->load->helper('form');
		
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
							$this->mail
				                ->setToName("Contact Form")
				                ->setSubject("Some subject")
				                ->setPlain("This is some plain text")
				                ->setHtml("<b>Goody string</b> i cant be bothered to watch lol.")
				                ->setSystem()
				                ->send();
							
							header("Location: ".$this->core->get_config_item('base_url')."home/forgottenpassword/success/");
								
						} else {
							$data['fail'] = "The email address entered was not found in our system.";
						}										
					} else {
						$data['fail'] = "You must enter a valid email address.";
					}
				
				if(isset($data['fail'])) {
					$this->load->view('home/forgottenpassword',$data);
				}
								
			} else {
				$this->load->view("home/forgottenpassword");
			}	
		
		}

		function success(){
		
			$this->load->view("home/forgottenpassword_success");
		
		}
	
	}