<?php
function connect_hotels_db()
{
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "hotels_db";
    $conn = "";
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );
    return $conn;
}
