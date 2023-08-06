# Mpepho Edwill Themba Black List System
# System requirement
1. Apache server, Mysql/Mariabd and PHP
2. Composer
3. Redis server for managing queue when importing large csv
# How to run the application
1. Copy the application to a suitable directory such htdocs or www
2. Import database or simple create a new database jsbclabdb.
3. Open terminal of choice and navigate to the application directory
4. Run the php artisan migrate to creates all the tables.
5. Run the php artisan db:seed to create users and fill the users table
6. Run php artisan serve and then copy this url http://localhost:8000/ to
   the browser of choice and  the password for all users is admin and you can 
   view users email by navigating the users table
7. If you have logged successfuly a dashboad will welcome you and you can add student
   and school and view them.
8. I also imported the database is called jsbclab.sql you can use it.