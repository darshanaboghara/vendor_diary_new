<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '797061690576-9l8anl03tvgj7vi02a8jreav8tr6f3t6.apps.googleusercontent.com';
$config['google']['client_secret']    = '2MrtXbEBNowqYhmtHT_g6zwT';
$config['google']['redirect_uri']     = 'https://vendordiary.com/';
$config['google']['application_name'] = 'Login to vendordiary.com';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();