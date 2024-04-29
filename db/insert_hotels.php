<?php
require "connect_db.php";
$conn = connect_hotels_db();
$sql_get_cities = "select city_id, city_name from city";
function insert_hotel($conn, $city_id, $city_name)
{
    $sql = "
    INSERT INTO
        `hotels_db`.`hotel` (
            `city_id`,
            `hotel_name`,
            `phone_no`,
            `email`,
            `address`,
            `stars`,
            `description`,
            `has_pool`,
            `has_beach`,
            `has_pool_bar`,
            `has_alcohol`,
            `single_room_no`,
            `double_room_no`,
            `twin_room_no`,
            `single_room_price`,
            `double_room_price`,
            `twin_room_price`,
            `all_inclusive_price`,
            `full_board_price`,
            `half_board_price`,
            `bed_and_breakfast_price`
        )
    VALUES
        (
            " . $city_id . ",
            'Hotel " . $city_name . "',
            '+20123456789" . $city_id . "',
            'hotel_" . $city_name . "@hotels.com',
            '123 Street, " . $city_name . ", Egypt',
            " . random_int(4, 5) . ",
            'Discover luxury at our Egyptian hotel, nestled by the Nile. Enjoy plush rooms, world-class amenities, and gourmet dining. Explore ancient pyramids or relax with breathtaking views. Experience opulence and unforgettable memories.',
            true,
            true,
            true,
            true,
            " . random_int(50, 100) . ",
            " . random_int(50, 100) . ",
            " . random_int(50, 100) . ",
            " . random_int(800, 999) . ",
            " . random_int(1100, 1200) . ",
            " . random_int(1100, 1200) . ",
            " . random_int(1000, 1099) . ",
            " . random_int(900, 999) . ",
            " . random_int(800, 899) . ",
            " . random_int(700, 799) . "
        );";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        echo "Could not insert hotel in " . $city_name . " " . $e->getMessage();
    }
}
try {
    $cities = mysqli_query($conn, $sql_get_cities);
    while ($cities_row = mysqli_fetch_assoc($cities)) {
        insert_hotel($conn, $cities_row['city_id'], $cities_row['city_name']);
    }
} catch (mysqli_sql_exception $e) {
    echo "Could not get City names" . $e->getMessage();
}
mysqli_close($conn);
