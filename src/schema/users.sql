drop table users;
CREATE TABLE `users` ( 
`id` int(10) NOT NULL AUTO_INCREMENT, 
`email` varchar(50) DEFAULT NULL, 
`password` varchar(50) DEFAULT NULL, 
PRIMARY KEY (`id`), KEY `id` (`id`) ) 
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;