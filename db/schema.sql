DROP DATABASE central;

CREATE DATABASE IF NOT EXISTS central;
USE central;

CREATE TABLE IF NOT EXISTS `organization` (
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `location` (
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `skill` (
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `fullname` text,
  `password` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `join_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `volunteer` (
  `id` bigint(20) NOT NULL,
  `email` text,
  `org_name` varchar(100),
  `designation` text,
  `location_name` varchar(100),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES user(`id`),
  FOREIGN KEY (`org_name`) REFERENCES organization(`name`),
  FOREIGN KEY (`location_name`) REFERENCES location(`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `provider` (
  `id` bigint(20) NOT NULL,
  `email` text,
  `org_name` varchar(100),
  `designation` text,
  `location_name` varchar(100),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES user(`id`),
  FOREIGN KEY (`org_name`) REFERENCES organization(`name`),
  FOREIGN KEY (`location_name`) REFERENCES location(`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `seeker` (
  `id` bigint(20) NOT NULL,
  `experience` int(4),
  `pref_location_name` varchar(100),
  `curr_location_name` varchar(100),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES user(`id`),
  FOREIGN KEY (`pref_location_name`) REFERENCES location(`name`),
  FOREIGN KEY (`curr_location_name`) REFERENCES location(`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `volunteer_registration` (
  `volunteer_id` bigint(20) NOT NULL,
  `seeker_id` bigint(20) NOT NULL,
  PRIMARY KEY (`seeker_id`),
  FOREIGN KEY (`seeker_id`) REFERENCES seeker(`id`),
  FOREIGN KEY (`volunteer_id`) REFERENCES volunteer(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `verificationStatus` (
  `id` bigint(20) NOT NULL,
  `code` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`, `code`),
  FOREIGN KEY (`id`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `job` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `post_date` timestamp NOT NULL,
  `posted_by_id` bigint(20) NOT NULL,
  `skill_required` varchar(100) NOT NULL,
  `positions` bigint(20) NOT NULL,
  `start_time` date NOT NULL,
  `location_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`posted_by_id`) REFERENCES provider(`id`),
  FOREIGN KEY (`skill_required`) REFERENCES skill(`name`),
  FOREIGN KEY (`location_name`) REFERENCES location(`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `permanent_job` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES job(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `temporary_job` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `duration` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES job(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `seeker_skill` (
  `seeker_id` bigint(20) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  PRIMARY KEY (`seeker_id`, `skill_name`),
  FOREIGN KEY (`seeker_id`) REFERENCES seeker(`id`),
  FOREIGN KEY (`skill_name`) REFERENCES skill(`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;