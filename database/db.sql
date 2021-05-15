CREATE TABLE `userprofile`(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `full_name` VARCHAR(100) NOT NULL,
    `gender` VARCHAR(6) NOT NULL,
    `dob` DATE NULL,
    `country` VARCHAR(100) NOT NULL,
    `nationality` VARCHAR(100) NULL,
    `residence_address` VARCHAR(200) NOT NULL,
    `user_email` VARCHAR(100) NOT NULL,
    `phone_no` VARCHAR(20) NOT NULL,
    `contact_person_name` VARCHAR(100) NOT NULL,
    `contact_person_phone_no` VARCHAR(20) NOT NULL,
    `relationship` VARCHAR(50) NOT NULL,
    `passport_no` VARCHAR(50) NOT NULL,
    `facebook_profile` VARCHAR(300) NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB


CREATE TABLE `lara_hyd`.`committee`(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(300) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;




CREATE TABLE `lara_hyd`.`event_registration`(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `event_id` INT(11) NOT NULL,
    `committee` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `country` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `previous_experience` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `accommodation` INT(1) NOT NULL,
    `food` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `visa_requirement` INT(1) NOT NULL,
    `passport_name` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `passport_no` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `expiry_date` DATE NOT NULL,
    `dob` DATE NOT NULL,
    `willingness_to_perform` INT(1) NOT NULL,
    `performance_name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
     `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;



CREATE TABLE `lara_hyd`.`registration_fees`(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `event_id` INT(11) NOT NULL,
    `amount` FLOAT(20) NOT NULL,
    `currency` VARCHAR(20) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;




CREATE TABLE `lara_hyd`.`admin_table`(
    `id` INT(11) UNSIGNED NULL AUTO_INCREMENT,
    `award` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `document_name` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `document_path` VARCHAR(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `notice_name` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `notice_path` VARCHAR(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;


CREATE TABLE `lara_hyd`.`clubs` ( 
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , 
    `committee_id` INT(11) NOT NULL , 
    `club_name` INT NOT NULL , 
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`club_name`)
) ENGINE = InnoDB;




CREATE TABLE `lara_hyd`.`comm_n_club`(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `club_id` INT(11) NOT NULL,
    `committee_id` INT(11) NOT NULL,
    `club_name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `committee_name` INT(100) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;


CREATE TABLE `lara_hyd`.`admin_upload` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT , 
    `user_id` INT(11) NOT NULL , 
    `file_name` VARCHAR(200) NOT NULL , 
    `file_path` VARCHAR(200) NOT NULL , 
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;


CREATE TABLE `lara_hyd`.`notice_upload` (
 `id` INT(11) NOT NULL AUTO_INCREMENT , 
 `event_id` INT(11) NOT NULL , 
 `committee_id` INT(11) NOT NULL , 
 `file_name` VARCHAR(200) NOT NULL , 
 `file_path` VARCHAR(200) NOT NULL , 
 `created_at` TIMESTAMP NULL DEFAULT NULL,
 `updated_at` TIMESTAMP NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
 ) ENGINE = InnoDB;



CREATE TABLE `lara_hyd`.`admin_fileUpload`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `event_id` INT(11) NOT NULL,
    `committee_id` INT(11) NOT NULL,
    `file_name` VARCHAR(200) NOT NULL,
    `file_path` VARCHAR(300) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;

ALTER TABLE
    `events` ADD `registration_fee` DECIMAL(10, 2) NOT NULL AFTER `name`,
    ADD `currency` CHAR(3) NOT NULL AFTER `registration_fee`;