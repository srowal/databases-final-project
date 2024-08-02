<?php include "../include/header.php";?>

<div style="display: grid; justify-content: center;">
        <h4>9. For a given location and day, get details of all the teams formations recorded in the system</h4>
        <form action="../queries/q09.php" method="GET">
            <label for="location">location:</label><br>
            <input type="text" name="location"><br>
            <label for="date">date:</label><br>
            <input type="text" name="date"><br>
            <input type="submit" value="Submit">
        </form>
</div>