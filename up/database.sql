CREATE TABLE `users` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    `first_name` VARCHAR(100) NOT NULL , 
    `last_name` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(200) NOT NULL , 
    `pwd` VARCHAR(200) NOT NULL,
    `qualification` TEXT NOT NULL , 
    `resume_url` VARCHAR(200) NOT NULL , 
    `profile_url` VARCHAR(200) NOT NULL 
) ENGINE = InnoDB;
