<?php

	class Signup extends Controller{
	
		function __construct(){
			
			parent::Controller();
			$this->load->library('validation');
			$this->load->helper('form');
			$this->load->model('gamecore');
			$this->gamecore->outsidechecker();
		
		}
		
		function index(){
						
			$this->load->view("home/signup");
		
		}

		function submit(){
		
			if(isset($_POST['submitButton'])) {
				$email = $_POST['emailAddress'];
				$confirm = $_POST['confirmEmail'];
				$gender = $_POST['genderType'];
				$age = $_POST['ageAmount'];
				$referral = $_POST['referralCode'];
				$antiscript = $_POST['antiScript'];
				$terms = $_POST['termsOfService'];
				
				if($this->validation->valid_email($email)) {
					if($this->validation->valid_email($confirm)){
						if($email == $confirm) {
							if($this->validation->alpha_loose($gender)) {
								if($this->validation->is_numeric($age)) {
									if($this->validation->is_numeric($antiscript)) {
										//if($antiscript == $actualcode) {
											if($this->validation->is_numeric($terms)) {
												$check = $this->db->query("SELECT email FROM users WHERE email = '$email'")->row();
												if(!$check) {
												
													//Password
													$this->load->library('utilities');
													$password = $this->utilities->generateToken(10);
													$md5password = md5($password);
													
													//Send the email
													$this->load->library('mail');
													$this->mail
	    					        				    ->setTo($email,"")
										                ->setSubject("Welcome to ".$this->core->get_config_item('name','application'))
										                ->setPlain("Welcome to ".$this->core->get_config_item('name','application')."
										                
You can now login at ".$this->core->get_config_item('base_url')." using the below password and email address.

Your email: ".$email."
Your password: ".$password."

This password is case-sensitive. After logging in you can easily change your password!

".$this->core->get_config_item('name','application')." Staff
".$this->core->get_config_item('base_url'))
										                ->setHtml("<h2>Welcome to ".$this->core->get_config_item('name','application')."</h2>
										                You can now login at ".$this->core->get_config_item('base_url')." using the below password and email address.<br><br>
										                Your email: ".$email."<br>
										                Your password: ".$password."<br><br>
										                
										                This password is case-sensitive. After logging in you can easily change your password!<br><br>
										                ".$this->core->get_config_item('name','application')." Staff<br>
										                ".$this->core->get_config_item('base_url'))
										                ->send();
												
													//Insert new row
													$fields['email']=$email;
													$fields['password']=$password;
													$this->db->insert('users',$fields);
													
													header("Location: ".$this->core->get_config_item('base_url')."home/signup_success/");

												} else {
													$data['fail'] = "This email address has already been used.";
												}		
											} else {
												$data['fail'] = "You must agree to the terms of service.";
											}
/*
										} else {
											$data['fail'] = "You must enter the code correctly.";
										}
*/
									} else {
										$data['fail'] = "You must enter a valid anti script code.";
									}
								} else {
									$data['fail'] = "You must select your age.";
								}
							} else {
								$data['fail'] = "You must select your gender.";
							}
						} else {
							$data['fail'] = "Your email address must match your confirmed email address.";
						}
					} else {
						$data['fail'] = "You must re-enter your email address.";
					}
				} else {
					$data['fail'] = "You must enter a valid email address.";
				}
				
				if(isset($data['fail'])) {
					$this->load->view('home/signup',$data);
				}
								
			} else {
				$this->load->view("home/signup");
			}	
		
		}
	}