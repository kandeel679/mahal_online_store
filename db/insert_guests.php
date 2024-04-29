<?php require "connect_db.php";
try {
    $conn = connect_hotels_db();
    echo "connected to db<br>";
} catch (mysqli_sql_exception $e) {
    echo "could not connect to db " . $e->getMessage();
}
$names = [
    "Olivia" => "F",
    "Noah" => "M",
    "Emma" => "F",
    "Liam" => "M",
    "Ava" => "F",
    "William" => "M",
    "Sophia" => "F",
    "James" => "M",
    "Isabella" => "F",
    "Benjamin" => "M",
    "Charlotte" => "F",
    "Lucas" => "M",
    "Mia" => "F",
    "Mason" => "M",
    "Evelyn" => "F",
    "Ethan" => "M",
    "Abigail" => "F",
    "Aiden" => "M",
    "Amelia" => "F",
    "David" => "M",
];
$i = 10;
foreach ($names as $name => $gender) {
    $sql = "
    INSERT INTO
        `hotels_db`.`guest` (
            `guest_name`,
            `gender`,
            `passport_no`,
            `phone_no`,
            `email`,
            `password_hash`
        )
    VALUES
        (
            '" . $name . "',
            '" . $gender . "',
            '" . $name[0] . "234567" . $i . "',
            '+112345678" . $i . "',
            '" . $name . "@example.com',
            '" .  password_hash($name . "123", PASSWORD_DEFAULT) . "'
        );";
    try {
        mysqli_query($conn, $sql);
        echo "inserted " . $name . "<br>";
    } catch (mysqli_sql_exception $e) {
        echo "could not insert" . $name . " " . $e->getMessage() . "<br>";
    }
    $i++;
}
echo "inserted guests<br>";
mysqli_close($conn);
