########################################
Taskin - A micro Task Management Web App
########################################

`Taskin <https://taskin.herokuapp.com>`_ is an open source Web App Project that helps users to create, view, edit and delete tasks. All the tasks are shown in chronological order on the home page.

The project is built on top of PHP's lightest MVC framework `CodeIgniter <https://www.codeigniter.com/>`_ No External library is used, all the helper classes used are the default libraries provided by CodeIgniter. All code management protocols are maintained while developing this project. Run Composer update once to get all the dependencies. Scaffolding technique is used. Queries are written using CodeIgniter's Query Builder feature.

Different environments are defined for Production and Develoment Environment. 

Time zone used for the project is 'Asia/Kolkata'. Change it from index.php, if required.

*********
Repo Host
*********

Clone the repo from

git@github.com:irfyhaq/taskin.git

**************************
Features
**************************
* Create Tasks
* Edit Tasks
* Delete Tasks
* Mark it Closed/Open
* Set Chronological order to tasks

**************************
To DO :: Features
**************************

* Add Sorting of tasks on the basis of active and inactive tasks, Priority and Date.
* Forgot Password Link to recover password.
* Add Assignee to tasks.
* Make Time Zone dynamic depending on the user's location.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

********
Database
********

The Project is hosted on Heroku, hence PostgreSql is used as default databse as Heroku does not support SqLite3 driver.

Two tables are required to make it operational in postgreSql are as following : 

CREATE TABLE users(
   id  SERIAL PRIMARY KEY,
   username           TEXT      NOT NULL,
   password           TEXT       NOT NULL
);

CREATE TABLE tasks ( 
	id SERIAL PRIMARY KEY , 
	user_id INTEGER, 
	name TEXT, 
	date TEXT, 
	time TEXT, 
	priority INTEGER, 
	description TEXT, 
	status INTEGER 
);

NOTE :: You can use Date and Time dataType as well for Date and Time field respectively. But making it to text make it easy migration to Sqlite3 as well.

*********
CopyRight
*********

Author has got all the rights over the project.

*******************
Release Information
*******************
 v1.0.1

*********************
CodeIgniter Resources
*********************

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community IRC <https://webchat.freenode.net/?channels=%23codeigniter>`_

***************
Acknowledgement
***************

Thanks to CodeIgniter team for making the development smooth and fast and Heroku team for easy deployment.
