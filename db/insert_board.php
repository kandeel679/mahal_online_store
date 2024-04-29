<?php
require "connect_db.php";
try {
    $conn = connect_hotels_db();
    echo "connected to db<br>";
} catch (mysqli_sql_exception $e) {
    echo "could not connect to db<br>" . $e->getMessage();
}

$board_types = [
    "All Inclusive",
    "Full Board",
    "Half Board",
    "Bed and Breakfast"
];

foreach ($board_types as $board_type) {
    $sql = "INSERT INTO board (board_name) VALUES ('" . $board_type . "')";
    try {
        mysqli_query($conn, $sql);
        echo "inserted " . $board_type . "<br>";
    } catch (mysqli_sql_exception $e) {
        echo "could not insert " . $board_type . "<br>" . $conn->error;
    }
}
echo "done<br>";
mysqli_close($conn);
