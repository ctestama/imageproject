The Emerald
============

Image sharing site where users can upload and edit images.  This site is now up and running on cloud host digitalocean.com at the domain:     testamarck.com/emerald



Setting Up
============

Our site is built with HTML5, JQuery, CSS 3, PHP 5.4, and MySQL.  For a development stack we are all using WAMP for windows (local server running Apache).  On Mac you would want to use MAMP or something similar, and on Linux, LAMP would work as well.

1.)  The first step is to clone our repository into the web root directory of your local dev environment

2.)  Now fire up your local development stack

3.)  You'll need to import a backup of our database into your local MySQL database.  The backup can be found as the capture.sql file in the root directory of our repository.  

4.)  The database config file can be found at includes/config.php, so you can change the database username and password for login to your local environment.  

5.)  We are using composer as our package manager, and you'll need it installed in order to pull in the dependencies needed to run the unit tests.  We'll cover this in the next section.

6.)  After that, simply navigate your browser to localhost/(name of directory you cloned to)

Unit Testing and Functional Testing
====================================

Our test suite resides in the tests/ directory.  There is a unitTest.php, and a functionalTest.php file.  These respectfully contain the unit and functional tests for our code.  

The unit testing is built on PHPUnit and the Mockery library, which are listed as required dependencies via our composer.json file.  The functional testing runs via selenium server, facebook/webdriver, and requires a Java JRE installation in order to run (Selenium). In order to run the tests, the required libraries will need to be installed via Composer.  

The composer.phar file resides in the root directory of the project, and to install all dependencies, simply navigate to the root with Powershell (or terminal) and run the command: 
php composer.phar install

This will automatically pull in the dependencies which are needed to run the unit tests.  To actually run the tests, follow the instructions below. Again, you will need to make sure that you have a valid Java Runtime Environment installed in order to run the Selenium server.

(Note: As of this time functional tests are unfinished, and right now only includes an example from http://codeception.com/11-12-2013/working-with-phpunit-and-selenium-webdriver.html)

For Windows:

1.)  This has been fully tested using the Powershell for windows (known as 'Git Shell' if installed by Github)  

2.) In order to run the tests, navigate your shell to the root of our repository.  For example, in Windows (with default Wamp installation) you'd type: 
cd /wamp/www/imageproject

3.) The tests all run as one suite, so you'll need Selenium server enabled in order for the functional tests to run 

4.) Start the Selenium server.  We've included a runSelenium.bat file, which you can double click to automatically start the server in Windows

5.) Using Powershell from the root of the repository, enter the path of the PHPUnit binary to run:  vendor/bin/phpunit

6.) Hit "Enter", and the tests will run

For Mac or Linux:

1.)  We have not tested with Mac or Linux yet, but these directions should work with the default terminal for either, given that Powershell is a Windows tool which emulates the Bash functionality.

2.)  Navigate the terminal to the root of the repo

3.)  Start the selenium server via command: 
java -jar .\selenium-server-standalone-2.44.0.jar

4.)  In a second terminal window, navigate to the repo root and enter the path of the phpunit binary: vendor/bin/phpunit

5.)  Hit "Enter"
