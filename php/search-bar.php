<form action="php/search-result.php" method="GET">
    <fieldset class="fieldset-travel-details">
        <legend>Search for Hotels</legend>
        <div>
            <label for="city">City:</label>
            <select id="city" name="city" required>
                <option value="Cairo">Cairo</option>
                <option value="Alexandria">Alexandria</option>
                <option value="Luxor">Luxor</option>
                <option value="Aswan">Aswan</option>
                <option value="Hurghada">Hurghada</option>
                <option value="Sharm El Sheikh">Sharm El Sheikh</option>
            </select>
        </div>
        <div>
            <label for="checkin">Check-in:</label>
            <input type="date" name="checkin" id="checkin" min="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div>
            <label for="stay">Stay:</label>
            <input type="number" name="stay" id="stay" min="1" max="1000" placeholder="days" required>
        </div>
        <div>
            <label for="guests">Guests:</label>
            <input type="number" name="guests" id="guests" min="1" max="1000" required>
        </div>
        <div>
            <label for="rooms">Rooms:</label>
            <input type="number" name="rooms" id="rooms" min="1" max="1000" required>
        </div>
        <button type="submit">Search</button>
    </fieldset>
</form>