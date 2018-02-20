
--------------------
Execution Steps
--------------------

2. Goto project directory

3. Download project dependencies 
composer install

4. Create database with name "eqs"

5. Create tables in database with pre-fill dataset
php artisan migrate:fresh --seed

6. Run server
php artisan serve

7. Visit localhost:8000/login

8. Login Credentials
Email : admin@eqs.com
Password : admin

9. Run test cases
vendor\bin\phpunit tests/unit/EqsTest.php
