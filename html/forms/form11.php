<?php include "../include/header.php";?>

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