CREATE DATABASE oauth_laravel_client;
CREATE USER 'oauth_laravel_client'@'%' IDENTIFIED WITH mysql_native_password BY 'oauth_laravel_client';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, INDEX, DROP, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, REFERENCES ON oauth_laravel_client.* TO 'oauth_laravel_client'@'%';
