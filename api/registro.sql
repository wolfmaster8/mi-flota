

CREATE TABLE `users` (
  `id` int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `document` int(25) NOT NULL,
  `email` varchar(50) UNIQUE NOT NULL,
    `password` varchar(255) NOT NULL
);
