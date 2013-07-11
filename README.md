All the files in this folder and subfolders use the data in the default database sakila installed with mySQL

mysql.php - configuration file for database connection, used by all the .php files in this folder and subfolders.
Change the database connection parameters in this file to connect to your instance of the database.

actorxml.php - outputs the data in the actor table as XML to the browser.

customer.php - displays a list of customers paginated by month on payment date. This uses the customer and payment tables.
The default behaviour is to display data from the latest month in the database. User can choose other months using links at the bottom of the page.

admin - This folder contains a set of files which provide admin screens to manage the film_text table. 
User will need to login using a username from the staff table to get access to these screens.
An authorised user can Insert, Update, Delete and View the data using these screens. 