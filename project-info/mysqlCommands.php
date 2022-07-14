Mysql Commands:
For Export:
    mysqldump -u root -p Laravel58Coders > laravel58coders.sql

    For Single Table Export:
        mysqldump -p --user=root Laravel58Coders companies > companies.sql
        mysqldump -p --user=root Laravel58Coders customers > customers.sql
        mysqldump -p --user=root Laravel58Coders qand_a_s > qand_a_s.sql

For Import:
    mysql -u root -p Laravel58Coders < import_file.sql

    For Single Table Import:
        mysql -u root -p Laravelv58 < companies.sql
        mysql -u root -p Laravelv58 < customers.sql
        mysql -u root -p Laravelv58 < qand_a_s.sql

Granting Permission:
    GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root';
    ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';
    FLUSH PRIVILEGES;

Mysql Server Start/Stop/Restart:
    sudo service mysql stop;
    sudo service mysql start;
    service mysql restart

SHOW GLOBAL VARIABLES LIKE 'PORT';

