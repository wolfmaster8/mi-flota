
CREATE TABLE `users`
(
    `id`        int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`      varchar(30)        NOT NULL,
    `last_name` varchar(30)        NOT NULL,
    `document`  int(25)            NOT NULL,
    `email`     varchar(50) UNIQUE NOT NULL,
    `password`  varchar(255)       NOT NULL
);

CREATE TABLE `vehicles`
(
    `id`                int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `user_id`           int(9)             NOT NULL,
    `plate`             varchar(10)        NOT NULL,
    `brand`             varchar(50)        NOT NULL,
    `model`             varchar(10)        NOT NULL,
    `year`              varchar(10)        NOT NULL,
    `color`             varchar(7)         NOT NULL,
    `actual_km`         int(99)            NOT NULL DEFAULT 0,
    `fuel_consumption`  int(99)            NULL,
    `fuel_type`         VARCHAR(50)        NULL,
    `personalized_name` VARCHAR(80)        NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `vehicle_rides`
(
    `id`           int(9) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `user_id`      int(9)             NOT NULL,
    `vehicle_id`   int(9)             NOT NULL,
    `journey_name` varchar(50)        NOT NULL,
    `journey_date` DATE       NOT NULL,
    `kilometers`   int(99)        NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles (id) ON DELETE CASCADE ON UPDATE CASCADE
);
