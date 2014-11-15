The Emerald
============

Image sharing site where users can upload and edit images.



Setting Up
============

Our site is built with HTML5, JQuery, CSS 3, PHP 5.4, and MySQL.  For a development stack we are all using WAMP for windows (local server running Apache).  On Mac you would want to use MAMP or something similar, and on Linux LAMP would work as well.  At a slightly later date we might load the project onto Amazon EC2, or maybe just a cheap shared hosting account.

1.)  The first step is to clone our repository into the web root directory of your local dev environment

2.)  Now fire up your local development stack

3.)  You'll need to import a backup of our database into your local MySQL database.  The backup can be found as the capture.sql file in the root directory of our repository.  

4.)  The database config file can be found at includes/config.php, so you can change the database username and password for login to your local environment.  

5.)  We are using composer as our package manager, and you'll need it installed in order to pull in the dependencies needed to run the unit tests.  We'll cover this in the next section.

6.)  After that, simply navigate your browser to localhost/(name of directory you cloned to)

Unit Testing
=============

Our unit testing is built on PHP Unit and the Mockery library, which are listed as required dependencies via our composer.json file.

First, you'll need to have Composer package manager installed or you'll need to install it.  Then, from the Windows Powershell, or via the terminal with Mac or LInux, you can simply run the command: composer install

This will automatically pull in the dependencies which are needed to run the unit tests.  To actually run the tests, follow the instructions below.

For Windows:

1.)  We haven't yet tested this with the windows CMD line, but it runs well when using the 'Git Shell', or Powershell for windows.  

2.) In order to run the tests, navigate your shell to the root of our repository

3.) Enter the path of the PHPUnit binary like so:  vendor/bin/phpunit

4.) Hit "Enter", and the tests will run

For Mac or Linux:

1.)  We have not tested with Mac or Linux yet, but it should work with the default CLI's for either of those environments, given that Powershell is a Windows tool which emulates the Bash functionality.

2.)  Navigate to the root of our repo

3.)  Enter the path of phpunit: vendor/bin/phpunit

4.)  Hit "Enter"
