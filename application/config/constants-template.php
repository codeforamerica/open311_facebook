<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('FACEBOOK_APP_ID', 			'');
define('FACEBOOK_APP_SECRET', 		'');
define('OPEN_311_API_KEY', 			'');
define('OPEN_311_URL', 				'https://open311.sfgov.org/dev/v2');
define('OPEN_311_JURISDICTION_ID', 	'sfgov.org');
define('AMAZON_S3_KEY', 			'');
define('AMAZON_S3_SECRET', 			'');
define('AMAZON_S3_BUCKET', 			'sf_open311_facebook');
define('CITY_LAT', 					'37.76786493289861');
define('CITY_LONG', 				'-122.4436567104492');
define('CITY_NAME', 				'San Francisco');
define('STATE_ABBR', 				'CA');
define('CONTACT_DISCLAIMER', 		'This contact info lets departments contact you for more information. Your email also allows you to track your service request.');
define('PROJECT_NAME', 				'Open311');
define('PROJECT_DESCRIPTION', 		'Report a problem in your neighborhood');
define('SUCCESS_MESSAGE', 			''); // Optional text after "Your request ID isÉ"


/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */