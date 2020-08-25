use mysql;
UPDATE mysql.user SET authentication_string=null WHERE User='root';
FLUSH PRIVILEGES;

ALTER USER 'root'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'r00t';


CREATE DATABASE php_course;

CREATE USER 'course'@'localhost' IDENTIFIED BY 'c0urse';
GRANT ALL ON php_course.* TO 'course'@'localhost';
FLUSH PRIVILEGES;