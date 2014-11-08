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

5.)  After that, simply navigate your browser to localhost/(name of directory you cloned to)