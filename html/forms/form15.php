<?php include "../include/header.php";?>

<div style="display: grid; justify-content: center;">
        <h4>15. For a given location, get the list of all family members who have currently active club members associated with them and are also head coaches for the same location</h4>
        <form action="../queries/q15.php" method="GET">
            <label for="locationID">location ID:</label><br>
            <input type="text" name="locationID"><br>
            <input type="submit" value="Submit">
        </form>
</div>