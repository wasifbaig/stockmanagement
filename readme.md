
--------------------
Execution Steps
--------------------

2. Goto project directory

3. Download project dependencies <br />
composer install

4. Create database with name "eqs"

5. Create tables in database with pre-fill dataset <br />
php artisan migrate:fresh --seed

6. Run server <br />
php artisan serve

7. Visit localhost:8000/login

8. Login Credentials <br />
Email : admin@eqs.com <br />
Password : admin <br />

9. Run test cases <br />
vendor\bin\phpunit tests/unit/EqsTest.php
