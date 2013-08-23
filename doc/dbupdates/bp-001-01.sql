/*[5:14:34 PM][135 ms]*/
CREATE TABLE `breakpoint`(
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `trace` TEXT,
  `unique_id` VARCHAR(255) CHARSET utf8 NOT NULL,
  `created_dts` TIMESTAMP NOT NULL,
  KEY(`id`)
) ENGINE=MYISAM CHARSET=utf8 COLLATE=utf8_general_ci;
