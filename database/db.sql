CREATE TABLE IF NOT EXISTS `user` (
`userId` int  NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(40) NOT NULL,
	PRIMARY KEY (userId)
)

ALTER TABLE `user`
AUTO_INCREMENT = 20200;

