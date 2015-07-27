# SilverStripe Custom Error Page Module
Custom Error Page Module for SilverStripe.  Select which template to use 
as a custom 404 or other error page type.

Maintainer Contacts
-------------------
*  DL Joseph (`<darrenleejoseph (at) gmail (dot) com>`)

Requirements
------------

* SilverStripe 3.1.x, 3.2+


Installation Instructions
-------------------------

Installation can be done either by composer or by manually downloading a release.

### Via composer

`composer require "dljoseph/silverstripe-custom-error-page:*"`

### Manually

 1.  Download the module from [the releases page](https://github.com/dljoseph/silverstripe-custom-error-page/releases).
 2.  Extract the file (if you are on windows try 7-zip for extracting tar.gz files
 3.  Make sure the folder after being extracted is named 'custom-error-page' 
 4.  Place this directory in your sites root directory. This is the one with framework and cms in it.
 5.  Visit `<yoursite.com>/dev/build/?flush` to rebuild the database.


Usage Overview
--------------
Once installed, the SilverStripe ErrorPage will be augmented with an additional field to allow the 
administrator to select which template to use for the error page.


### Templating
If you wish to use a different template for the ErrorPage, simply create a new 
SilverStripe template file, be sure to place it directly in the templates folder (above Layouts) and visit <yoursite>/?flush to flush the template cache. 
Afterwards, you must go to the ErrorPage in the CMS and manually select the 
template from the dropdown to tell SilverStripe which template to use to render the ErrorPage for display.


Known Issues
------------
There are no known issues.