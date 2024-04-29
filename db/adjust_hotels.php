<?php
require "connect_db.php";
try {
    $conn = connect_hotels_db();
    echo "Connected successfully<br>";
} catch (mysqli_sql_exception $e) {
    echo "Could not connect to database<br>s" . $e->getMessage();
}

function update_hotel($hotel_id, $conn)
{
    try {
        $sql = "
    UPDATE `hotels_db`.`hotel`
    SET
        `double_room_price` = " . random_int(1100, 1200) . ",
        `twin_room_price` = " . random_int(1100, 1200) . ",
        `double_room_no` = " . random_int(50, 100) . ",
        `twin_room_no` = " . random_int(50, 100) . "
    WHERE 
        `hotel_id` = " . $hotel_id . ";";
        mysqli_query($conn, $sql);
        echo "Hotel " . $hotel_id . " updated successfully<br>";
    } catch (mysqli_sql_exception $e) {
        echo "Could not update hotel " . $hotel_id . "<br>" . $e->getMessage();
    }
}
try {
    $result = mysqli_query($conn, "SELECT hotel_id FROM hotel");
} catch (mysqli_sql_exception $e) {
    echo "Could not get hotels<br>" . $e->getMessage();
}
while ($row = mysqli_fetch_assoc($result)) {
    update_hotel($row['hotel_id'], $conn);
}
echo "Hotels updated successfully<br>";
mysqli_close($conn);
