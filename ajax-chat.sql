
DROP DATABASE IF EXISTS `ajaxchat`;

CREATE DATABASE `ajaxchat` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

DROP USER 'ajaxchatuser'@'localhost';

CREATE USER 'ajaxchatuser'@'localhost' IDENTIFIED BY 'We Love SQL API!';
GRANT ALL PRIVILEGES ON `ajaxchat`.*  TO 'ajaxchatuser'@'localhost'; 

USE `ajaxchat`;

CREATE TABLE `message` (
    `id`INT AUTO_INCREMENT PRIMARY KEY,
   
    `text` TEXT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL
);




