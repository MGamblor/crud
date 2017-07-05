# Land and Home Package Application

Simple CRUD (Create, Read, Update, Delete) application using HTML5, PHP, SQL, Bootstrap, JavaScript

## Installation 

1) Import database located in the folder named 'SQL File' to your DBMS
2) Update the database connection settings in 'dbconnect.php' to connect with the database
3) Load the site

## Features

*	Allow users to view house packages and their features
*	Allow users to edit the name of a particular house package
*	Create a new house packages
*	Delete selected house packages
*	Work on all size devices
*	Be prompted before deleting a house record
*	Handle basic errors including empty fields and errors communication with the database
*	Take security measures to prevent SQL Injection attacks

## Constraints

*	No house type can have the same name
*	House name can be no longer than 30 characters long
*	Input fields cannot be left blank
*	Input only accepts letters and numbers (Whitelisting)
*	Each house type has a pre-set description list of features (Relationship)
