<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['API_google_key']				= "AIzaSyBsZcFhkscQYgO4kDw85CS3GZZ_lEkbBNU";
//$config['API_google_key']				= "AIzaSyAozB4TyLW3uimfMEH0jpQeHEnMncbUaMk";

$config['google_around_distance']		= 5; //5kilometer

$config['max_trend_area']				= 6; //5 km
$config['maximal_nearest_facilities']	= 1; 
$config['list_nearest_facilities']		= array(
		array(
			"types" 		=> "restaurant",
			"name" 			=> "Tempat Makan",
			"min_distance"	=> 300
		),
		
		array(
			"types" 		=> "cafe",
			"name" 			=> "Kafe",
			"min_distance"	=> 750
		),
		array(
			"types" 		=> "bus_station",
			"name" 			=> "Terminal",
			"min_distance"	=> 750
		),
		array(
			"types" 		=> "department_store",
			"name" 			=> "Department Store",
			"min_distance"	=> 1500
		),
		array(
			"types" 		=> "grocery_or_supermarket",
			"name" 			=> "Supermarket",
			"min_distance"	=> 1500
		),
		array(
			"types" 		=> "hospital",
			"name" 			=> "Rumah Sakit",
			"min_distance"	=> 2000
		),

		array(
			"types" 		=> "train_station",
			"name" 			=> "Stasiun",
			"min_distance"	=> 1500
		),
		array(
			"types" 		=> "transit_station",
			"name" 			=> "Tempat Transit",
			"min_distance"	=> 500
		),
		array(
			"types" 		=> "university",
			"name" 			=> "Universitas",
			"min_distance"	=> 2500
		),
		array(
			"types" 		=> "shopping_mall",
			"name" 			=> "Mall",
			"min_distance"	=> 2500
		)
	);
	
$config['google_maps_id']				= 'AIzaSyDhylF0-iyJxNTAX1OweLID2L9jPFd_f5s';

$config['facebook_app_version']			= 'v2.12';
$config['facebook_app_id']				= '302263890278816';
$config['facebook_app_secret']			= '87e2202030ed89df553268a3bee1b49d';
$config['facebook_login_oauth_url']		= base_url()."login/authloginfacebook";

$config['google_login_client_id']		= '480934106557-7oo467cgsdtabg1udpcpc4q4s21jg0dt.apps.googleusercontent.com';
$config['google_login_client_secret']	= 'RRRKZjoK9PnerRhJZ6F76O0E';
$config['google_login_oauth_uri']		= base_url()."login/authlogingoogle";

$config['smtp_host']		            = 'ssl://smtp-pulse.com';
$config['smtp_port']		            = '465';
$config['smtp_user']		            = 'admin@otentiq.id';
$config['smtp_pass']		            = 'CQ8sptLqEB';

?>