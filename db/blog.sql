--
-- File generated with SQLiteStudio v3.1.1 on dim. nov. 12 19:05:25 2017
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: categorization
CREATE TABLE categorization (category_id INTEGER NOT NULL, post_id INTEGER NOT NULL);
INSERT INTO categorization (category_id, post_id) VALUES (1, 1);
INSERT INTO categorization (category_id, post_id) VALUES (2, 1);

-- Table: category
CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT, title VARCHAR (30) NOT NULL UNIQUE);
INSERT INTO category (id, title) VALUES (1, 'Database');
INSERT INTO category (id, title) VALUES (2, 'Php');

-- Table: post
CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT, title VARCHAR (30) NOT NULL, body TEXT, date_published DATE, is_published BOOLEAN DEFAULT (0), user_id INTEGER NOT NULL);
INSERT INTO post (id, title, body, date_published, is_published, user_id) VALUES (1, 'LessQL guide', 'LessQL is a lightweight and efficient alternative to Object-Relational Mapping for PHP.', '2017-11-11', 1, 1);

-- Table: user
CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT, name VARCHAR (30) NOT NULL);
INSERT INTO user (id, name) VALUES (1, 'Alice');
INSERT INTO user (id, name) VALUES (2, 'Bob');
INSERT INTO user (id, name) VALUES (14, 'Charlie');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
