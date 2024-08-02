<?php include "../include/header.php";?>

<div style="display: grid; justify-content: center;">
    <h4 style="width: 500px;">8. For a given family member, get details of the secondary family member and all the associated club members with the primary family member</h4>
    <form action = "../queries/q08.php" method="GET">
        <label for="SSN">SSN:</label><br>
        <input type="text" name="SSN"><br>
        <input type="submit" value="Submit">
    </form>
</div>