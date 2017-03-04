# CodeIgniter Rest Server utilization for Crud feature for user table.

https://github.com/shannlove/rest-api-with-codeigniter3

User table structure is following 

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;


A fully RESTful server api implementation for CodeIgniter 3
## Requirements

1. PHP 5.4 or greater
2. CodeIgniter 3.0+


I have used https://github.com/chriskacerguis/codeigniter-restserver to create mine implmentation of it.

