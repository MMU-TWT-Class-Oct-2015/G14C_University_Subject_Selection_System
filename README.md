#1) System Requirement
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



#2) Design Issues

#3) Implementation

## i) login.php 
- an interface allowing student to key in their student ID and password

## ii) login_process.php
- automatically runs after student submit 'form' from login.php
- obtained id and password from student who submitted
- establish connection to the database
- check whether ID exist (not exist, redirect ./login.php?error=1
- hash the password obtained the user (sha512)
- compare the hash password 
- if both hash password value are the same, redirect ./index.php
- else redirect ./login.php?error=1?

## iii) index.php
 - a welcome page after login
 - display all registered subjects
 - add subject and drop subject button
 
 
## iv) add_subject.php
 - Display subjects list based on student YEAR
 - Subject which have registered will not be display
 - Confirm button will be ENABLE when (totalSubj is more than 1 and less than 6)
 - totalSubj is calculated by (total subject registered +  number of checked box ticked)
 - form submitted to add_process.php

## v) add_process.php
 - automatically run after addsubj button is pressed
 - receive List (SubjectID) from add_subject.php
 - each List will be process one by one, SQL query will add the subjects into database one by one
 - bind_Param is used to prevent SQL injection
 - successful registering, redirect index.php?add=1

## vi) drop_subject/drop_proces
 - codes are almost same as add_subject & add_process

## vii) subject_info.php
 - obtained parameter through URL (using GET)
 - provide the details of the subject selected
 - 2 parameter --> $subject (subjectID), $path (path)
 - path is use for back purposes
 - if the Subject is clicked from index.php,  it will return to index.php when back is press
 - if the Subject is clicked from add_subject.php, it will then return to add_subject.php  
 
## viii) session_check.php
 - run in most of the php files
 - prevent student to indirect access php files by changing url directory
 - Student without valid session ID will be redirect to ./login.php?error=2
 
## xi) database_conn.php
 - a template for database connection
 - called on most php files 
 - reduce redundancy of codes 

#4) Evaluation
- A simple and user friendly design interface has been developed
- Student can register through the register interface provided
- Student can then login to the subject registration system
- Student can add and drop subject with the constrain provided from question

#5) "How to run the system"

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
