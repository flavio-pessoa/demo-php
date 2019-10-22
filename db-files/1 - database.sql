CREATE USER 'demo_user'@'%' IDENTIFIED BY '!Q@W#E$R1q2w3e4r';
GRANT USAGE
ON
  *.* TO 'demo_user'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `demo_db` DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
GRANT ALL PRIVILEGES
ON
  `demo\_db`.* TO 'demo_user'@'%';
  
