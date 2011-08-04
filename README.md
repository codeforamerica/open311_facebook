Tutorial
========================

This is a Facebook App for cities that use Open311.  It can be used as a Facebook Page Tab as well as a web application. ([Live Demo](http://stanfordrosenthal.com/open311)) 

Application Configuration
------------------------
- Upload these files to your server.
- If you don't see a file called .htaccess, rename htaccess-visible to .htaccess on your server.
- Rename config/constants-template.php to constants.php, and open it.
- Change `CITY_LAT`, `CITY_LONG`, `CITY_NAME`, and `STATE_ABBR` to the appropriate values.  Find your city's coordinates at [TravelMath](http://www.travelmath.com) (use decimal form, not degrees)
- **Optional:** change `PROJECT_NAME`, `PROJECT_DESCRIPTION`, `CONTACT_DISCLAIMER`, and `SUCCESS_MESSAGE` to whatever fits your needs.
- Keep this file open as you will need to change several settings throughout the installation process.

Privacy Policy
--------------
- Facebook requires a Privacy Policy for all apps. ([http://www.sf311.org/index.aspx?page=769](example))
- Facebook allows for a Terms of Service as well.  ([http://www.sf311.org/index.aspx?page=768](example))


Amazon S3 Configuration
----------------------
You'll need an Amazon AWS account to store user images on Amazon S3.  If you don't have an AWS account yet, go to [here](http://aws.amazon.com/s3/) and click Sign Up Now.

Note: Amazon S3 charges minimal [fees](http://aws.amazon.com/s3/pricing/) based on your usage.  It is unlikely that you will go over a few bucks a month.

Complete the registration and then follow these directions:

- Go to your [Amazon AWS console](https://console.aws.amazon.com/s3/home)
- Click "Create Bucket" and name your bucket (e.g. SF_open311_facebook)
- In config/constants.php, set `AMAZON_S3_BUCKET` to the name of your bucket.
- Go to the [Access Credentials page](https://aws-portal.amazon.com/gp/aws/developer/account/index.html?action=access-key#access_credentials) and click "Create a new Access Key" if there is not one already listed.
- You will need to copy the values under "Access Key ID" and "Secret Access Key" into config/constants.php where it says `AMAZON_S3_KEY` and `AMAZON_S3_SECRET` respectively. 

Open311 Configuration
---------------------
- Get your [Open311 API keys and Production API Url](http://wiki.open311.org/GeoReport_v2#Servers_.28can_receive_reports.29).  Copy these values into `OPEN_311_API_KEY` and `OPEN_311_API_URL` in config/constants.php, respectively.
- You will need to find out your jurisdiction ID (e.g. sfgov.org, cityofboston.gov, and dc.gov) and copy this into `OPEN_311_JURISDICTION_ID` in config/constants.php

Facebook Configuration
----------------------
You'll need to setup a new Facebook app.  This assumes you are already an administrator of your city's Facebook page.

- [Create an app](https://www.facebook.com/developers/createapp.php)
- After you complete the setup process, you will be brought to the "Basic Information" tab of your new app.  Complete this form, including Privacy Policy URL, and click "Save Changes."
- Click "Facebook Integration" on the left and scroll down to "Page Tabs"
- Fill in Tab Name (e.g. Open311) and  Tab URL.  The URL will be [base directory]/facebook.  Click Save Changes.
- You will be brought to your app's developer page.  You will need to copy the values under "App ID," "API Key," and "App Secret" into config/constants.php where it says `FACEBOOK_APP_ID`, `FACEBOOK_APP_KEY`, and `FACEBOOK_APP_SECRET`, respectively.
- Go to http://www.facebook.com/apps/application.php?id=[App ID] and click "Add to My Page" on the bottom left, and then select your city's page.
- Go to your city's page, and you should see your Open311 app on the left sidebar.  At this point, your app should be fully functional.
- **Optional:** Set this tab as the default view for your page by click "Edit Info" beneath your page's name, clicking "Manage Permissions" on the left sidebar, and then selecting your Open311 app in the "Default Landing Tab" dropdown.  Note: due to a bug in Facebook, you will still see the Wall by default, but other users to your page will see Open311 by default.  You can test this by logging out of Facebook and going to your page.
- **Tip:** Once your page has 25 "fans," you can get a custom URL by going to "Edit Info" > "Basic Information" and selecting a Username.  This will allow users to access your app at a URL like http://facebook.com/SF311.

Web Access
----------
You can access your new Open311 app outside of Facebook.  Simply navigate to the url of your app in your browser.

Development
===========
This app was originally designed and developed by Stanford Rosenthal for Code for America with guidance from The City of San Francisco and The City of Boston.  

Language: PHP (tested on PHP5)

Framework: [Codeigniter](http://codeigniter.com/)

Libraries
--------

- [API Baseclass Helper by Ronaldo Barbachano](https://github.com/codeforamerica/PHP-API-Template)
- [Open311_PHP by Ronaldo Barbachano](https://github.com/codeforamerica/open311_php)
- [Amazon-s3-php-class by Donovan Schönknecht](https://github.com/tpyo/amazon-s3-php-class)
- [Facebook Javascript SDK by Facebook](http://developers.facebook.com/docs/reference/javascript)
- [jQuery](http://jquery.com)
- [Google Maps Javascript API v3](http://code.google.com/apis/maps/documentation/javascript/)

Testing
------
There are no unit tests.  Some cities provide a development URL which allows you to submit test requests.

Future ideas
-------------
- A hosted solution with an admin setup page, which would allow cities to bypass steps 1-5 in Facebook Configuration and steps 1-3 in Application Configuration.
- A universal app that uses HTML5 to detect user's location and/or has a drop-down to select city.
- Integration with Code For America's 311Center project
- Mobile version (image uploading would be tricky)

Copyright
=========
Copyright (c) 2011 Code for America Laboratories

See [LICENSE](https://github.com/codeforamerica/open311_facebook/blob/master/LICENSE.md) for details.

[![Code for America Tracker](http://stats.codeforamerica.org/codeforamerica/open311_facebook.png)](http://stats.codeforamerica.org/projects/open311_facebook)