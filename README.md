#1) Introduction about your system.
 - Student Subject Registration System.
 - A user friendly system that allowed user to interact with the system to register or drop subject

#2) Scope of the project
- Student are able to view all their registered subject
- Student are able to register or drop their subject through an interface

#3) System Requirement
##* Outline the aim and objective of system 
- allow student with valid credential to access the subject registration system
- allow student to add and drop subject 
- system will automatically process the subject selected, and update the selected subject into the database
- simple and user friendly design

##* Clarify potential user and specific requirement
- *potential user* : Student
- *specific requirement* : A computer/laptop/smart devices with intranet access to the server

##* Evaluate the required hardware, software platform 
- __Hardware__

  Server           - a normal standard computer running on Xampp

  Client (Student) - a device (computer/smart devices) with access to the server intranet

- __Software__

  Server-Xampp (Apache & MYSQL)

  Client-browser


##* Consider delivery platform – running on network or stand alone
- server running on intranet
- client access server html/php files through intranet (xampp: apache/MySQL)



#4) Design Issues

#5) Implementation

## i) login.php 
- an interface allowing student to key in their student ID and password
- required attribute is used for form control instead of js: accepting only 10 characters for username
- form(id, password) is submitted to login_process.php via POST method 

## ii) login_process.php
- establish connection to the database
- if entered id doesn't match any id in the database, user is redirected to ./login.php?error=1
- password obtained by the user is hashed using sha512
- compare the hash passwords 
- if both hashed password values are the same, user is redirected ./index.php
- else redirect ./login.php?error=1?
- login.php able to detect GET parameter variable(error) and error message is displayed depending on the value (1 or 2)

## iii) index.php
 - a welcome page after login
 - display all registered subjects
 - contain "add subject" and "drop subject" button
 - "add subject" is disabled when 5 subjects are registered
 - "drop subject" button is disabled when no subject is registered
 
## iv) add_subject.php
 - Display subjects list based on student YEAR
 - Subject which have registered will not be display
 - Confirm button will be ENABLE when (totalSubj is more than 1 and less than 6)
 - totalSubj is calculated by (total subject registered +  number of checked box ticked)
 - confirmation box will appear, showing the subject(s) that will be enrolled
 - form is submitted to add_process.php

## v) add_process.php
 - receive List (arrays of SubjectID) from add_subject.php
 - each List will be processed one by one, SQL query will add the subjects into database one by one
 - bind_Param is used to prevent SQL injection
 - successful registering, redirect index.php?add=1
 - index.php able to detect GET parameter variables(add or drop) and alert box will be displayed depending on the variables

## vi) drop_subject/drop_proces
 - codes are almost same as add_subject & add_process

## vii) subject_info.php
 - subject codes appear in index.php, add_subject.php and drop_subject.php are clickable and is redirected to this page
 - obtained parameter through URL (using GET)
 - provide the details of the subject selected
 - 2 parameter --> $subject (subjectID), $path (path)
 - path is used to record the file name of last page for back purposes:
 - if the Subject is clicked from index.php,  it will return to index.php when back is press
 - if the Subject is clicked from add_subject.php, it will then return to add_subject.php  
 
## viii) session_check.php
 - run in most of the php files
 - prevent student to indirect access php files by changing url directory
 - Student without valid session ID (not logged in) will be redirect to ./login.php?error=2
 
## xi) database_conn.php
 - a template for database connection
 - called on most php files 
 - reduce redundancy of codes 

## x) logout.php
 - logout button is present in index, add/drop subject and subject info pages
 - unset session
 - redirect to ./login.php

## screenshots
 - ![Alt text](http://i.imgur.com/Q4KpfYr.jpg "register account")
 - ![Alt text](http://i.imgur.com/t9xI1s7.jpg "log in")
 - ![Alt text](http://i.imgur.com/Q4KpfYr.jpg "enroll subject")
 - ![Alt text](http://i.imgur.com/iOmpYnK.jpg "extras")

#6) Evaluation
- A simple and user friendly design interface has been developed
- Student can register through the register interface provided
- Student can then login to the subject registration system
- Student can add and drop subject with the constrain provided from question

#7) "How to run the system"

##CREATE DATABASE
i) Install Xampp v5.6.15 _https://www.apachefriends.org/index.html_

ii) After installation, enable Apache & MySQL

iii) make sure Apache listening to port 80,443 and MYSQL on port 3306

iv) Open your preferred browser, URL: _localhost/phpmyadmin_

v) Create new database using the query: _CREATE DATABASE twt_

vi) Import sql (twt.sql) from the repository into the Database

##MOVE FILES INTO C:\xampp\htdocs\

i) use _git CMD_

ii) change directory to _C:\xampp\htdocs\_

_cd C:\xampp\htdocs\_

iii) clone the repository G14C_University_Subject_Selection_System

_git clone "https://github.com/Nic-chan/G14C_University_Subject_Selection_System.git"_

iv) a new folder G14C_University_Subject_Selection_System will be created

##ACCESS SYSTEM

i) Open up a preferred Browser

ii) Change URL: _localhost/G14C_University_Subject_Selection_System/login.php_

iii) A login page will be displayed to the user

- default user name : __1234567890__

- default password  : __123456__

- ~User can choose Register at the bottom right to register a new account

v) After logging in, it will redirect user to _index.php_

vi) _index.html_ will display all registered subject of student
- _addsubject_ button and _dropsubject_ button is available

vii) 
_addsubject_ button will redirect user to the add_subject.php
_dropsubject_ button will redirect user to the drop_subject.php

viii) a _logout_ button is available at the top right corner of the page

##HTTPS forced connection

i) open C:\xampp\apache\conf\httpd.conf

ii) open httpd.conf in repository

iii) copy the codes from https.conf (git repo) into C:\xampp\apache\conf\httpd.conf __TOP of files__
