CREATE TABLE IF NOT EXISTS users (
    id INT(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    pass varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB3;
