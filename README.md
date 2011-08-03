Tutorial
========================

This is a Facebook App for cities that use Open311.  It can be used as a Facebook Page Tab as well as a web application.  A live demo of the web application version is at http://stanfordrosenthal.com/open311

Application Configuration
------------------------
- Upload these files to your server.
- Rename htaccess to .htaccess on your server.
- Open config/constants.php
- Change CITY_LAT, CITY_LONG, CITY_NAME, and STATE_ABBR to the appropriate values.  Find your city's coordinates at http://www.travelmath.com (use decimal form, not degrees)
- Keep this file open as you will need to change several settings throughout the installation process.

Privacy Policy
--------------
- Facebook requires a Privacy Policy for all apps.  For an example privacy policy, see http://www.sf311.org/index.aspx?page=769.
- Facebook allows for a Terms of Service as well.  For an (outdated) example Terms of Service, see http://www.sf311.org/index.aspx?page=768

Facebook Configuration
----------------------
You'll need to setup a new Facebook app.

- Go to https://www.facebook.com/developers/apps.php and click "+ Set Up New App"
- Complete the setup process.  You will be brought to the "Basic Information" tab of your new app.  Complete this form, including Privacy Policy URL, and click "Save Changes."
- Click "Facebook Integration" on the left and scroll down to "Page Tabs"
- Fill in Tab Name (e.g. Open311) and  Tab URL.  The URL will be [base directory]/facebook.  Click Save Changes.
- You will be brought to your app's developer page.  You will need to copy the values under "App ID," "API Key," and "App Secret" into config/constants.php where it says FACEBOOK_APP_ID, FACEBOOK_APP_KEY, and FACEBOOK_APP_SECRET, respectively.

Amazon S3 Configuration
----------------------
You'll need an Amazon AWS account to store user images on Amazon S3.  If you don't have an AWS account yet, go to http://aws.amazon.com/s3/ and click Sign Up Now.

Note: Amazon S3 charges a minimal fee based on your usage.  It is unlikely that you will go over a few bucks a month.  For details, see http://aws.amazon.com/s3/pricing/

Complete the registration and then follow these directions:

- Go to https://console.aws.amazon.com/s3/home
- Click "Create Bucket" and name your bucket (e.g. SF_open311_facebook)
- In config/constants.php, set AMAZON_S3_BUCKET to the name of your bucket.
- Go to https://aws-portal.amazon.com/gp/aws/developer/account/index.html?action=access-key#access_credentials and click "Create a new Access Key" if there is not one already listed.
- You will need to copy the values under "Access Key ID" and "Secret Access Key" into config/constants.php where it says AMAZON_S3_KEY and AMAZON_S3_SECRET respectively. 

Open311 Configuration
---------------------
- Go to http://wiki.open311.org/GeoReport_v2#Servers_.28can_receive_reports.29 for Open311 API keys and Production API Url.  Copy these values into OPEN_311_API_KEY and OPEN_311_API_URL in config/constants.php, respectively.
- You will need to find out your jurisdiction ID (e.g. sfgov.org, cityofboston.gov, and dc.gov) and copy this into OPEN_311_JURISDICTION_ID in config/constants.php

Web Access
----------
You can access your new Open311 app outside of Facebook.  Simply navigate to the url of your app in your browser.

Development
===========
This app was originally designed and developed by Stanford Rosenthal for Code for America with guidance from The City of San Francisco and The City of Boston.  

Language: PHP (tested on PHP5)

Framework: Codeigniter (http://codeigniter.com/)

Libraries
--------

- API Baseclass Helper by Ronaldo Barbachano (https://github.com/codeforamerica/PHP-API-Template)
- Open311_PHP by Ronaldo Barbachano (https://github.com/codeforamerica/open311_php)
- Amazon-s3-php-class by Donovan Schönknecht (https://github.com/tpyo/amazon-s3-php-class)
- Facebook Javascript SDK by Facebook (http://developers.facebook.com/docs/reference/javascript)
- jQuery (http://jquery.com)
- Google Maps Javascript API v3 (http://code.google.com/apis/maps/documentation/javascript/)

Testing
------
There are no unit tests.  Some cities provide a development URL which allows you to submit test requests.

Copyright
=========
Copyright (c) 2011 Code for America Laboratories

See [LICENSE](https://github.com/codeforamerica/open311_facebook/blob/master/LICENSE.md) for details.

[![Code for America Tracker](http://stats.codeforamerica.org/codeforamerica/open311_facebook.png)](http://stats.codeforamerica.org/projects/open311_facebook)