<?php
require "connect_db.php";
$conn = connect_hotels_db();
$check_in = new DateTime('2024-01-01');

function get_prices($conn, $hotel_id, $board_id)
{
    $board_name =
        str_replace(
            ' ',
            '_',
            strtolower(
                $conn->query("
                            SELECT 
                                `board_name` 
                            FROM 
                                `hotels_db`.`board` 
                            WHERE 
                                `board_id` = " . $board_id . ";"
                            )->fetch_assoc()['board_name']
                    )
                );
    $sql = "
    SELECT 
        `single_room_price`,
        `double_room_price`,
        `twin_room_price`,
        `" . $board_name . "_price` 
    FROM 
        `hotels_db`.`hotel` 
    WHERE 
        `hotel_id` = " . $hotel_id . ";";
    try {
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        echo "prices fetched for hotel_id " . $hotel_id . "<br>";
    } catch (mysqli_sql_exception $e) {
        echo "could not fetch prices for hotel_id " . $hotel_id . "<br>" . $e->getMessage();
    }
    return [$row['single_price'], $row['double_price'], $row['twin_price'], $row['board_price']];
}

for ($i = 1; $i < 100; $i++) {
    $guest_id = random_int(1, 20);
    $hotel_id = random_int(1, 6);
    $board_id = random_int(1, 4);

    list($single_price, $double_price, $twin_price, $board_price) = get_prices($sonn, $hotel_id, $board_id);

    $check_out = $check_in->add(new DateInterval('P1W'));
    $check_out->add(new DateInterval('P1W'));
    $rem_guests = $guests_no = random_int(1, 20);
    $rem_guests = ($double_rooms = random_int(0, $rem_guests / 2)) * 2;
    $rem_guests = ($twin_rooms = random_int(0, $rem_guests / 2)) * 2;
    $single_rooms = random_int(0, $rem_guests);
    $total_price =
        $guests_no * $board_price +
        $single_rooms * $single_price +
        $double_rooms * $double_price +
        $twin_rooms * $twin_price;
    $status = 'confirmed';
    $sql = "
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
        " . random_int(1, 20) . ",
        " . random_int(1, 6) . ",
        " . random_int(1, 4) . ",
        '2022-01-01',
        '2022-01-10',
        2,
        1,
        0,
        200,
        'confirmed'
    );";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
