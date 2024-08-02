<?php include "../include/header.php";?>

<link rel="stylesheet" href="../css/form_1.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

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