CREATE DATABASE IF NOT EXISTS central;
USE central;

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `volunteer` (
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `provider` (
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `seeker` (
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;