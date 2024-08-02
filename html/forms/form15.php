<?php include "../include/header.php";?>

<link rel="stylesheet" href="../css/form_1.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<div style="display: grid; justify-content: center;">
        <h4>15. For a given location, get the list of all family members who have currently active club members associated with them and are also head coaches for the same location</h4>
        <form action="../queries/q15.php" method="GET">
            <label for="locationID">location ID:</label><br>
            <input type="text" name="locationID"><br>
            <input type="submit" value="Submit">
        </form>
</div>