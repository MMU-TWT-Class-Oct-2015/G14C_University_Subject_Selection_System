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
 


#4) Evaluation
- A simple and user friendly design interface has been developed
- Student can register through the register interface provided
- Student can then login to the subject registration system
- Student can add and drop subject with the constrain provided from question
