<?php

	$tbl_users = "CREATE TABLE `videotube`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(21) NOT NULL , `password` TEXT NOT NULL , `firstname` VARCHAR(51) NOT NULL , `lastname` VARCHAR(51) NOT NULL , `email` VARCHAR(65) NOT NULL , `profilePic` TEXT NOT NULL , `signUpDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	$tbl_subscribers = "CREATE TABLE `videotube`.`subscribers` ( `id` INT NOT NULL AUTO_INCREMENT , `userFrom` INT NOT NULL , `userTo` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";