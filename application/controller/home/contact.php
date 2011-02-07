<?php

	class Contact extends Controller{
	
		function __construct(){
			
			parent::Controller();
			$this->load->library('validation');
			$this->load->helper('form');
		
		}
		
		function index(){
		
			$this->load->view("home/contact");
					
		}
		
		function submit(){
		
			if(isset($_POST['submitButton'])) {
				$name = $_POST['fullName'];
				$email = $_POST['emailAddress'];
				$subject = $_POST['subjectType'];
				$message = $_POST['messageBox'];
				$antiscript = $_POST['antiScript'];
				
				if($this->validation->alpha_loose($name)) {
					if($this->validation->valid_email($email)) {
						if($this->validation->checkdata($subject,4)){
							if($message) {
								if($this->validation->is_numeric($antiscript)) {
									//if($antiscript == $actualcode) {

										//Send the email
										$this->load->library('Mail');
							            $this->mail
							                ->setTo("dave@bytewire.co.uk","David Heward")
							                ->setSubject("Some subject")
							                ->setPlain("This is some plain text")
							                ->setHtml("<b>Goody string</b> i cant be bothered to watch lol.")
							                ->send();
							                									
										$data['success'] = "Well Done";
										header("Location: ".$this->core->get_config_item('base_url')."home/contact/success/");
										
/*
									} else {
										$data['fail'] = "You must enter the code correctly.";
									}
*/
								} else {
									$data['fail'] = "You must copy the code correctly.";
								}
							} else {
								$data['fail'] = "You must enter a valid message.";
							}
						} else {
							$data['fail'] = "You must select a subject.";
						}
					} else {
						$data['fail'] = "You must enter a valid email address.";
					}
				} else {
					$data['fail'] = "You must enter a valid name.";
				}
				
				if(isset($data['fail'])) {
					$this->load->view('home/contact',$data);
				}
			} else {
				$this->load->view("home/contact");
			}	
		}
		
		function success(){
		
			$this->load->view("home/contact_success");
		
		}
				
	}