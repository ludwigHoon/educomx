# User Manual


## Deployment on the Raspberry Pi 
When the application is planned to be accessible from a Raspberry Pi: more specifically on the ‘Library In a Box’ platform, the application files need to be placed in the right directory, and a link should be provided from the landing page on the ’Library in a Box’. 


### Adding content:


On the raspberryPI, the files can be added to the following directory:
    /var/www/html/educomx

Pull all the files from Github and place them in this folder. Than, update the index.php file in the var/www/html and add a link to the index.php file of the educomx directory: educomx/proto/index.php

When deployed on the library in a box, a database needs to be set-up on the device. More details on this will be covered in 2 sections from here: ‘Database setup and access’.


## Potential deployment on the web
When this project is wanted to be deployed on a web hosting server, not too much extra effort is required. A hosting package with a database is needed. That, downloading the source files and placing them on the server via FTP should make the application accessible on the domain name URL that it is planned to be deployed on. The somewhat more tricky part is the database set-up, which will be discussed now.

#### Database setup and access
Since the content of the quizzes and content reader are dynamically loaded, the database needs to be properly set-up and connected to the application. On the Raspberry Pi where the application is currently installed on, the following credentials are used: 

To access the database for changing, copying or retrieving data or information structures, PHPmyadmin installed on the Pi can be used. 

On the Raspberry Pi:     
1. Open a web browser 
2. Go to the URL: localhost/phpmyadmin
3. Login with the suitable credentials.
4. you can access the database tables and their respective contents from here.  

On an external device:
1. connect to the raspberry pi wifi
2. open a web browser 
3. Go to the URL: http://172.24.1.1/phpmyadmin/    
4. Login with the suitable credentials.
5. you can access the database tables and their respective contents from here.  

How to access the Library in a box and included content on any device:
    
Connect to the Raspberry Pi using the Library in a Box 2 network.
Login using password: 12345678
Open a browser. Note: Application was tested on Chrome version 67.0.3396.87.
 Go to the URL: http://172.24.1.1/

Database installment on the Raspberry Pi can be done by following a tutorial. 

EduComX content adding

To add content to the EduComX platform, the following steps need to be followed:
For 1 new section:
Collect 12 pages of comic books (4 sets of 3 pages)
Create a question for each set of pages (4 questions total)
For each question, 4 possible answers should be provided, of which 1 being the correct answer.
An eye catching gif or image for the section.
A sound that gets played when the pages are loaded.

How to make the section show up on the platform:
Upload the comic book pages in the following way:
Go to the directory within the application: .../proto/contentreader/images/
Create a new directory that should be named the highest number in the folder, + 1 (so if the highest number is now 4, create a directory named 5). 
Name the image files: page1.jpg up and to page12.jpg.
Upload a gif or image that will serve as an eye-catching icon for your section.
Upload an entry sound when your pages are loaded: name it: sound.mp3.

Enter the questions to the database:
Go to the following page on a web browser: <location of application>/proto/CreateSection.php
Fill in the form completely and correctly. 
As the validation code, insert: ‘kasadaka’.
