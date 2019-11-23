

CREATE TABLE `users` (
  `id` int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `document` int(25) NOT NULL,
  `email` varchar(50) UNIQUE NOT NULL,
    `password` varchar(255) NOT NULL
);

CREATE TABLE `vehicles`(
    `id` int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `user_id` int(9) NOT NULL,
    `plate` varchar(10) NOT NULL,
    `brand` varchar(10) NOT NULL,
    `model` varchar(10) NOT NULL,
    `year` varchar(10) NOT NULL,
    `color` varchar(7) NOT NULL,
    `actual_km` int(99) NOT NULL DEFAULT 0,
    `fuel_type` VARCHAR(50) NULL,
    `personalized_name` VARCHAR(80) NULL,
     FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
)
