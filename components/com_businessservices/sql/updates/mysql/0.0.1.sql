DROP TABLE IF EXISTS `#__bstrademark`;
 
CREATE TABLE `#__bstrademark` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `record_id` BIGINT(20) NOT NULL DEFAULT 0,
  `user_id` BIGINT(20) NOT NULL DEFAULT 0,
  `service_id` BIGINT(20) NOT NULL DEFAULT 0,
  `status` VARCHAR(50) NOT NULL DEFAULT 'processing',
  `applicant_name` VARCHAR(100) NULL,
  `doc_attachment_name` VARCHAR (100) NULL,
  `doc_attachment_link` VARCHAR (100) NULL,
  `doc_address_link` VARCHAR(100) NULL,
  `type` VARCHAR(100) NULL,
  `all_directors_fullname` VARCHAR(100) NULL,
  `signatory_fullname` VARCHAR(100) NULL,
  `signatory_phoneno` VARCHAR(100) NULL,
  `signatory_email` VARCHAR(100) NULL,
  `signatory_nationality` VARCHAR(100) NULL,
  `signatory_gaurdian_name` VARCHAR(100) NULL,
  `signatory_address` VARCHAR(100) NULL,
  `signatory_age` VARCHAR(100) NULL,
  `trademark_name` VARCHAR(100) NULL,
  `trademark_desc` VARCHAR(100) NULL,
  `trademark_state` ENUM('manufacturer','trader','serviceProvider') NULL,
  `service_created_on` DATE DEFAULT NULL,
  `service_address` VARCHAR(100) NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- INSERT INTO `#__bstrademark` (`greeting`) VALUES
--         ('Hello World!'),
--         ('Good bye World!');