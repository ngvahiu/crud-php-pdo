create database test_pdo;

use test_pdo;

CREATE TABLE tasks (
    id int auto_increment,
    name varchar(255) NOT NULL,
    done boolean DEFAULT false,
    PRIMARY KEY (id)
);