<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <main>
        <form action="hotels_search.php" method="post">
            <fieldset class="fieldset-travel-details">
                <legend>Search for Hotels</legend>
                <div>
                    <label for="destination">Destination:</label>
                    <input type="text" name="destination" id="destination" required>
                </div>
                <!-- <div id="check-in-out"> -->
                    <div>
                        <label for="checkin">Check-in:</label>
                        <input type="date" name="checkin" id="checkin" required>
                    </div>
                    <div>
                        <label for="checkout">Check-out:</label>
                        <input type="date" name="checkout" id="checkout" required>
                    </div>
                <!-- </div> -->
                <!-- <div id="guests-rooms"> -->
                    <div>
                        <label for="guests">Guests:</label>
                        <input type="number" name="guests" id="guests" min="1" required>
                    </div>
                    <div>
                        <label for="rooms">Rooms:</label>
                        <input type="number" name="rooms" id="rooms" min="1" required>
                    </div>
                <!-- </div> -->
                <button type="submit">Search</button>
            </fieldset>
        </form>
    </main>
    <?php include("footer.php") ?>
</body>

</html>