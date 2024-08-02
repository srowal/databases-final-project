<?php include "../include/header.php";?>

<link rel="stylesheet" href="../css/form_1.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<div style="display: grid; justify-content: center;">
        <h4>11. For a given period of time, give a report of the teams’ formations for all the locations</h4>
        <form action="../queries/q11.php" method="GET">
            <label for="fromDate">From date:</label><br>
            <input type="text" name="fromDate"><br>
            <label for="toDate">To date:</label><br>
            <input type="text" name="toDate"><br>
            <input type="submit" value="Submit">
        </form>    
</div>