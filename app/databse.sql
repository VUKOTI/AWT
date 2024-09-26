CREATE DATABASE IF NOT EXISTS student_management;
USE student_management;

CREATE TABLE IF NOT EXISTS student (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    course VARCHAR(100)
);
SHOW TABLES;

INSERT INTO student (name, age, course) VALUES ('Vamsi', 20, 'B.Tech');
INSERT INTO student (name, age, course) VALUES ('Dileep', 62, 'M.Tech');
INSERT INTO student (name, age, course) VALUES ('Javeed', 100, 'P.hd');

SELECT * FROM student;
DELETE FROM student WHERE age = 62;
