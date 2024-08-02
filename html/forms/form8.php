<?php include "../include/header.php";?>

<link rel="stylesheet" href="../css/form_1.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<div style="display: grid; justify-content: center;">
    <h4 style="width: 500px;">8. For a given family member, get details of the secondary family member and all the associated club members with the primary family member</h4>
    <form action = "../queries/q08.php" method="GET">
        <label for="SSN">SSN:</label><br>
        <input type="text" name="SSN"><br>
        <input type="submit" value="Submit">
    </form>
</div>