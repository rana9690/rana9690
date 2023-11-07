<?php
// echo 'ddddd';
// die;
defined('BASEPATH') OR exit('No direct script access allowed');

$url_array=$_SERVER['REQUEST_URI'];

$config['base_url'] = 'http://efiling.cestat.local';
$config['index_page'] = '';
$config['uri_protocol']	= 'AUTO';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-+=';
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['allow_get_array'] = TRUE;
$config['log_threshold'] = 9;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = 'PASSWORDBCRIPT';

$config['sess_driver'] = 'database';//'files';
 $config['sess_cookie_name'] = 'ci_session';
 $config['sess_samesite'] = 'Lax';
 $config['sess_expiration'] = 1200;
 $config['sess_save_path'] = 'ci3_sessions';//sys_get_temp_dir();
 $config['sess_match_ip'] = FALSE;
 $config['sess_time_to_update'] = 300;
 $config['sess_regenerate_destroy'] = TRUE;

/*$config['sess_driver']             = 'files';
$config['sess_cookie_name']        = 'pcfx_session_';
$config['sess_expiration']         = 7200;
$config['sess_save_path']          = APPPATH.'writable';
$config['sess_match_ip']           = FALSE;
$config['sess_time_to_update']     = 300;
$config['sess_regenerate_destroy'] = FALSE;*/



$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= false;
$config['cookie_httponly'] 	= false;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = true;
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';


$config['cacheable']	= true; //boolean, the default is true
$config['cachedir']		= ''; //string, the default is application/cache/
$config['errorlog']		= ''; //string, the default is application/logs/
$config['quality']		= true; //boolean, the default is true
$config['size']			= ''; //interger, the default is 1024
$config['black']		= array(224,255,255); // array, default is array(255,255,255)
$config['white']		= array(70,130,180); // array, default is array(0,0,0)




/*custom config*/

$config['ia_privilege'] = false;
$config['site_name'] = 'Customs Excise And Service Tax Appellate Tribunal';
$config['isGdLib'] = false;
$config['caviat_privilege'] = false;
