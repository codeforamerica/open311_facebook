Facebook app for open311
========================

For now get the config folder from a fresh CodeIgniter install.  I'll add them to the repo shortly.

Add these in your constants config file:

	define('FACEBOOK_APP_ID', 			'157847207617169');
	define('FACEBOOK_APP_SECRET', 		'9d393951fe8420e17739a826cc10ffd9');
	define('OPEN_311_API_KEY', 			'1O311AHX73NW26P');
	define('OPEN_311_URL', 				'https://open311.sfgov.org/v2');
	/* define('OPEN_311_URL', 				'https://open311.sfgov.org/dev/v2'); << DEV  */
	define('OPEN_311_JURISDICTION_ID', 	'sfgov.org');
	/* define('OPEN_311_URL', 				'https://mayors24.cityofboston.gov:6443/api/open311/v2'); */
	/* define('OPEN_311_JURISDICTION_ID', 	'cityofboston.gov'); */
	/* define('OPEN_311_URL', 				'http://311.dc.gov/cwi/Open311/v2'); */
	/* define('OPEN_311_JURISDICTION_ID', 	'dc.gov'); */
	define('AMAZON_S3_KEY', 			'');
	define('AMAZON_S3_SECRET', 			'');
	define('AMAZON_S3_BUCKET', 			'open311_facebook');
	define('CITY_LAT', 					'37.76786493289861');
	define('CITY_LONG', 				'-122.4436567104492');
	define('CITY_NAME', 				'San Francisco');
	define('STATE_ABBR', 				'CA');
	define('PROJECT_NAME', 				'Open311');
	define('PROJECT_DESCRIPTION', 		'Report a problem in your neighborhood');