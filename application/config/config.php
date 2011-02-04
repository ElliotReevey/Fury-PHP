<?php

	if ( ! defined('ROOT')) exit('No direct script access allowed');

	# Some file to basically setup all of the basic variables.
	
	// =========== 
	// ! Version   
	// =========== 
	
	define('FURY_VERSION',	'1.0.0');
	
	// =========== 
	// ! Base site URL
	// ! Typically this would be your base URL with a trailing slash
	// ! example http://website.com/ 	   
	// =========== 
	
	$config['base_url'] = "http://localhost:8888/Fury-PHP/";
	
	// =========== 
	// ! Assets folder location   
	// =========== 
	
	$config['assets_url'] = "assets/";
	
	// =========== 
	// ! Index page
	// This would typically be the index.php file, or whatever it is the name of your route controller.
	// If you are mod_rew_writing this out of your URLS leave it blank.   
	// =========== 
	
	$config['index_page'] = "";
	
	// =========== 
	// ! Auto load libraries
	// =========== 
	
	$config['auto_load'] = array("db");
	
	// =========== 
	// ! Auto load models   
	// =========== 
	
	$config['auto_load_models'] = array();
			
	// =========== 
	// ! Database Config   
	// =========== 
	
	$config['database'] = array();
	
	// =========== 
	// ! Default database   
	// =========== 
	
	$config['database']['default'] = array(
		
		"user" => "root",
		"password" => "root",
		"database" => "fury",
		"host" => "localhost",
		"char_set" => "utf8",
		"dbcollat" => "utf8_general_ci"
		
	);
	
	// =========== 
	// ! Alternative databases can be listed here   
	// =========== 
	
	//For example: $config['database']['test'] = array();
	
	// =========== 
	// ! Auto connect  
	// =========== 
		
	$config['auto_db_connect'] = TRUE;	
	
	
	// =========== 
	// ! Basic routing   
	// =========== 
	
	define( 'APP_PATH' , ROOT .'application' .DS  );
	
	define( 'ASSETS_PATH' , ROOT .'assets' .DS );
	
	// =========== 
	// ! Uri protocol, determines how the application reads in
	// * The URI. You have the below options.
	// =========== 
	
	/*	
	| 'AUTO'			Default - auto detects
	| 'PATH_INFO'		Uses the PATH_INFO
	| 'QUERY_STRING'	Uses the QUERY_STRING
	| 'REQUEST_URI'		Uses the REQUEST_URI
	| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO
	*/
	
	$config['uri_protocol'] = "AUTO";
	
	// =========== 
	// ! Allowed URI Characters   
	// =========== 
	
	$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\@-';	
	
	// =========== 
	// ! Add a suffix to all the FURY generated urls  
	// =========== 
	
	$config['url_suffix'] = "";
	
	// =========== 
	// ! Enable query strings? 	
	// * By default FURY uses search-engine friendly segment based URLs:
	// * example.com/who/what/where/
	// *
	// * You can optionally enable standard query string based URLs:
	// * example.com?who=me&what=something&where=here  
	// =========== 
	
	$config['enable_query_strings'] = false;
	
	// =========== 
	// ! Default Controller   
	// =========== 
	
	$config['routes']['default_controller'] = "home/index";
	
	// =========== 
	// ! Turn on and off Templating   
	// =========== 
	
	$config['auto_templating'] = TRUE;
	
	// =========== 
	// ! Templating this will be the default header and footer loaded into your template view   
	// =========== 
	
	# Specify the folder containing your default template.
	
	$config['default_template'] = "default";
	