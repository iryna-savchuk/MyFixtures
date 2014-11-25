MyFixtures
================
This is a console application for loading data from fixtures files to DB. It accepts file names as parameters when executing index.php wire console.

The file names are expected to match the model names, for example: post.ini, user.json, etc.

Application supports 2 models:

1. User (id, name, last_name, age) 

2. Post (id, name, text)

Also, only INI and JSON format of files are supported now. 

Some information on application structure:

1. Supporeted models are based on ActiveRecord pattern.  

2. Factory pattern is used for parser instance and model instance creation.

3. Singleton pattern is used to connect to DB. 

FOR TESTS: 
I created some files in directory named "fixtures" for testing this application. Feel free to use them. 
The database name can be changed in models/DB.php. It is now set to 'fixture_db'. You can use fixture_db.sql to import the test tables I used. 
