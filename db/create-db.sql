CREATE TABLE
    `hotels_db`.`city` (
        `city_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `city_name` VARCHAR(256) NOT NULL,
        PRIMARY KEY (`city_id`),
        UNIQUE `city_name_index` (`city_name`)
    ) ENGINE = InnoDB;

CREATE TABLE
    `hotels_db`.`hotel` (
        `hotel_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `city_id` INT UNSIGNED NOT NULL,
        `hotel_name` VARCHAR(50) NOT NULL,
        `phone_no` VARCHAR(15) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `address` VARCHAR(255) NOT NULL,
        `stars` INT UNSIGNED NOT NULL,
        `description` VARCHAR(255) NOT NULL,
        `has_pool` BOOLEAN NOT NULL,
        `has_beach` BOOLEAN NOT NULL,
        `has_pool_bar` BOOLEAN NOT NULL,
        `has_alcohol` BOOLEAN NOT NULL,
        `single_room_no` INT UNSIGNED NOT NULL,
        `double_room_no` INT UNSIGNED NOT NULL,
        `twin_room_no` INT UNSIGNED NOT NULL,
        `single_room_price` INT UNSIGNED NOT NULL,
        `double_room_price` INT UNSIGNED NOT NULL,
        `twin_room_price` INT UNSIGNED NOT NULL,
        `all_inclusive_price` INT UNSIGNED NOT NULL,
        `full_board_price` INT UNSIGNED NOT NULL,
        `half_board_price` INT UNSIGNED NOT NULL,
        `bed_and_breakfast_price` INT UNSIGNED NOT NULL,
        PRIMARY KEY (`hotel_id`),
        UNIQUE (`phone_no`),
        UNIQUE (`email`),
        UNIQUE (`address`)
    ) ENGINE = InnoDB;

CREATE TABLE
    `hotels_db`.`board` (
        `board_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `board_name` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`board_id`)
    ) ENGINE = InnoDB;

CREATE TABLE
    `hotels_db`.`guest` (
        `guest_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `guest_name` VARCHAR(50) NOT NULL,
        `gender` CHAR(1) NULL,
        `passport_no` VARCHAR(9) NULL,
        `national_id` VARCHAR(14) NULL,
        `phone_no` VARCHAR(15) NULL,
        `email` VARCHAR(50) NOT NULL,
        `password_hash` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`guest_id`),
        UNIQUE (`passport_no`),
        UNIQUE (`national_id`),
        UNIQUE (`phone_no`),
        UNIQUE (`email`)
    ) ENGINE = InnoDB;

CREATE TABLE
    `hotels_db`.`booking` (
        `booking_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `guest_id` INT UNSIGNED NOT NULL,
        `hotel_id` INT UNSIGNED NOT NULL,
        `board_id` INT UNSIGNED NOT NULL,
        `check_in` DATE NOT NULL,
        `check_out` DATE NOT NULL,
        `guests_no` INT UNSIGNED NULL,
        `single_rooms` INT UNSIGNED NULL,
        `double_rooms` INT UNSIGNED NULL,
        `total_price` INT UNSIGNED NULL,
        `status` VARCHAR(10) NOT NULL,
        PRIMARY KEY (`booking_id`),
        INDEX (`guest_id`),
        INDEX (`hotel_id`),
        INDEX (`board_id`)
    ) ENGINE = InnoDB;

INSERT INTO
    `hotels_db`.`booking` (
        `guest_id`,
        `hotel_id`,
        `board_id`,
        `check_in`,
        `check_out`,
        `guests_no`,
        `single_rooms`,
        `double_rooms`,
        `total_price`,
        `status`
    )
VALUES
    (
        1,
        1,
        1,
        '2022-01-01',
        '2022-01-10',
        2,
        1,
        0,
        200,
        'confirmed'
    );

