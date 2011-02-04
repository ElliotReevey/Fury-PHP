<?php

	class Signup extends Controller{
	
		function __construct(){
			
			parent::Controller();
		
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
									if($this->validation->alpha($age)) {
										if($this->validation->alpha($antiscript)) {
											if($antiscript == $actualcode) {
												if($this->validation->alpha($terms)) {
										
													//Send the email
													
													$data['success'] = "Well Done";
													$this->load->view('home/signup_success',$data);
													exit();
																			
												} else {
													$data['fail'] = "You must agree to the terms of service.";
												}
											} else {
												$data['fail'] = "You must enter the code correctly.";
											}
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
				
				$this->load->view('home/signup',$data);
								
			} else {
				$this->load->view("home/signup");
			}	
		
		}
	}